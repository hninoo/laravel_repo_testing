@extends('adminlte::page')
@section('content')
<div class="container-fluid">
<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <!-- <h3 class="card-title">DataTable with default features</h3> -->
              <button type="button" class="btn btn-success" >Create</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Category Name</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Trident</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Gecko</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Webkit</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>Presto</td>
                </tr>
                <tr>
                  <td>KHTML</td>
                </tr>
                <tr>
                  <td>KHTML</td>
                </tr>
                <tr>
                  <td>KHTML</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                </tr>
                <tr>
                  <td>Tasman</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Misc</td>
                </tr>
                <tr>
                  <td>Other browsers</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Rendering engine</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
@endsection
@section('js')
<script>
  $(function () {
    $("#example1").DataTable();

    // $('#example2').DataTable({
    //   "paging": true,
    //   "lengthChange": false,
    //   "searching": false,
    //   "ordering": true,
    //   "info": true,
    //   "autoWidth": false,
    // });
  });
</script>
@stop
