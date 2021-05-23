@extends('myviews.layouts.app')

@include('myviews.patials.table_styles')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Companies') }}</div>
                <div class="card-body">

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-0">
                            <span>
                                <a href="{{ route('companies.list') }}">
                                    {{ __('Refresh') }}
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <span>
                                <a href="{{ route('company.create') }}">
                                    {{ __('Create Company') }}
                                </a>
                            </span>
                        </div>
                    </div>
                    <hr>

                    <!-- for success or failure message -->
                    @include('myviews.alerts.messages')

                    <center>

                        @if(count($companies) > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Company Email</th>
                                        <th scope="col">Company Logo</th>
                                        <th scope="col">Company Website</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($companies as $company)
                                        <tr>
                                            <td data-label="Company Name">{{ $company->name }}</td>
                                            <td data-label="Company Email">{{ $company->email }}</td>
{{--                                            <td data-label="Company Logo">{{ $company->logo }}</td>--}}
                                            <td data-label="Company Logo"><img src="/images/{{ $company->logo }}" height="100" width="100" /></td>
                                            <td data-label="Company Website">{{ $company->website_url }}</td>
                                            <td data-label="Actions">
{{--                                                {{ $department->id }}--}}
                                                <span>
                                                      <a class="btn btn-success btn-sm" href="{{route('company.show', ['id' => $company->id])}}">
                                                          View
                                                      </a>
                                                </span>

                                                <span>
                                                      <a class="btn btn-warning btn-sm" href="{{route('company.edit', ['id' => $company->id])}}">
                                                          Edit
                                                      </a>
                                                </span>

                                                <span>
                                                      <a class="btn btn-primary btn-sm" href="{{route('company.edit.logo', ['id' => $company->id])}}">
                                                          Edit Logo
                                                      </a>
                                                </span>

                                                <span>
                                                    <form action="{{route('company.delete', ['id' => $company->id])}}" method="post">
                                                        @csrf
                                                        {{@method_field('delete')}}
                                                        <button class="btn btn-danger btn-sm" title="Delete" onclick="myDeleteFunction()">Delete</button>
                                                    </form>
                                                </span>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <p>{{ $companies->links() }}</p>

                        @else
                            <p>No Results</p>
                        @endif

                    </center>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
