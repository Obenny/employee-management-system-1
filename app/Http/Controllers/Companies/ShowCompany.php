<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowCompany extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // check if already exist and returns true or false
        $checker = Company::where('id', $id)->exists();

        if($checker)
        {
            $company = Company::findOrFail($id);

            //returns the page for this route
            session()->put('success', 'Data Successfully Retrieved!');
            return view('myviews.company.view_company', compact('company'));
        }
        else
        {
            session()->put('error', 'Data Does Not Exist');
            return redirect()->back();
        }
    }

}
