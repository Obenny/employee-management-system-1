<?php

namespace App\Http\Controllers\Employees;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StoreEmployee extends Controller
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
            'fname' => 'required|min:3|max:20',
            'lname' => 'required|min:3|max:20',
            'cid' => 'required|max:120',
            'email' => 'required|min:7|max:50',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:16'
        ]);

        // check if already exist and returns true or false
        $checker1 = Employee::where('first_name', $request->Input(['fname']))->exists();
        $checker2 = Employee::where('last_name', $request->Input(['lname']))->exists();

        if($checker1 && $checker2)
        {
            session()->put('error', 'Name Already Exist');
            return redirect()->back();
        }
        else
        {
            // store user input
            $employee = new Employee();
            $employee->first_name = $request->Input(['fname']);
            $employee->last_name = $request->Input(['lname']);
            $employee->company_id = $request->Input(['cid']);
            $employee->email = $request->Input(['email']);
            $employee->phone = $request->Input(['phone']);
            $saved = $employee->save();

            // check if value is saved
            if ($saved) {
                session()->put('success', 'Data Successfully Created!');
                return redirect()->route('employee.create');
            } else {
                //the else part
                session()->put('error', 'There was an error creating this Data!');
                return redirect()->route('employee.create');
            }
        }

    }
}
