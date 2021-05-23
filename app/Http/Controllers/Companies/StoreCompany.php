<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreCompany extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validates fields in form
        $this->validate($request,[
            'name' => 'required|min:7|max:120',
            'email' => 'required|min:7|max:50',
//            'logo' => 'required|max:255',
            'logo' => 'required|image|mimes:jpeg,png,bmp,tif|max:2096',
            'website' => 'required|max:255'
        ]);

        // check if already exist and returns true or false
        $checker = Company::where('name', $request->Input(['name']))->exists();

        if($checker)
        {
            session()->put('error', 'Name Already Exist');
            return redirect()->back();
        }
        else
        {
            // store inputs using database columns(on the left) and user inputs(on the right)
            $company = new Company();
            $company->name = $request->Input(['name']);
            $company->email = $request->Input(['email']);
//            $company->logo = $request->Input(['logo']);

            // gets the upload file as user input
            $input_file = $request->file(['logo']);
            $file_name = $input_file->getClientOriginalName();// get file original name
            $file_extension = $input_file->getClientOriginalExtension();// get file extension
            $new_name = $file_name . '.' . $file_extension;// form file name
            $input_file->move(public_path('images'), $new_name);// same file in the created or already existing 'images' folder
            $company->logo = $new_name;

            $company->website_url = $request->Input(['website']);
            $saved = $company->save();

            // check if value is saved
            if($saved)
            {
                session()->put('success', 'Data Successfully Created!');
                return redirect()->route('company.create');
            }
            //the else part
            session()->put('error', 'There was an error creating this data!');
            return redirect()->route('company.create');
        }
    }
}
