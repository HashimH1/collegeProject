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



<table style="margin-top: 100px" class="table">
    <thead class="thead-dark">
      <tr>
        <th scope="col">#</th>
        <th scope="col">name</th>
        <th scope="col">action</th>

      </tr>
    </thead>
    <tbody>

        @foreach ($department as $index=> $depart )

        <tr >
            <th scope="row">{{$index+1}}</th>

            <td>{{$depart->name}}</td>

            <td>
                <a href="{{route('admin.department.edit',$depart->id)}}" class="btn btn-success">Edit</a>
            </td>
          </tr>

        @endforeach



    </tbody>

  </table>

@endsection
