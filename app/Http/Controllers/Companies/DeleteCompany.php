<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeleteCompany extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // deletes data using id
        $company = Company::find($id);
        $delete = $company->delete(); //delete the client
        if($delete)
        {
            session()->put('success', 'Data Successfully Deleted!');
            return redirect()->route('companies.list');
        }
        else
        {
            session()->put('error', 'There was an error deleting this data!');
            return redirect()->back();
        }
    }

}
