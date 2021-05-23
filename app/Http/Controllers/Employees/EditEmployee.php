<?php

namespace App\Http\Controllers\Employees;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EditEmployee extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $cid
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $cid)
    {
        // check if already exist and returns true or false
        $checker = Employee::where('id', $id)->exists();

        if($checker)
        {
            //$departments = Department::all();// get all departments
            // get database values start with a specific value in descending order
            $companies = Company::orderByRaw("FIELD(id, $cid) DESC")
                ->get();
            $employee = Employee::findOrFail($id);// get this employee details

            //returns the page for this route
            session()->put('success', 'Data Successfully Retrieved!');
            return view('myviews.employee.edit_employee', compact('employee'), compact('companies'));
        }
        else
        {
            session()->put('error', 'Company Does Not Exist');
            return redirect()->back();
        }
    }

}
