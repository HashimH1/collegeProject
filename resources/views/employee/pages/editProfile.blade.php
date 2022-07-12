@extends('employee.index')

@section('indexContent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('employee.includes.alerts.success')
                @include('employee.includes.alerts.errors')
                <div class="card-header">Edit information</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('employee.profile.update') }}">
                        @csrf
         <input hidden name="id" value="{{auth()->user()->id}}">
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus>

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
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="address" value="{{$employee->address}}" required autocomplete="address" autofocus>

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
                                <input id="address" type="text" class="form-control @error('name') is-invalid @enderror" name="phone" value="{{$employee->phone}}" required autocomplete="phone" autofocus>

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
                                <select id="department" name="department_id"  class="form-control" required autocomplete="department" autofocus>
                                    @foreach ($department as $depart )

                                    <option {{$depart->id ==$employee->department_id ? 'selected':'' }} value="{{$depart->id}}">{{$depart->name}}</option>

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
                                <input id="date" type="date" class="form-control @error('name') is-invalid @enderror" name="date" value="{{$employee->date}}" required autocomplete="address" autofocus>

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
                                <input id="date" type="date" class="form-control @error('name') is-invalid @enderror" name="vaccinedate" value="{{$employee->Vaccinedate}}"  autocomplete="address" autofocus>

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



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                   Save
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
