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

        <div class="col-md-12">
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
          </div>
            
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="col-md-6">
            <div class="box box-primary">
            
            <form role="form">
              <div class="box-body">
                  <h4> New Ship's Project Detail</h4>
                <div class="form-group">
                  <label for="inputProject">Name of Project Ship:</label>
                  <input type="text" class="form-control" id="project_name" placeholder="Enter name of  project">
                </div>
                <div class="form-group">
                  <label for="inputOwner">Owner:</label>
                  <input type="text" class="form-control" id="owner" placeholder="Enter name of owner">
                </div>
                <div class="form-group">
                  <label for="inputType">Type of Ship:</label>
                  <input type="text" class="form-control" id="ship_type" placeholder="Enter type of ship">
                </div>
                <div class="form-group">
                  <label for="inputLWL">Length of Water Line:</label>
                  <input type="text" class="form-control" id="lwl" placeholder="Enter length of water line (m)">
                </div>
                <div class="form-group">
                  <label for="inputLPP">Length between Perpendicular:</label>
                  <input type="text" class="form-control" id="lpp" placeholder="Enter length between perpendicular (m)">
                </div>
                <div class="form-group">
                  <label for="inputBreadth">Breadth (B):</label>
                  <input type="text" class="form-control" id="breadth" placeholder="Enter breadth (m)">
                </div>
                <div class="form-group">
                  <label for="inputDepth">Depth (D):</label>
                  <input type="text" class="form-control" id="depth" placeholder="Enter depth (m)">
                </div>
                <div class="form-group">
                  <label for="inputDraft">Draft (T):</label>
                  <input type="text" class="form-control" id="draft" placeholder="Enter draft (m)">
                </div>
                <div class="form-group">
                  <label for="inputDisplacement">Displacement:</label>
                  <input type="text" class="form-control" id="displacement" placeholder="Enter displacement (ton)">
                </div>
                <div class="form-group">
                  <label for="inputSeaSpeed">Designed Sea Speed:</label>
                  <input type="text" class="form-control" id="sea_speed" placeholder="Enter designed sea speed (knot)">
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Submit</button>
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