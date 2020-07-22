@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">Add Role</div>

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
                        <!-- The Form to Add a New Role -->

                        {!! Form::open(['route'=>'role.save','method'=>'POST']) !!}
                            <div class="form-group">
                                {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter Role')) }}
                            </div>
                             @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </span>
                            @endif
                            <div class="row"><h4><i class="fas fa-check-circle"></i>Permissions</h4></div>
                            <div class="row">
                                @foreach ($permissions as $key=>$allPermissions)
                                    <div class="col-3">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="permission[]" id="" value="{{$allPermissions['name']}}">{{$allPermissions['name']}} &nbsp;&nbsp;
                                            </label>
                                        </div>
                                    </div>
                                @endforeach
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
