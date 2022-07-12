
@extends('employee.index')

@section('indexContent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                @include('employee.includes.alerts.success')
                @include('employee.includes.alerts.errors')
                <div class="card-header">Add Admin</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('add.admin.store') }}">
                        @csrf

                        <div class="row mb-12">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Employee</label>

                            <div class="col-md-8">
                                <select id="employee" name="employee_id"  class="form-control" required autocomplete="employee" autofocus>
                             @foreach ($employees as $employee)
                             <option value="{{$employee->id}}">{{$employee->name}}&nbsp; -  &nbsp; {{$employee->email}}</option>

                             @endforeach




                                </select>
                                @error('employee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<br>
                        <div class="row mb-12">
                            <label for="name" class="col-md-2 col-form-label text-md-end">Department</label>

                            <div class="col-md-8">
                         @foreach ($department as $dep)
                         <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$dep->id}}" name="department_id[]" id="{{$dep->id}}">
                            <label class="form-check-label" for="{{$dep->id}}">
                                {{$dep->name}}
                            </label>
                          </div>
                             @endforeach





                                @error('employee')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>





                        <div style="margin-top: 50px" class="row mb-0">
                            <div class="col-md-4 offset-md-4">
                                <button type="submit" class="btn btn-primary btn-block">
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


@endsection
