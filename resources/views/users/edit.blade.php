@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">Update User</div>

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
                        <!-- The Form to Add a New Task -->

                        {!! Form::open(['route'=>'users.update','method'=>'POST']) !!}
                            {{ csrf_field() }}
                            {{ Form::hidden('id', $user->id) }}
                            <div class="form-group">
                                <div class="row">

                                    <div class="col-2">
                                        {{ Form::label('name','User Name',array('class'=>'control-label'))}}
                                    </div>
                                    <div class="col-10">
                                        {{ Form::text('name',$user->name,array('class'=>'form-control','placeholder'=>'Enter Name')) }}
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        {{ Form::label('email','Email',array('class'=>'control-label'))}}
                                    </div>
                                    <div class="col-10">
                                        {{ Form::email('email',$user->email,array('class'=>'form-control','placeholder'=>'Enter Email')) }}
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-2">
                                        {{ Form::label('role_id','Role',array('class'=>'control-label'))}}
                                    </div>
                                    <div class="col-10">
                                        {{-- {{ Form::select('artist',$artists,$video->artist_id,array('class'=>'form-control','placeholder'=>trans('form.pickup_artist'))) }} --}}


                                        {{ Form::select('role_id',$roles,$user->role_id,array('class'=>'form-control','placeholder'=>'<--Select Role-->')) }}
                                    </div>
                                </div>

                            </div>


                            <div class="form-group">
                                <div class="row">

                                        <div class="col-md-12" align="right">


                                            <button type="submit" class="btn btn-primary"> Update </button>


                                        </div>
                                </div>
                            </div>


                        {!! Form::close() !!}



                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
