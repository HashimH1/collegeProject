<style>
    tr:nth-child(even) {background: #CCC}

  .Mask ,.Temperature , .Attendance{
    background-color: rgb(81, 126, 211);
    border-radius: 10px;
    height: 100px;
    text-align: center;
    word-wrap: break-word;
    overflow: hidden;
  }
  .Temperature{
    background-color: rgb(211, 81, 98);

    margin-left: 50px;

  }

  .Attendance{
    background-color: rgb(81, 211, 124);

    margin-left: 50px;

  }
  .col h5{
    margin-top: 5%;
  }
</style>
@extends('employee.index')

@section('indexContent')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                {{-- @include('employee.includes.alerts.success')
                @include('employee.includes.alerts.errors') --}}
                <div class="card-header">statistics search</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="GET" action="{{ route('statSearch.index') }}">
                        @csrf

                        <div class="row mb-2 offset-md-1">
                            <label for="name" class="col-md-1 col-form-label text-md-end">Days</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="day" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- <label for="name" class="col-md-3 col-form-label text-md-end">days of attendance</label>

                            <div class="col-md-3">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="dayAttendance" value="" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                        </div>



                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                   Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<table style="margin-top: 100px" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Temperature</th>
        <th scope="col">Mask</th>
        <th scope="col">Attendance</th>

      </tr>
    </thead>
    <tbody>



     @isset($statistics)


     @foreach ($statistics as $stat )
     <tr >
         <th scope="row"></th>
         <td>{{$stat['name']}}</td>
         <td>{{$stat['email']}}</td>
         <td>{{$stat['temperature']}} </td>
         <td>{{$stat['mask']}} </td>
         <td>{{$stat['Attendance']}}</td>


    </tr>
     @endforeach

     @endisset











    </tbody>

  </table>

@endsection
