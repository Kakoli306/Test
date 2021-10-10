<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Update Employees
                            <router-link
                                :to="{ name: 'EmployeesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="updateEmployee">
                                <div class="form-group row">
                                    <label
                                        for="first_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >First Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="first_name"
                                            v-model="form.first_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="middle_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Middle Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="middle_name"
                                            v-model="form.middle_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="last_name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Last Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="last_name"
                                            v-model="form.last_name"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                
                                <div class="form-group row">
                                    <label
                                        for="email"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Email</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="email"
                                            v-model="form.email"
                                            type="email"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label
                                        for="phone"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Phone</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="phone"
                                            v-model="form.phone"
                                            type="number"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="address"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Address</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="address"
                                            v-model="form.address"
                                            type="text"
                                            class="form-control "
                                            required
                                        />
                                    </div>
                                </div>
                              
                               <div class="form-group row">
                                    <label
                                        for="company"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Company</label
                                    >

                                    <div class="col-md-6">
                                        <select
                                            v-model="form.company_id"
                                            @change="getCompanies()"
                                            name="company"
                                            class="form-control"
                                            aria-label="Default select example"
                                        >
                                            <option
                                                v-for="company in companies"
                                                :key="company.id"
                                                :value="company.id"
                                                >{{ company.name }}</option
                                            >
                                        </select>
                                    </div>
                                     </div>

                                <div class="form-group row">
                                    <label
                                        for="zip_code"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Birthdate</label
                                    >
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.birthdate"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label
                                        for="zip_code"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Date Hired</label
                                    >
                                    <div class="col-md-6">
                                        <datepicker
                                            v-model="form.date_hired"
                                            input-class="form-control"
                                        ></datepicker>
                                    </div>
                                </div>
                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Update
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from "moment";
export default {
    components: {
        Datepicker
    },
    data() {
        return {
            // countries: [],
            // states: [],
            // departments: [],
            // cities: [],
            companies: [],
            form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                phone: "",
                email: "",
                company_id: "",
                // country_id: "",
                // state_id: "",
                // department_id: "",
                // city_id: "",
                // zip_code: "",
                birthdate: null,
                date_hired: null
            }
        };
    },
    created() {
        // this.getCountries();
        // this.getDepartments();
        this.getEmployee();
         this.getCompanies();
    },
    methods: {
        getEmployee() {
            axios
                .get("/api/employees/" + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    // this.getStates();
                    // this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
         getCompanies() {
             axios
                 .get("/api/employees/companies")
                 .then(res => {
                     this.companies = res.data;
                 })
                 .catch(error => {
                     console.log(console.error);
                 });
         },
        
        // getCountries() {
        //     axios
        //         .get("/api/employees/countries")
        //         .then(res => {
        //             this.countries = res.data;
        //         })
        //         .catch(error => {
        //             console.log(console.error);
        //         });
        // },
        // getStates() {
        //     axios
        //         .get("/api/employees/" + this.form.country_id + "/states")
        //         .then(res => {
        //             this.states = res.data;
        //         })
        //         .catch(error => {
        //             console.log(console.error);
        //         });
        // },
        // getCities() {
        //     axios
        //         .get("/api/employees/" + this.form.state_id + "/cities")
        //         .then(res => {
        //             this.cities = res.data;
        //         })
        //         .catch(error => {
        //             console.log(console.error);
        //         });
        // },
        // getDepartments() {
        //     axios
        //         .get("/api/employees/departments")
        //         .then(res => {
        //             this.departments = res.data;
        //         })
        //         .catch(error => {
        //             console.log(console.error);
        //         });
        // },
        updateEmployee() {
            axios
                .put("/api/employees/" + this.$route.params.id, {
                    first_name: this.form.first_name,
                    middle_name: this.form.middle_name,
                    last_name: this.form.last_name,
                    address: this.form.address,
                    email: this.form.email,
                    phone: this.form.phone,
                     company_id: this.form.company_id,
                    // country_id: this.form.country_id,
                    // state_id: this.form.state_id,
                    // city_id: this.form.city_id,
                    // department_id: this.form.department_id,
                    // zip_code: this.form.zip_code,
                    birthdate: this.format_date(this.form.birthdate),
                    date_hired: this.format_date(this.form.date_hired)
                })
                .then(res => {
                    this.$router.push({ name: "EmployeesIndex" });
                });
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        }
    }
};
</script>

<style></style>
