<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;


class CompanyController extends Controller
{
    public function index(Request $request)
    {
        $companies = Company::all()->toArray();

        return array_reverse($companies);     
       
    }

    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->validated());

        return response()->json($company);
    }

    // public function store(Request $request)
    // {
    //     $this->validate($request, [
    //         'name'=> 'required',
    //         'logo' => 'required',
    //         'email' => 'required',
    //         'website' => 'required',
    //         'phone' => 'required',
    //         'address' => 'required',
    //     ]);

    //     $fileUpload = new FileUpload([
            
    //         'name' => $request->get('name'),
    //         'email' => $request->get('email'),
    //         'website' => $request->get('website'),
    //         'phone' => $request->get('phone'),
    //         'address' => $request->get('address'),
           
    //     ]);

    //     $fileUpload->save();

    //     if($request->logo()) {
    //         $file_name = time().'_'.$request->logo->getClientOriginalName();
    //         $file_path = $request->logo('logo')->storeAs('uploads', $file_name, 'public');

    //         $fileUpload->name = time().'_'.$request->logo->getClientOriginalName();
    //         $fileUpload->path = '/storage/' . $file_path;
    //         $fileUpload->save();

    //         return response()->json($fileUpload);

    //     }
    // }

    
    }
