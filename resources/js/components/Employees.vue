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
                            <button class="btn btn-secondary" @click="loadEmployee(employee)">Detalles</button>
                            <button class="btn btn-danger" @click="deleteEmployee(employee)">Borrar</button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                employees:[],
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
            }
        },
        mounted() {
            this.getEmployees();
        }
    }
</script>
