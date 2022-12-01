@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Role List
                    @can('create_user')
                        <a href="{{route('users.create')}}">

                            <button type="button" class="btn btn-link role-create"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Create New User</button>
                        </a>
                    @endcan
                </div>

                <div class="card-body">

                        <!-- The List of Users -->



                        <div>

                                @if(isset($users))
                                <table class="table table-striped task-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Role</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key=>$item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td></td>
                                            <td class="row">
                                                @can('edit_user')
                                                    {!! Form::open(['route'=>'users.edit','method'=>'get']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-success"><i class="far fa-edit"></i>Edit</button>

                                                    {!! Form::close() !!}
                                                @endcan
                                                @can('delete_user')
                                                    {!! Form::open(['route'=>'users.delete','method'=>'delete']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-danger"><i class="far fa-times-circle"></i>Delete</button>

                                                    {!! Form::close() !!}
                                                @endcan
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
