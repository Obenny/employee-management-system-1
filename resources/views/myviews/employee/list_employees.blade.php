@extends('myviews.layouts.app')

@include('myviews.patials.table_styles')

@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Employees') }}</div>

                <div class="card-body">

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-0">
                            <span>
                                <a href="{{ route('employees.list') }}">
                                    {{ __('Refresh') }}
                                </a>
                            </span>
                            &nbsp;&nbsp;&nbsp;
                            <span>
                                <a href="{{ route('employee.create') }}">
                                    {{ __('Create Employee') }}
                                </a>
                            </span>
                        </div>
                    </div>
                    <hr>

                    <!-- for success or failure message -->
                    @include('myviews.alerts.messages')

                    <center>

                        @if(count($employees) > 0)
                            <table>
                                <thead>
                                    <tr>
                                        <th scope="col">First Name</th>
                                        <th scope="col">Last Name</th>
                                        <th scope="col">Company Name</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($employees as $employee)
                                        <tr>
                                            <td data-label="First Name">{{ $employee->first_name }}</td>
                                            <td data-label="Last Name">{{ $employee->last_name }}</td>
                                            <td data-label="Company Name">{{ $employee->company->name }}</td>
                                            <td data-label="Actions">

                                                <span>
                                                      <a class="btn btn-success btn-sm" href="{{route('employee.show', ['id' => $employee->id])}}">
                                                          View
                                                      </a>
                                                </span>

                                                <span>
                                                      <a class="btn btn-warning btn-sm" href="{{route('employee.edit', ['id' => $employee->id, 'did' => $employee->company_id])}}">
                                                          Edit
                                                      </a>
                                                </span>

                                                <span>
                                                    <form action="{{route('employee.delete', ['id' => $employee->id])}}" method="post">
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

                            <p>{{ $employees->links() }}</p>

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
