<?php

namespace App\Http\Controllers\Employees;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateEmployee extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // returns the create view
        $companies = Company::all();
        return view('myviews.employee.create_employee', compact('companies'));
    }
}
