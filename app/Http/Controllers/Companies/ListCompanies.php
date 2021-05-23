<?php

namespace App\Http\Controllers\Companies;

use App\Company;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListCompanies extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // returns the list view
        $companies = Company::orderBy('id', 'desc')->paginate(10);//returns db value in descending order with pagination
        return view('myviews.company.list_companies', compact('companies'));
    }

}
