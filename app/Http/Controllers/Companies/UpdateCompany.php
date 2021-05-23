<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UpdateCompany extends Controller
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
            'name' => 'required|min:7|max:120',
            'email' => 'required|min:7|max:50',
//            'logo' => 'required|max:255',
//            'logo1' => 'required|image|mimes:jpeg,png,bmp,tif|max:2096',
            'website' => 'required|max:255'
        ]);

        // check if already exist and returns true or false
        $checker = Company::where('name', $request->Input(['name']))->exists();
        $checker1 = Company::select('id')->where('name', $request->Input(['name']))->first();

        //return strcmp($checker1,$id);

        // check if data already exist and if the id for that data is same as the id to be updated
        if($checker AND strcmp($checker1->id, $id) !== 0)
        {
            session()->put('error', 'Could not Update because Name Already Exist');
            return redirect()->route('companies.list');
        }
        else
        {
            $company = Company::find($id);
            $company->name = $request->Input(['name']);
            $company->email = $request->Input(['email']);
//            $company->logo = $request->Input(['logo']);
            $company->website_url = $request->Input(['website']);
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

}
