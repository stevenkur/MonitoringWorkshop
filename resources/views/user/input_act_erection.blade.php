@extends('layouts.backend-user')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Activities & Worker
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Erection</li>
        <li class="active">Input Activities & Worker</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <section class="col-lg-12">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipProject">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option id="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $shipData[$i] = $data; $i++;?>
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
            </section>

      <section class="col-lg-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" name="joinblock">
              <div class="box-body">
              <label>Select Block to Join:</label>
              <div class="row">
                <div class="col-lg-6">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                  <select class="form-control">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
                    @endforeach
                  </select>
                </div>  
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
            </form>
        </div>
      </section>

        <section class="col-lg-12">
            <div class="box box-primary">
            <section class="col-lg-6">
            <form role="form">
              <div class="box-body">
                  <h4> Percentage Progress:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="text" id="loading" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="text" id="adjusting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="text" id="fitting" placeholder="">
                  <label> % </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="text" id="welding" placeholder="">
                  <label> % </label>
                </div>

              <h4> Finished Process:</h4>
              <div class="form-group">
                  <label class="col-lg-3"> Loading: </label>
                  <input type="checkbox" id="loading_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Adjusting: </label>
                  <input type="checkbox" id="adjusting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Fitting: </label>
                  <input type="checkbox" id="fitting_finished" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Welding: </label>
                  <input type="checkbox" id="welding_finished" placeholder="">
                </div>
                </section>
                <br>
                <section class="col-lg-6">
                <h4> Welding Process:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Length of join: </label>
                  <input type="text" id="lengthjoin" placeholder="">
                  <label> m </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Finished Wield: </label>
                  <input type="text" id="finishedwield" placeholder="">
                  <label> m </label>
                </div>

                <h4> Duration:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Start Work: </label>
                  <input type="date" id="start" placeholder="">
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Day of Finish Work: </label>
                  <input type="date" id="finish" placeholder="">
                </div>

            </form>
            </section>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Finish</button>
            </div>
          </div>
        </section>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Worker & Time</h3>
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>NIP</th>
                  <th>Position/Division</th>
                  <th>Checklist</th>
                  <th>Was Sick/Accident</th>
                  <th>Was Absent</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Name of Worker</td>
                  <td>NIP</td>
                  <td>Position/Division</td>
                  <td><input type="checkbox" id="checklistok" placeholder=""></td>
                  <td><input type="checkbox" id="checklistsick" placeholder=""></td>
                  <td><input type="checkbox" id="checklistabsent" placeholder=""></td>
                </tr>
                <tr>
                  <td>Name of Worker</td>
                  <td>NIP</td>
                  <td>Position/Division</td>
                  <td><input type="checkbox" id="checklistok" placeholder=""></td>
                  <td><input type="checkbox" id="checklistsick" placeholder=""></td>
                  <td><input type="checkbox" id="checklistabsent" placeholder=""></td>
                </tr>
                <tr>
                  <td>Name of Worker</td>
                  <td>NIP</td>
                  <td>Position/Division</td>
                  <td><input type="checkbox" id="checklistok" placeholder=""></td>
                  <td><input type="checkbox" id="checklistsick" placeholder=""></td>
                  <td><input type="checkbox" id="checklistabsent" placeholder=""></td>
                </tr>
                <tr>
                  <td>Name of Worker</td>
                  <td>NIP</td>
                  <td>Position/Division</td>
                  <td><input type="checkbox" id="checklistok" placeholder=""></td>
                  <td><input type="checkbox" id="checklistsick" placeholder=""></td>
                  <td><input type="checkbox" id="checklistabsent" placeholder=""></td>
                </tr>
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <div class="col-lg-3">
            <div class="box box-primary">
            <div class="box box-body">
            <div class="form-group">
              <label style="font-size: 16px">Input Many Hours of Works: </label><br>
              <input type="text" id="manyhours" placeholder="">
              <label>hours</label>
              <label style="font-size: 16px">Normal Hours (8 Hours)</label> <input type="checkbox" id="checklistok" placeholder="">              
              <label style="font-size: 16px">Additional Hours: </label><br>
              <input type="text" id="additionalhours" placeholder="">
              <label>hours</label>
            </div>
            </div>
            </div>
            </div>

            <div class="col-lg-6">
            <div class="box box-primary">
            <div class="box box-body">
            <div class="form-group">
              <label style="font-size: 16px">Problem: </label>
              <select class="form-control" name="problem">
                <option id="1">No Problem</option>
                <option id="2">Broken Machine</option>
                <option id="3">Worker Sick/Acident</option>
                <option id="4">Power Failure</option>
                <option id="5">Worker Absent</option>
              </select>
              <br>
              <label style="font-size: 16px">Waste Time (If any): </label>
              <input type="text" id="wastetime" placeholder="">
              <label>hours</label>
              <br>
              <label style="font-size: 16px">Shift: </label>
              <select class="form-control" name="shift">
                <option id="1">Shift 1</option>
                <option id="2">Shift 2</option>
              </select>
            </div>
            </div>
            </div>
            </div>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Input</button>
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
    $('#assemblypart').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
