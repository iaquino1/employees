<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <h4 class="text-center font-weight-bold">Nuevo empleado</h4>
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
                        <input type="text" placeholder="Codigo postal" v-model="employee.postal_code" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Ciudad o municipio" v-model="employee.municipality" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Colonia" v-model="employee.colony" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Estado" v-model="employee.state" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Pais" v-model="employee.country" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Calle" v-model="employee.street" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="Numero" v-model="employee.number" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Skills</label>
                    </div>

                    <div class="form-group" v-for="(skillName, index) in employee.skillNames">
                        <input class="form-control" type="text" v-model="skillName.skill">
                    </div>

                    <button class="btn btn-success" @click="addSkill">
                        Nueva skill
                    </button>

                </div>
                <div class="container-buttons">
                    <button @click="saveEmployees()" class="btn btn-primary btn-lg btn-block">Añadir nuevo empleado</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{
                employee: {
                    name:"",
                    last_name:"",
                    email:"",
                    job:"",
                    birthday:"",
                    postal_code:"",
                    municipality:"",
                    colony:"",
                    state:"",
                    country:"",
                    street:"",
                    number:"",
                    skillNames:[
                        {
                            skill: ""
                        }
                    ],
                }
            }
        },
        methods:{
            saveEmployees() {
                let me = this;
                let url = '/api/employee';
                axios.post(url, this.employee).then(function (response) {
                    alert("Se creo el empleado");
                }).catch(function (error) {
                    if (error.response) {
                        console.log(error.response.data);
                    }
                });
            },
            addSkill: function () {
                this.employee.skillNames.push({ skill: "" });
            },
        },
        mounted() {
            console.log("Se cargo el componente");
        }
    }
</script>
