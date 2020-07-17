@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Task</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div id="tasks">
                        <!-- The Form to Add a New Task -->

                        {!! Form::open(['route'=>'task.save','method'=>'POST']) !!}
                            <div class="form-group">
                                {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter Task')) }}
                            </div>

                            <button class="btn btn-primary">
                                Add Task
                            </button>

                        {!! Form::close() !!}


                        <!-- The List of Todos -->

                        <div>

                                @if(isset($data))
                                <table class="table table-striped">
                                    @foreach ($data as $key=>$item)
                                    <tr>
                                        <td>{{$item->task_name}}</td>
                                        <td>{{$item->status->name}}</td>
                                        <td>

                                            {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                {{ Form::hidden('id',$item->id) }}
                                                <button class="btn btn-xs btn-success" value="{{$status[2]->id}}" name="status">{{$status[2]->name}}</button>
                                            {!! Form::close() !!}

                                            {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                {{ Form::hidden('id',$item->id) }}
                                                <button class="btn btn-xs btn-warning" value="{{$status[1]->id}}" name="status">{{$status[1]->name}}</button>
                                            {!! Form::close() !!}

                                            {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                {{ Form::hidden('id',$item->id) }}
                                                <button class="btn btn-xs btn-danger" value="{{$status[0]->id}}" name="status">{{$status[0]->name}}</button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>

                                    @endforeach
                                </table>

                                @endif


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="{{asset('public/js/custom.js')}}"></script> --}}
@endsection

