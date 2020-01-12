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

        $validated = $request->validated();

        DB::beginTransaction();

        try {

            $postalCode = PostalCode::where('postal_code', $validated['postal_code'])->first();

            if (empty($postalCode)) {
                $postalCode = new PostalCode();
                $postalCode->postal_code = $validated['postal_code'];
                $postalCode->municipality = $validated['municipality'];
                $postalCode->colony = $validated['colony'];
                $postalCode->state = $validated['state'];
                $postalCode->country = $validated['country'];
                $postalCode->save();
            }

            $address = new Address();
            $address->street = $validated['street'];
            $address->number = $validated['number'];
            $address->postal_code_id = $postalCode->id;
            $address->save();

            $employee = new Employee();
            $employee->name = $validated['name'];
            $employee->last_name = $validated['last_name'];
            $employee->email = $validated['email'];
            $employee->job = $validated['job'];
            $employee->birthday = $validated['birthday'];
            $employee->address_id = $address->id;
            $employee->save();

            foreach ($validated['skillNames'] as $skillName) {

                $skill = Skill::where('skill', $skillName['skill'])->first();

                if (empty($skill)) {
                    $skill = new Skill();
                    $skill->skill = $skillName['skill'];
                    $skill->save();
                }

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
