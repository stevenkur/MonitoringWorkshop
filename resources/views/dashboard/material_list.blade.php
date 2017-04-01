@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Material List
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Material List</li>
        <li class="active">Input Material List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Ship Project List --</option>
                    <option id="1">Project 1</option>
                    <option id="2">Project 2</option>
                    <option id="3">Project 3</option>
                    <option id="4">Project 4</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
                <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Block:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <option id="1">Block 1</option>
                    <option id="2">Block 2</option>
                    <option id="3">Block 3</option>
                    <option id="4">Block 4</option>
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
                <div class="box box-primary">
          <div class="box-body">
              <table id="material" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>ID</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                </tr>
                <tr>
                  <td>ID</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                </tr>
                <tr>
                  <td>ID</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                </tr>
                <tr>
                  <td>ID</td>
                  <td>Dimension</td>
                  <td>Quantity</td>
                  <td>Weight</td>
                </tr>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                </tr>
                </tfoot>
              </table>
            </div>
            </div>
      </section>
        <section class="col-lg-6">
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="box box-primary">
            
            <form role="form">
              <div class="box-body">
                  <h4> Input Material List for [Ship_Name] [Block_Name]</h4>
                <div class="form-group">
                  <label for="inputID">ID:</label>
                  <input type="text" class="form-control" id="material_id" placeholder="Enter id of material">
                </div>
                <div class="form-group">
                  <label for="inputBlockName">Block Name:</label>
                  <input type="text" class="form-control" id="block_name" placeholder="Enter block name">
                </div>
                <div class="form-group">
                  <label for="inputDimension">Dimension:</label>
                  <input type="text" class="form-control" id="material_length" placeholder="Enter length of material"><br>
                  <input type="text" class="form-control" id="material_breadth" placeholder="Enter breadth of material"><br>
                  <input type="text" class="form-control" id="material_thickness" placeholder="Enter thickness of material">
                </div>
                <div class="form-group">
                  <label for="inputQuantity">Quantity:</label>
                  <input type="text" class="form-control" id="material_quantityp" placeholder="Enter quantity of material (p)"><br>
                  <input type="text" class="form-control" id="material_quantityc" placeholder="Enter quantity of material (c)"><br>
                  <input type="text" class="form-control" id="material_quantitys" placeholder="Enter quantity of material (s)">
                </div>
                <div class="form-group">
                  <label for="inputWeight">Weight:</label>
                  <input type="text" class="form-control" id="part_weight" placeholder="Enter weight">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </section>
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
  });
</script>
