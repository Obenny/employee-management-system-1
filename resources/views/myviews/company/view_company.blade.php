@extends('myviews.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('View Company') }}</div>

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
                        <form>
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" disabled="disabled" value="{{$company->name}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                    <input id="email" type="email" disabled="disabled" value="{{$company->email}}" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Company Logo') }}</label>

                                <div class="col-md-6">
{{--                                    <input id="logo" type="text" disabled="disabled" value="{{$company->logo}}" class="form-control @error('logo') is-invalid @enderror" name="logo" required>--}}

{{--                                    @error('logo')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}

                                    <img src="/images/{{ $company->logo }}" height="100" width="100" />

                                </div>
                            </div>

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

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Created At') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" disabled="disabled" value="{{$convertcreateddate = \App\Http\Helpers\ConvertDateToTimeStamp::convertDateToTimeStamp($company->created_at)}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Updated At') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" disabled="disabled" value="{{$convertupdateddate = \App\Http\Helpers\ConvertDateToTimeStamp::convertDateToTimeStamp($company->updated_at)}}" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
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
