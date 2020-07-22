@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Role List
                    <a href="{{route('role.create')}}">

                        <button type="button" class="btn btn-link role-create"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Create New Role</button>
                    </a>
                </div>

                <div class="card-body">

                        <!-- The List of Roles -->



                        <div>

                                @if(isset($roles))
                                <table class="table table-striped task-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($roles as $key=>$item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td class="row">
                                                {!! Form::open(['route'=>'role.edit','method'=>'get']) !!}
                                                {{ Form::hidden('id',$item->id) }}
                                                <button class="btn btn-xs btn-success">Edit</button>

                                                {!! Form::close() !!}

                                                {!! Form::open(['route'=>'role.delete','method'=>'delete']) !!}
                                                    {{ Form::hidden('id',$item->id) }}
                                                    <button class="btn btn-xs btn-danger">Delete</button>

                                                {!! Form::close() !!}
                                            </td>
                                        </tr>

                                        @endforeach
                                    </tbody>
                                </table>

                                @endif


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
