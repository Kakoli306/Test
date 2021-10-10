<template>
    <div>
        <h2 class="text-center">Company List</h2>
  <div>
                            <router-link
                                :to="{ name: 'CompaniesCreate' }"
                                class="btn btn-primary mb-2"
                                >Create</router-link
                            >
                        </div>
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Detail</th>
                <!-- <th>Actions</th> -->
            </tr>
            </thead>
            <tbody>
            <tr v-for="company in companies" :key="company.id">
                <td>{{ company.id }}</td>
                <td>{{ company.name }}</td>
                <td>{{ company.detail }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: company.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-danger" @click="deleteCompany(company.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                companies: []
            }
        },
        created() {
            this.axios
                .get('http://localhost:8000/api/companies/')
                .then(response => {
                    this.companies = response.data;
                });
        },
        methods: {
            deleteCompany(id) { 
                this.axios
                    .delete(`http://localhost:8000/api/companies/${id}`)
                    .then(response => {
                        let i = this.companies.map(data => data.id).indexOf(id);
                        this.companies.splice(i, 1)
                    });
            }
        }
    }
</script>