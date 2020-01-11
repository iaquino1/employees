<?php

namespace App\Http\Controllers;

use App\Address;
use App\Employee;
use App\EmployeeSkill;
use App\Http\Requests\StoreEmployee;
use App\PostalCode;
use App\Skill;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;
use function Sodium\add;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $employee = Employee::with('address.postal_code')->with('employee_skill.skill')->get();

        return $employee;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request)
    {

        DB::beginTransaction();

        try {

            $postalCode = new PostalCode();
            $postalCode->postal_code = $request->postal_code;
            $postalCode->municipality = $request->municipality;
            $postalCode->colony = $request->colony;
            $postalCode->state = $request->state;
            $postalCode->country = $request->country;
            $postalCode->save();

            $address = new Address();
            $address->street = $request->street;
            $address->number = $request->number;
            $address->postal_code_id = $postalCode->id;
            $address->save();

            $employee = new Employee();
            $employee->name = $request->name;
            $employee->last_name = $request->last_name;
            $employee->email = $request->email;
            $employee->job = $request->job;
            $employee->birthday = $request->birthday;
            $employee->address_id = $address->id;
            $employee->save();

            foreach ($request->skillNames as $skillName) {
                $skill = new Skill();
                $skill->skill = $skillName;
                $skill->save();

                $employeeSkill = new EmployeeSkill();
                $employeeSkill->skill_id = $skill->id;
                $employeeSkill->employee_id = $employee->id;
                $employeeSkill->save();
            }

        } catch(ValidationException $e) {
            DB::rollback();
        }

        DB::commit();

        return $employee;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $employee = Employee::with('address.postal_code')->with('employee_skill.skill')->find($id);

        return $employee;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::find($id);

        $employee->delete();
    }
}
