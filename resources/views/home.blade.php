@extends('adminlte::page')
<style>
    table  tr td  button{
    font-weight: bold;
    background: none;
    border: 0;
    padding: 0;
    margin-left: 5px;
}

</style>
@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">Add Task</div>

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

                        {!! Form::open(['route'=>'task.save','method'=>'POST']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::text('task_name','',array('class'=>'form-control','placeholder'=>'Enter Task')) }}
                            </div>
                             @if ($errors->has('task_name'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('task_name') }}
                                    </span>
                            @endif
                            @can('create_task')
                                <button class="btn btn-primary">
                                    Add Task
                                </button>
                            @endcan

                        {!! Form::close() !!}


                        <!-- The List of Todos -->

                        <div>

                                @if(isset($data))
                                <table class="table table-striped task-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key=>$item)
                                        <tr>
                                            <td>{{$item->task_name}}</td>
                                            <td>{{$item->status->name}}</td>
                                            <td class="row">
                                                @can('edit_task')
                                                    {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-info" value="{{$status[0]->id}}" name="status">{{$status[0]->name}}</button>
                                                    {!! Form::close() !!}

                                                    {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                    {{ Form::hidden('id',$item->id) }}
                                                    <button class="btn btn-xs btn-warning" value="{{$status[1]->id}}" name="status">{{$status[1]->name}}</button>
                                                    {!! Form::close() !!}
                                                    {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-success" value="{{$status[2]->id}}" name="status">{{$status[2]->name}}</button>
                                                    {!! Form::close() !!}
                                                @endcan



                                                @can('delete_task')
                                                    {!! Form::open(['route'=>'task.delete','method'=>'delete']) !!}
                                                        {{ Form::hidden('id',$item->id) }}
                                                        <button class="btn btn-xs btn-danger">Delete</button>

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

