<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Lista de empleados</h2>
                <table class="table text-center">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Email</th>
                        <th scope="col">Puesto</th>
                        <th scope="col">Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="employee in employees" :key="employee.id">
                        <td v-text="employee.name"></td>
                        <td v-text="employee.last_name"></td>
                        <td v-text="employee.email"></td>
                        <td v-text="employee.job"></td>
                        <td>
                            <b-button id="show-btn" @click="showModal(employee)">Detalles</b-button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <b-modal ref="m-employee" hide-footer title="Datos del empleado">
            <div class="d-block">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" placeholder="Nombre del empleado" v-model="employee.name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Apellidos" v-model="employee.last_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="email" placeholder="Email" v-model="employee.email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Puesto" v-model="employee.job" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="date" placeholder="Fecha de nacimmiento" v-model="employee.birthday" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Direccion</label>
                            </div>

                            <div class="form-group">
                                <input type="text" placeholder="Codigo postal" v-model="employee.address.postal_code.postal_code" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Ciudad o municipio" v-model="employee.address.postal_code.municipality" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Colonia" v-model="employee.address.postal_code.colony" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Estado" v-model="employee.address.postal_code.state" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Pais" v-model="employee.address.postal_code.country" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Calle" v-model="employee.address.street" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" placeholder="Numero" v-model="employee.address.number" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Skills</label>
                            </div>

                            <div class="form-group" v-for="(skillName, index) in employee.employee_skill">
                                <input class="form-control" type="text" v-model="skillName.skill.skill">
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <footer class="modal-footer">
                <button class="btn btn-danger" @click="deleteEmployee(employee)">Borrar</button>
                <button type="button" class="btn btn-secondary">Cancel</button>
                <button type="button" class="btn btn-primary">OK</button>
            </footer>
        </b-modal>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                employees:[],
                employee: {
                    name:"",
                    last_name:"",
                    email:"",
                    job:"",
                    birthday:"",
                    address: {
                        street: "",
                        number: "",
                        postal_code: {
                            postal_code: "",
                            municipality: "",
                            country: "",
                            state: "",
                            colony: ""
                        }
                    },
                    postal_code:"",
                    municipality:"",
                    colony:"",
                    state:"",
                    country:"",
                    street:"",
                    number:"",
                    employee_skill: [],
                    skillNames:[
                        {
                            skill: ""
                        }
                    ],
                }
            }
        },
        methods:{
            getEmployees(){
                let me = this;
                let url = '/api/employee';
                axios.get(url).then(function (response) {
                    me.employees = response.data;
                }).catch(function (error) {
                    console.log(error);
                });
            },
            loadEmployee(employee){
                console.log(employee);
            },
            deleteEmployee(employee){
                console.log(employee);
            },
            showModal(employee) {
                axios.get(`/api/employee/${employee.id}`)
                    .then(res => {
                        console.log(res.data);
                        this.employee = res.data;
                        this.$refs['m-employee'].show()
                    }).catch(err => {
                    console.log(err)
                })
            },
        },
        mounted() {
            this.getEmployees();
        }
    }
</script>
