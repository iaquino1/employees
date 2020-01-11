let actions = {
    showEmployee({commit}, employee) {
        axios.get(`/api/employee/${employee.id}`)
            .then(res => {
                commit('CREATE_EMPLOYEE', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    createEmployee({commit}, employee) {
        axios.post('/api/employee', employee)
            .then(res => {
                commit('CREATE_EMPLOYEE', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchEmployees({commit}) {
        axios.get('/api/employee')
            .then(res => {
                commit('FETCH_EMPLOYEES', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    deleteEmployee({commit}, employee) {
        axios.delete(`/api/employee/${employee.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_EMPLOYEE', employee)
            }).catch(err => {
            console.log(err)
        })
    }
}

export default actions
