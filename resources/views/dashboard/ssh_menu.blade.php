@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        SSH
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Montoring Production Workshop</li>
        <li class="active">SSH</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-12">
        <div class="box box-primary">
            {{ Form::open(array('url' => '/ssh_menu', 'class="form"' => 'form-horizontal')) }}
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Activity:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="#">--Select Activity--</option>
                    <option value="1">Recap Material Coming</option>
                    <option value="2">Recap Material Process (Blasting & Shop Primer)</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            {{ form::close() }}
          </div>
          </div>

        <div class="col-md-12">
        <div class="box box-primary">
            
          <div class="box-body">
              <h1>Detail Material Coming</h1>
              <table id="material" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Ship</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress</th>
                  <th>View Detail</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Name of Ship</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Ship</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Ship</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress</td>
                  <td>View Detail</td>
                </tr>
                <tr>
                  <td>Name of Ship</td>
                  <td>Many of Material</td>
                  <td>Many of Material Come</td>
                  <td>Progress</td>
                  <td>View Detail</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name of Ship</th>
                  <th>Many of Material</th>
                  <th>Many of Material Come</th>
                  <th>Progress</th>
                  <th>View Detail</th>
                </tr>
                </tfoot>
              </table>
             </div>
           </div>
        </div>

        <h1><center>-----BATAS-----</center></h1>

        <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
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
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
          </div>

        <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputBlck">Select Block of [Ship_Name]:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="#">-- Block List --</option>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
                    @endforeach
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
          </div>

          <div class="col-md-12">
        <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputStatus">Select Status of Material:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Status List --</option>
                    <option id="1">Received</option>
                    <option id="2">Pending</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
          </div>

          <div class="col-md-12">
          <div class="box box-primary">
  
              <div class="box-body">
              <h1>Plate</h1>  
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Date of Coming</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Date of Coming</th>
                </tr>
                </tfoot>
              </table>
             </div>  
              
           </div>
        </div>

          <div class="col-md-12">
          <div class="box box-primary">
  
              <div class="box-body">
              <h1>Profil</h1>
              <table id="profil" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Date of Coming</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                <tr>
                  <td>ID Material</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                  <td>Date of Coming</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Date of Coming</th>
                </tr>
                </tfoot>
              </table>
             </div>
              
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
<!-- DataTables -->
<script src="adminlte/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="adminlte/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="adminlte/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="adminlte/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="adminlte/dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="adminlte/dist/js/demo.js"></script>
<!-- page script -->
<script>
$(function() {
    $('#material').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#plate').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#profil').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
