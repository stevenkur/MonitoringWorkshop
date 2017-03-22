@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recapitulation User
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Register Application User</li>
        <li class="active">Recapitulation User</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box">
            <!-- SCRIPT SEARCH DAN PAGING MASIH BELUM BISA -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="user" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Full Name</th>
                  <th>Phone Number</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIK</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Username</td>
                  <td>Password</td>
                  <td>Full Name</td>
                  <td>Phone Number</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIK</td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td>Password</td>
                  <td>Full Name</td>
                  <td>Phone Number</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIK</td>
                </tr>
                <tr>
                  <td>Username</td>
                  <td>Password</td>
                  <td>Full Name</td>
                  <td>Phone Number</td>
                  <td>Division</td>
                  <td>Position</td>
                  <td>NIK</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Full Name</th>
                  <th>Phone Number</th>
                  <th>Division</th>
                  <th>Position</th>
                  <th>NIK</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

      </div>
    </section>
  </div>

@stop

<!-- jQuery 2.2.3 -->
<script src="adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- ChartJS 1.0.1 -->
<script src="adminlte/plugins/chartjs/Chart.min.js"></script>
<!-- FastClick -->
<script src="adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="admin/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function() {
    $('#user').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": false,
          "ordering": true,
          "info": true,
          "autoWidth": false
});
  });
</script>
