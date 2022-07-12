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

    <div style="margin-left: 7%" class="row ">
      <div  class="col col-md-3 Mask">
        <h5 id="">Mask :</h5>
        <h5>{{$statistic[0]->mask}}</h5>
      </div>
      <div class="col col-md-3  Temperature">
        <h5>Temperature :</h5>
        <h5>{{$statistic[0]->temperature / $statistic[0]->Attendance}}</h5>
      </div>
      <div class="col col-md-3  Attendance">
        <h5>Attendance :</h5>
        <h5>{{$statistic[0]->Attendance}}</h5>
      </div>

    </div>
  </div>

<table style="margin-top: 100px" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">mask</th>
        <th scope="col">temperature</th>
        <th scope="col">Attendance</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($statistics as $index=> $statistic )

        <tr >
            <th scope="row">{{$index+1}}</th>
            <td>
                @if($statistic->mask==1)
                <a class="btn btn-success">YES</a>
                @else
                <a class="btn btn-danger">NO</a>
                @endif
            </td>
            <td>{{$statistic->temperature}}</td>
            <td>
                @if($statistic->Attendance==1)
                <a class="btn btn-success">YES</a>
                @else
                <a class="btn btn-danger">NO</a>
                @endif
            </td>
            <td>
                {{$statistic->created_at}}
            </td>
          </tr>

        @endforeach



    </tbody>

  </table>

@endsection
