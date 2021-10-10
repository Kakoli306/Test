import EmployeesIndex from "./components/employees/Index";
import EmployeesCreate from "./components/employees/Create";
import EmployeesEdit from "./components/employees/Edit";
import CompaniesIndex from "./components/companies/Index";
import CompaniesCreate from "./components/companies/Create";
import CompaniesEdit from "./components/companies/Edit";


export const routes = [
    {
        path: "/employees",
        name: "EmployeesIndex",
        component: EmployeesIndex
    },
    {
        path: "/employees/create",
        name: "EmployeesCreate",
        component: EmployeesCreate
    },
    {
        path: "/employees/:id",
        name: "EmployeesEdit",
        component: EmployeesEdit
    },

    {
        path: "/companies",
        name: "CompaniesIndex",
        component: CompaniesIndex
    },
    {
        path: "/companies/create",
        name: "CompaniesCreate",
        component: CompaniesCreate
    },
    {
        path: "/companies/:id",
        name: "CompaniesEdit",
        component: CompaniesEdit
    }
];
