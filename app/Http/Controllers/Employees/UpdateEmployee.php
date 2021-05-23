<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class UpdateEmployee extends Controller
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
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'cid' => 'required|max:120',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16'
        ]);

//        $employee = Employee::find($id);
//        $employee->first_name = $request->Input(['fname']);
//        $employee->last_name = $request->Input(['lname']);
//        $employee->department_id = $request->Input(['cid']);
//        $employee->email = $request->Input(['email']);
//        $employee->phone= $request->Input(['phone']);
//        $employee->save();
//
//        session()->put('success', 'Employee Successfully Updated!');
//        return redirect()->route('employees.list');

        // check if already exist and returns true or false
        $checker1 = Employee::where('first_name', $request->Input(['fname']))->exists();
        $checker2 = Employee::where('last_name', $request->Input(['lname']))->exists();

        if(($checker1 && $checker2) && !$id)
        {
            session()->put('error', 'Could not Update because Name Already Exist');
            return redirect()->back();
        }
        else
        {
            // update user input
            $employee = Employee::find($id);
            $employee->first_name = $request->Input(['fname']);
            $employee->last_name = $request->Input(['lname']);
            $employee->company_id = $request->Input(['cid']);
            $employee->email = $request->Input(['email']);
            $employee->phone= $request->Input(['phone']);
            $updated = $employee->save();

            // check if value is saved
            if ($updated) {
                session()->put('success', 'Data Successfully Updated!');
                return redirect()->route('employees.list');
            } else {
                //the else part
                session()->put('error', 'There was an error updating this Data!');
                return redirect()->route('employees.edit');
            }
        }


    }
}
