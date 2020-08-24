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
                    <div>
                        <!-- The Form to Add a New Task -->

                        {!! Form::open(['route'=>'task.save','method'=>'POST']) !!}
                            {{ csrf_field() }}
                            <div class="form-group">
                                {{ Form::text('task_name','',array('class'=>'form-control','placeholder'=>'Enter Task')) }}
                            </div>
                            <div class="form-group">
                                {{ Form::textarea('description','',array('class'=>'form-control','placeholder'=>'Description','id'=>'description')) }}
                            </div>
                            @can('create_task')
                                <button class="btn btn-primary">
                                    <i class="fas fa-plus-circle"></i>
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
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @foreach ($data as $key=>$item)
                                            <tr>
                                                {{-- <td>{!! Form::checkbox('id', $item->id,'', array('class'=>'todols')) !!}</td> --}}
                                                <td>{{$item->task_name}}</td>
                                                <td>{{$item->status->name}}</td>
                                                <td>{!! $item->description !!}</td>
                                                <td class="row">
                                                    @can('edit_task')
                                                        {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                            {{ Form::hidden('id',$item->id) }}

                                                            <button class="btn btn-xs btn-info" value="{{$status[0]->id}}" name="status"><i class="far fa-play-circle"></i>{{$status[0]->name}}

                                                            </button>
                                                        {!! Form::close() !!}

                                                        {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                            {{ Form::hidden('id',$item->id) }}
                                                            <button class="btn btn-xs btn-warning" value="{{$status[1]->id}}" name="status"><i class="fas fa-bug"></i>{{$status[1]->name}}

                                                            </button>
                                                        {!! Form::close() !!}

                                                        {!! Form::open(['route'=>'task.assign','method'=>'POST']) !!}
                                                            {{ Form::hidden('id',$item->id) }}
                                                            <button class="btn btn-xs btn-success" value="{{$status[2]->id}}" name="status"><i class="fas fa-check-double"></i>{{$status[2]->name}}

                                                            </button>
                                                        {!! Form::close() !!}
                                                    @endcan
                                                    {{-- {!! Form::open(['route'=>'task.print','method'=>'get']) !!}
                                                            {{ Form::hidden('id',$item->id) }}
                                                            <button class="btn btn-xs btn-danger"><i class="far fa-times-circle"></i>Print</button>

                                                    {!! Form::close() !!} --}}

                                                    <div>
                                                        <a href="javascript:void(0)" id="print" class="btn btn-xs btn-default" onclick="print({{$item->id}})">
                                                            <i class="fa fa-print"></i>Print
                                                        </a>
                                                    </div>

                                                    @can('delete_task')
                                                        {!! Form::open(['route'=>'task.delete','method'=>'delete']) !!}
                                                            {{ Form::hidden('id',$item->id) }}
                                                            <button class="btn btn-xs btn-danger"><i class="far fa-times-circle"></i>Delete</button>

                                                        {!! Form::close() !!}
                                                    @endcan

                                                </td>
                                            </tr>
                                            <input type="hidden" name="hiddenid[]" value="{{$item->id}}" class="hiddenid">
                                            @endforeach

                                    </tbody>

                                    <tfoot>

                                        <tr>

                                            <td colspan="2">
                                                <div class="row">
                                                    <div class="col-2">
                                                        All <br> {!! Form::checkbox('id','','', array('id'=>'selectall')) !!}
                                                    </div>
                                                    <div class="col-10">
                                                        {!! Form::open(['route'=>'task.generatepdf','method'=>'GET']) !!}
                                                            <div id="pdf"></div>
                                                            <button class="btn btn-primary pdfexport" type="submit"><i class="fas fa-file-export"></i>Export PDF</button>
                                                        {!! Form::close() !!}
                                                    </div>

                                                </div>

                                            </td>
                                            <td  style="text-align: right;">

                                               {!! Form::open(['route' => 'task.export' , 'method'=>'GET']) !!}
                                                    <button class="btn btn-primary" type="submit"><i class="fas fa-file-export"></i>Export Excel</button>
                                               {!! Form::close() !!}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                @endif


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection
@section('adminlte_js')
<script>
$(document).ready(function(){

    let n = $('.hiddenid').length;
    let array = $('.hiddenid');
    $('#selectall').click(function() {
            if ($(this).is(':checked')) {
                for(i=0;i<n;i++)
                {

                    value =  array[i].value;
                    $("#pdf").html(array);
                }
                $('input.todols').attr('checked', true);
            } else {
                $("#pdf").html('');
                $('input.todols').attr('checked', false);
            }
        });

        // $('input[type="checkbox"]').click(function(){

        //     if($(this).prop("checked") == true){

        //         $("#pdf").html("<input type='hidden' name='hiddenid[]' value='"+$(this).val()+"'>");
        //     }

        //     else if($(this).prop("checked") == false){

        //         $("#pdf").html("");

        //     }

        // });

        // $('.pdfexport').click(function() {
        //     let ls = [];
        //     $.each($("input[name='id']:checked"), function(){
        //         ls.push($(this).val());

        //     });
        //     $("#pdf").html()
        //     alert(ls);
        // });


});

$('#description').summernote({
    	height: 100,
    	
    	toolbar: [
   		
	    ['style', ['bold', 'italic', 'underline']],
	    
	    ['fontsize', ['fontsize']],

	    ['color', ['color']],

	  ],
	  
    });

function print(id){
    var formData = {id: id}
    var my_url = "{!! route('task.print') !!}";
    $.ajax({
        type: "GET",
        url: my_url,
        data: formData,
        dataType : 'text',
        success: function(result) {
            var a = document.createElement('a');
            var pdfAsDataUri = "data:application/pdf;base64,"+ result;
            a.download = 'todotask.pdf';
            a.type = 'application/pdf';
            a.href = pdfAsDataUri;
            var winparams = 'dependent=yes,locationbar=no,scrollbars=yes,menubar=yes,'+
            'resizable,screenX=50,screenY=50,width=850,height=1050';
            var htmlPop = '<embed width=100% height=100%'
                         + ' type="application/pdf"'
                         + ' src="data:application/pdf;base64,'
                         + escape(result)
                         + '"></embed>';
            var printWindow = window.open ("", "PDF", winparams);
            printWindow.document.write (htmlPop);


        },
        error:function(xhr, status, error){
            console.log("Error");
        }

    });
}

</script>
@stop

