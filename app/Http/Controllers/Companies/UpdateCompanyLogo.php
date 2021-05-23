<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateCompanyLogo extends Controller
{
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validates fields in form
        $request->validate([
//            'name' => 'required|min:7|max:120',
            'logo' => 'required|image|mimes:jpeg,png,bmp,tif|max:2096',
        ]);

        $company = Company::find($id);
//            $company->name = $request->Input(['name']);

        // gets the upload file as user input
        $input_file = $request->file(['logo']);
        $file_name = $input_file->getClientOriginalName();// get file original name
        $file_extension = $input_file->getClientOriginalExtension();// get file extension
        $new_name = $file_name . '.' . $file_extension;// form file name
        $input_file->move(public_path('images'), $new_name);// same file in the created or already existing 'images' folder
        $company->logo = $new_name;

        $updated = $company->save();
        if($updated)
        {
            session()->put('success', 'Data Successfully Updated!');
            return redirect()->route('companies.list');
        }
        else
        {
            session()->put('success', 'Data NOT Successfully Updated!');
            return redirect()->route('companies.list');
        }

    }

}
