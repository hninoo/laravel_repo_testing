@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Role List
                    @can('create_role')
                        <a href="{{route('role.create')}}">

                            <button type="button" class="btn btn-link role-create"><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;&nbsp;Create New Role</button>
                        </a>
                    @endcan
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
                                                @can('create_role')
                                                    {!! Form::open(['route'=>'role.edit','method'=>'get']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-success"><i class="far fa-edit"></i>Edit</button>

                                                    {!! Form::close() !!}
                                                @endcan
                                                @can('delete_role')
                                                    {!! Form::open(['route'=>'role.delete','method'=>'delete']) !!}
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
