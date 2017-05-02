@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Create New Ship Project
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Input Ship Project</li>
        <li class="active">Ship Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-6">
        <div class="box box-primary">
         
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form">
            <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control" name="id">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $datas[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->PROJECT_NAME}}</option>
                    @endforeach
                  </select>
                </div>
               
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button method="post" class="btn btn-primary">Choose</button>
            </div>
            </form>
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