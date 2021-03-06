@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Application User
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li class="active">Application User</li>
      </ol>
    </section>

      <?php 
        if(isset($_GET['username'])){
            foreach($user as $users){
                if($users['USERNAME']==$_GET['username']){
                    $username = $users['USERNAME'];
                    $password = $users['PASSWORD'];
                    $fullname = $users['FULL_NAME'];
                    $phone = $users['PHONE_NUMBER'];
                    $division = $users['DIVISION'];
                    $position = $users['POSITION'];
                    $nik = $users['NIK'];
                }
            }
            $flag=true;
        }
        else 
            $flag=false;
      ?>
      
    <!-- Main content -->
    <section class="content">
      <div class="row">
          <section class="col-lg-4">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
                @if($flag)
                    <form role="form" action="{{route('users.update', $username)}}" method="post">
                    <input name="_method" type="hidden" value="PATCH">
                @else 
                    <form role="form" action="{{route('users.store')}}" method="post">
                    <input name="_method" type="hidden" value="POST">
                @endif
                {{csrf_field()}}
              <div class="box-body">
                  @if($flag)
                  <h3> Update User '<?php echo $fullname; ?>' </h3>
                  @else
                  <h3> Register New User</h3>
                  @endif
                <div class="form-group">
                  <label for="inputUsername">Username:</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Enter username" <?php if($flag){ echo 'value='."'$username'"; echo "disabled";}?>>
                </div>
                <div class="form-group">
                  <label for="inputPassword">Password:</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Enter password" <?php if($flag) echo 'value='.$password; ?>>
                </div>
                <div class="form-group">
                  <label for="inputFullName">Full Name:</label>
                  <input type="text" class="form-control" id="fullname" name="fullname"  placeholder="Enter full name"  <?php if($flag) echo 'value='."'$fullname'"; ?>>
                </div>
                <div class="form-group">
                  <label for="inputPhoneNumber">Phone Number:</label>
                  <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter phone number"  <?php if($flag) echo 'value='.$phone; ?>>
                </div>
                <div class="form-group">
                  <label for="inputDivision">Division:</label>
                  <select class="form-control" name="division" id="division">
                    <option value="#" <?php if($flag&&$division=='#') echo 'selected'; ?>>--Select Division--</option>
                    <option id="1" <?php if($flag&&$division=='PPC/Admin') echo 'selected'; ?>>PPC/Admin</option>
                    <option id="2"<?php if($flag&&$division=='Steel Stock House') echo 'selected'; ?>>Steel Stock House</option>
                    <option id="3"<?php if($flag&&$division=='Fabrication') echo 'selected'; ?>>Fabrication</option>
                    <option id="4"<?php if($flag&&$division=='Sub Assembly') echo 'selected'; ?>>Sub Assembly</option>
                    <option id="5"<?php if($flag&&$division=='Assembly') echo 'selected'; ?>>Assembly</option>
                    <option id="6"<?php if($flag&&$division=='Block Blasting Structure') echo 'selected'; ?>>Block Blasting Structure</option>
                    <option id="7"<?php if($flag&&$division=='Erection') echo 'selected'; ?>>Erection</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputPosition">Position:</label>
                  <input type="text" class="form-control" id="position" name="position"  placeholder="Enter position" <?php if($flag) echo 'value='."'$position'"; ?>>
                </div>
                <div class="form-group">
                  <label for="inputNIK">NIK:</label>
                  <input type="text" class="form-control" id="nik" name="nik"  placeholder="Enter NIK"  <?php if($flag) echo 'value='."'$nik'"; ?>>
                </div>
                
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">
                    <?php if($flag) echo 'Update';
                        else echo 'Submit';?>
                </button>
              </div>
            </form>
          </div>
          </section>
          
        <section class="col-lg-8">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <label for="viewUser">User</label>
              <div class="table-responsive" style="overflow: auto">
              <table id="user" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>FULL NAME</th>
                  <th>PHONE NUMBER</th>
                  <th>DIVISION</th>
                  <th>POSITION</th>
                  <th>NIK</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($user as $users)
                <tr>
                    <td>{{$users->USERNAME}}</td>
                    <td>{{$users->PASSWORD}}</td>
                    <td>{{$users->FULL_NAME}}</td>
                    <td>{{$users->PHONE_NUMBER}}</td>
                    <td>{{$users->DIVISION}}</td>
                    <td>{{$users->POSITION}}</td>
                    <td>{{$users->NIK}}</td>
                    <td>
                        <a class="btn btn-primary" type="submit" href="./users?username={{$users->USERNAME}}">Edit</a>
                    </td>
                    <td>
                        {{ Form::open(array('url' => 'users/' . $users->USERNAME)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>FULL NAME</th>
                  <th>PHONE NUMBER</th>
                  <th>DIVISION</th>
                  <th>POSITION</th>
                  <th>NIK</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          </section>

      </div>
    </section>
  </div>

@stop
<!-- jQuery 2.2.3 -->
<script src="public/adminlte/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="public/adminlte/bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="public/adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="public/adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="public/adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="public/adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="public/adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="public/adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function() {
    $('#user').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
});
</script>
