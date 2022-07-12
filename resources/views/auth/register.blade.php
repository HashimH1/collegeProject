<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('employee.includes.alerts.success')
                @include('employee.includes.alerts.errors')
                <div class="card-header">Employee information</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('employee.register.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">department</label>

                            <div class="col-md-6">
                                <select id="department" name="department"  class="form-control" required autocomplete="department" autofocus>
                                    @foreach ($department as $depart )

                                    <option value="{{$depart->id}}">{{$depart->name}}</option>

                                    @endforeach


                                </select>
                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">date of birth</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('name') is-invalid @enderror" name="date" value="{{ old('address') }}" required autocomplete="address" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">vaccine</label>

                            <div class="col-md-3 ">
                                <input checked type="radio" id="yes" name="vaccine" value="yes">
                                   <label for="yes">Yes</label><br>
                            </div>

                            <div class="col-md-3 ">
                                <input type="radio" id="no" name="vaccine" value="no">
                                       <label for="no">No</label><br>

                            </div>
                        </div>


                        <div id="vaccineDate" class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Vaccine date</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control @error('name') is-invalid @enderror" name="vaccinedate" value="{{ old('vaccineDate') }}"  autocomplete="address" autofocus>

                                @error('vaccineDate')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div id="vaccinePhoto" class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">vaccine photo</label>

                            <div class="col-md-6">
                                <input id="department" type="file" class="form-control @error('name') is-invalid @enderror" name="vaccinePhoto" value="{{ old('department') }}"  autocomplete="department" autofocus>

                                @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

        $(document).ready(function(){

         $("#yes").click(function(){

            $("#vaccineDate").show(500);
            $("#vaccinePhoto").show(500);

         })

         $("#no").click(function(){

            $("#vaccineDate").hide(500);
            $("#vaccinePhoto").hide(500);

            })

        });


</script>
@endsection



