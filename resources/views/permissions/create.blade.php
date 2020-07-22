@extends('adminlte::page')

@section('content')
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">Add Permission</div>

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

                        {!! Form::open(['route'=>'permission.save','method'=>'POST']) !!}
                            <div class="form-group">
                                {{ Form::text('name','',array('class'=>'form-control','placeholder'=>'Enter Permission')) }}
                            </div>
                             @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </span>
                            @endif

                            <button class="btn btn-primary">
                                Add
                            </button>

                        {!! Form::close() !!}


                        <!-- The List of Todos -->

                        <div>

                                @if(isset($permissions))
                                <table class="table table-striped task-table">
                                    <thead>
                                        <tr>
                                            <th>Name</th>

                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($permissions as $key=>$item)
                                        <tr>
                                            <td>{{$item->name}}</td>
                                            <td class="row">
                                                <button
                                                data-toggle="modal" data-target="#editModal"
                                                data-id="{{ $item->id }}"
                                                data-name="{{ $item->name }}"
                                                class="btn btn-xs btn-success">
                                                    Edit
                                                </button>

                                                {!! Form::open(['route'=>'permission.delete','method'=>'delete']) !!}
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

<!-- Edit Form -->
<div class="modal fade" id="editModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close"
                data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Edit Permission</h4>
            </div>
            <div class="modal-body">

                {!! Form::open(['route'=>'permission.update','method'=>'POST','id'=>'editForm']) !!}
                    <input type="hidden" name="id" id="id">

                    {{ method_field('patch')}}
                    {{ csrf_field() }}
                    @include('permissions.editform')
                {!! Form::close() !!}
            </div>
            <div class="modal-footer">
                <button type="button"
                class="btn btn-default pull-left"
                data-dismiss="modal">Close</button>
                <button type="button"
                class="btn btn-primary" id="updateBtn">Update</button>
            </div>
        </div> <!-- /.modal-content -->
    </div> <!-- /.modal-dialog -->
</div>
<!-- End Edit Form -->
@endsection
@section('js')
<script>
    // EDIT
    $('#editModal').on('show.bs.modal', function (e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        modal = $(this);
        modal.find('.modal-body #id').val(id);
        modal.find('.modal-body #name').val(name);
    });
    $('#updateBtn').click(function() {
        $('#editForm').submit();
        $('#editModal').modal('hide');
    });
    </script>
@endsection
