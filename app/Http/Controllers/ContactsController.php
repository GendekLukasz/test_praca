<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{
    public function listOfCompanyContacts( Request $request)
    {
        $id = $request->id;
        //return Contact::All();
        $contacts = Contact::where('company_id', $id)->get();
        return view('pages.contacts')->with('contacts', $contacts);
    }
}
