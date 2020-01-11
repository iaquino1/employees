<template>
    <form action="" @submit="createEmployee(employee)">
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

        <div class="form-group">
            <input type="text" placeholder="Skill" v-model="employee.skillNames" class="form-control">
        </div>

        <div class="form-group">
            <button :disabled="!isValid" class="btn btn-block btn-primary" @click.prevent="createEmployee(employee)">Registrar
            </button>
        </div>
    </form>
</template>

<script>
    import store from "../store";

    export default {
        data() {
            return {
                employee: {
                    name: '',
                    email: '',
                    postal_code: '',
                    last_name: '',
                    job: '',
                    birthday: '',
                    municipality: '',
                    colony: '',
                    skillNames: '',
                    street: '',
                    number: ''
                }
            }
        },
        methods: {
            createEmployee(employee) {
                this.$store.dispatch('createEmployee', employee)
            },
            addFind: function () {
                this.finds.push({ value: '' });
            }
        },
        computed: {
            isValid() {
                return this.employee.name !== ''
                    && this.employee.email !== ''
                    && this.employee.postal_code !== ''
                    && this.employee.last_name !== ''
                    && this.employee.job !== ''
                    && this.employee.birthday !== ''
                    && this.employee.municipality !== ''
                    && this.employee.colony !== ''
                    && this.employee.skill !== ''
                    && this.employee.street !== ''
                    && this.employee.number !== ''
            }
        }
    }
</script>

<style scoped>

</style>
