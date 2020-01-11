<template>
    <div>
        <h4 class="text-center font-weight-bold">Empleados</h4>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">Email</th>
                <th scope="col">Puesto</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employee in employees">
                <td>{{employee.name}}</td>
                <td>{{employee.last_name}}</td>
                <td>{{employee.email}}</td>
                <td>{{employee.job}}</td>
                <td>
                    <button class="btn btn-danger" @click="deleteEmployee(employee)"><i style="color:white" class="fa fa-trash"></i></button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        mounted() {
            this.$store.dispatch('fetchEmployees')
        },
        methods: {
            deleteEmployee(employee) {
                this.$store.dispatch('deleteEmployee',employee)
            }
        },
        computed: {
            ...mapGetters([
                'employees'
            ])
        }
    }
</script>

<style scoped>

</style>
