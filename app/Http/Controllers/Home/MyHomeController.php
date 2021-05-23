<?php

namespace App\Http\Controllers\Home;

use App\Company;
use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $company = Company::count();// counts total companies
        $employee = Employee::count();// counts total employees
        return view('myviews.home', compact('company'), compact('employee'));
    }
}
