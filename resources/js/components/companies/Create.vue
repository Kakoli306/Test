
<template>
    <div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            Create Employees
                            <router-link
                                :to="{ name: 'CompaniesIndex' }"
                                class="float-right"
                                >Back</router-link
                            >
                        </div>

                        <div class="card-body">
                            <form @submit.prevent="storeCompany">
                                <div class="form-group row">
                                    <label
                                        for="name"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Name</label
                                    >

                                    <div class="col-md-6">
                                        <input
                                            id="name"
                                            v-model="form.name"
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
                                        for="logo"
                                        class="col-md-4 col-form-label text-md-right"
                                        >Logo</label
                                    >

                                    <!-- <div class="col-md-6">
                                        <input
                                            id="logo"
                                          
                                           type="file"
                                            class="form-control "
                                            required
                                        />
                                    </div> -->
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
                                
                                
                                <div class="form-group row mb-0 mt-4">
                                    <div class="col-md-6 offset-md-4">
                                        <button
                                            type="submit"
                                            class="btn btn-primary"
                                        >
                                            Store
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
export default {
   
    data() {
        return {
           
            form: {
                name: "",
                email: "",
                address: "",
                website: "",
               // logo: "",
                phone: "",
               
            }
        };
    },
    
    methods: {
       
        storeEmployee() {
            axios
                .post("/api/companies", {
                    name: this.form.name,
                    website: this.form.website,
                   // logo: this.form.logo,
                    address: this.form.address,
                    email: this.form.email,
                    phone: this.form.phone,
                   
                })
                .then(res => {
                    this.$router.push({ name: "CompaniesIndex" });
                });
        },
       
    }
};
</script>

<style></style>

