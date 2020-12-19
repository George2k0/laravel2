<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Companies;

class CompaniesController extends Controller
{
    public function viewAllCompanies()
    {
        $companies = Companies::orderBy('created_at', 'DESC')->get();
        
        return view('all-companies')->with('companies', $companies);
    }

    public function addNewCompany(Request $request)
    {
        Companies::create([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,

        ]);

        return redirect()->route('companies.all');
    }

    public function deleteCompany(Request $request)
    {
        Companies::where('id', $request->company_id)->delete();

        return redirect()->route('companies.all');
    }

    public function editCompany(Request $request, $id)
    {
        $company = Companies::where('id', $id)->first();

        return view('edit-company')->with('company', $company);
    }

    public function updateCompany(Request $request, $id)
    {
        $company = Companies::where('id', $id)->update([
            'name' => $request->name,
            'code' => $request->code,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        return redirect()->route('companies.all');
    } 
        
}