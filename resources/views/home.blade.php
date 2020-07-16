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
                        {!! Form::open(['route'=>'task.save','method'=>'POST','id'=>'audio_create_form']) !!}
                        {{-- <form v-on="submit: addTask"> --}}
                            <div class="form-group">
                                <input v-model="newTask"
                                       v-el="newTask"
                                       class="form-control"
                                       placeholder="I need to...">
                            </div>

                            <button class="btn btn-primary">
                                Add Task
                            </button>

                        {!! Form::close() !!}
                        {{-- </form> --}}

                        <!-- The List of Todos -->
                        <div v-show="remaining.length">
                            <h1>Tasks (@{{ remaining.length }})</h1>

                            <ol class="list-group">
                                <li v-repeat="task: remaining"class="list-group-item">
                                    <span>@{{ task.body }}</span>

                                    <button v-on="click: removeTask(task)">&#10007;</button>
                                    <button v-on="click: toggleTaskCompletion(task)">&#10004</button>
                                </li>
                            </ol>
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('public/js/custom.js')}}"></script>
@endsection

