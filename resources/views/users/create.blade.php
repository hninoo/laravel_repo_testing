@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">Add User</div>

                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="tasks">
                        <!-- The Form to Add a New User -->

                        {!! Form::open(['route'=>'users.save','method'=>'POST']) !!}
                            <div class="form-group">
                                {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter Name')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::text('email','',array('class'=>'form-control','placeholder'=>'Enter Email')) }}
                            </div>

                            <div class="form-group">
                                {{ Form::select('role_id',$roles,0,array('class'=>'form-control','placeholder'=>'<--Select Role-->')) }}
                            </div>



                            <button class="btn btn-primary">
                                Add
                            </button>

                        {!! Form::close() !!}



                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
