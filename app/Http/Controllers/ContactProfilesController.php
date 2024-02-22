<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactProfilesController extends Controller
{
    //* Get Data (All)
    public function index(){
        $contact = Contact::all();
        return response([
            'message' => 'Data Contact',
            'success' => true,
            'data' => $contact,
        ]);
    }

    //* Get Data (By Id)
    public function show($id){
        $person = Contact::find($id);
        return response([
            'message' => 'Show Person Successfull',
            'success' => true,
            'data' => $person,
        ]);
    }

    //* Store (Add)
    public function store(Request $request){
        // Request Validate
        $request->validate([
            'name' => 'required|string',
            'email_address' => 'required|string|email|unique:contacts',
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        $contact = Contact::create([
            'name' => $request->name,
            'email_address' => $request->email_address,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ]);

        return response([
            'success' => true,
            'message' => 'Contact Profile Saved Successfully'
        ]);
    }

    //* Edit
    public function edit(Request $request, $id){
        // Request Validate
        $request->validate([
            'name' => 'required|string',
            'email_address' => 'required|string|email|unique:contacts,email_address,'.$id,
            'phone_number' => 'required',
            'address' => 'required'
        ]);

        // data request
        $data = [
            'name' => $request->name,
            'email_address' => $request->email_address,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
        ];
        
        $person = Contact::find($id);
        $person->update($data);

       return response([
            'success' => true,
            'message' => 'Edit Successfull',
            'data' => $data
        ]);
    }

    //* Delete
    public function delete($id){
        $person = Contact::find($id)->delete();
        return response([
            'success' => true,
            'message' => 'Delete Person Successfully'
        ]);
    }
}
