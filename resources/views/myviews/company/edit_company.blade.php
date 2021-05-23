@extends('myviews.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit Company') }}</div>

                <div class="card-body">

                    <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-0">
                                <span>
                                    <a href="{{ route('company.create') }}">
                                        {{ __('Create Company') }}
                                    </a>
                                </span>
                                &nbsp;&nbsp;&nbsp;
                                <span>
                                    <a href="{{ route('companies.list') }}">
                                        {{ __('View Companies') }}
                                    </a>
                                </span>
                            </div>

                    </div>
                    <hr>

                    <!-- for success or failure message -->
                    @include('myviews.alerts.messages')

                    @if(count(array($company)) > 0)
                        <form method="POST" action="{{ route('company.update', $company->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" value="{{$company->name}}" class="form-control @error('name') is-invalid @enderror" name="name" required autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Company E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

{{--                            <div class="form-group row">--}}
{{--                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Logo') }}</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="logo" type="hidden" value="{{$company->logo}}" class="form-control @error('logo') is-invalid @enderror" name="logo" required>--}}
{{--                                    <input id="logo1" type="file" name="logo1" class="form-control @error('logo1') is-invalid @enderror" name="logo1">--}}

{{--                                    @error('logo')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Website Url') }}</label>

                                <div class="col-md-6">
                                    <input id="website" type="text" value="{{$company->website_url}}" class="form-control @error('website') is-invalid @enderror" name="website" required>

                                    @error('website')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <p class="mt-5 mb-5">No Results</p>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
