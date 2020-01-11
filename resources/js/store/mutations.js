let mutations = {
    CREATE_EMPLOYEE(state, employee) {
        state.employees.unshift(employee)
    },
    FETCH_EMPLOYEES(state, employees) {
        return state.employees = employees
    },
    DELETE_EMPLOYEE(state, employee) {
        let index = state.employees.findIndex(item => item.id === employee.id)
        state.employees.splice(index, 1)
    }

}
export default mutations
