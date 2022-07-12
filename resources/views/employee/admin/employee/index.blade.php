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

<div style="margin-top: 30px" class="container">

    {{-- <div style="margin-left: 7%" class="row ">
      <div  class="col col-md-3 Mask">
        <h5 id="">Mask :</h5>
        <h5>{{$statistic[0]->mask}}</h5>
      </div>
      <div class="col col-md-3  Temperature">
        <h5>Temperature :</h5>
        <h5>{{$statistic[0]->temperature}}</h5>
      </div>
      <div class="col col-md-3  Attendance">
        <h5>Attendance :</h5>
        <h5>{{$statistic[0]->Attendance}}</h5>
      </div>

    </div>
  </div> --}}

<table style="margin-top: 100px" class="table">
    <thead class="thead-dark">
      <tr>

        <th scope="col">Name</th>
        <th scope="col">address</th>
        <th scope="col">phone</th>

        <th scope="col">date</th>
        <th scope="col">department</th>
        <th scope="col">email</th>

        <th scope="col">action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($employees as $index=> $employee )

        <tr >

            <td>
                {{$employee->name}}
            </td>
            <td>  {{$employee->address}}</td>
            <td>
                {{$employee->phone}}
            </td>
            <td>
                {{$employee->date}}
            </td>
            <td>
                {{$employee->department->name}}
            </td>
            <td>
                {{$employee->email}}
            </td>
            <td>
                <a href="{{route('admin.employee.info',$employee->id)}}" class="btn btn-info">Info</a>
            </td>
          </tr>

        @endforeach



    </tbody>

  </table>
  {{$employees->links()}}
@endsection
