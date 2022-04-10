<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Contact;

class CompaniesController extends Controller
{
    public function listOfCompanies()
    {
        $companies = Company::all();
        $i = 0;
        foreach($companies as $company)
        {
            $contacts = Contact::where('company_id', $company['id'])->get();
            $companies[$i]['number_of_contacts'] = count($contacts);
            $i++;
        }
        //return Company::all();
        return view('pages.main')->with('companies', $companies);
    
    }
    public function edit(Request $request)
    {
        $id = $request->id;
        $company = Company::find($id);
        return view('pages.edit_company')->with('company', $company);

    }
    public function add()
    {
        return view('pages.add_company');

    }
    public function addSave(Request $request)
    {
        $this->validate($request, [
            'company_name' => 'required|unique:companies',
            'company_city' => 'required',
        ]);

        $company = Company::where('company_name', $request->input('company_name'))->get();;


        $company = new Company;
        $company->company_name = $request->input('company_name');
        $company->company_city = $request->input('company_city');
        $company->save();


        $company_id = Company::where('company_name', $request->input('company_name'))->first();
        
        for ($i = 1; $i <= 3; $i++) {
            $contact = new Contact;
            $contact->number = mt_rand(10000000,99999999);
            $contact->company_id = $company_id['id'];
            $contact->save();
        }

        return redirect('/');

    }
    public function editSave(Request $request)
    {
        
        $this->validate($request, [
            'company_name' => 'required_without_all:company_city',
            'company_city' => 'required_without_all:company_name'
        ]);

        $company = Company::where('company_name', $request->input('company_name'))->get();;
        if(count($company) == 0){
            $company = Company::find($request->company_id);
            if($request->input('company_name') != '')
            {
                $company->company_name = $request->input('company_name');
            }
            if($request->input('company_city') != '')
            {
                $company->company_city = $request->input('company_city');
            }
            $company->save();
        }
        else
        {
            return "errror";
        }
        return back();

    }
    public function delete(Request $request)
    {
        $company = Company::find($request->id);
        $contacts = Contact::where('company_id', $request->id)->get();
        foreach($contacts as $contact)
        {
            $contact->delete();
        }
        $company->delete();
        return redirect('/');

    }
}
