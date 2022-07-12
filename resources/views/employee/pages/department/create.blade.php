@extends('employee.index')

@section('indexContent')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @include('employee.includes.alerts.success')
                @include('employee.includes.alerts.errors')
                <div class="card-header">Add department</div>

                <div class="card-body">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('admin.department.store') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="" required autocomplete="name" autofocus>

                                @error('name')
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
