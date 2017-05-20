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
                  <select class="form-control" name="project">
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

            <?php 
                if(isset($_GET['project']) && $_GET['project']!='#') 
                   $flagProject=true;
                else $flagProject=false;
                if(isset($_GET['block1']) && $_GET['block1']!='#') 
                   $flagBlock1=true;
                else $flagBlock1=false;
                if(isset($_GET['block2']) && $_GET['block2']!='#') 
                   $flagBlock2=true;
                else $flagBlock2=false;
            ?>

      <section class="col-lg-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->

            <form role="form" name="joinblock">
              <div class="box-body">
              <label>Select Block to Join:</label>
              <div class="row">
                <div class="col-lg-6">
                  <select class="form-control" name="block1">
                    <option id="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6">
                  <select class="form-control" name="block2">
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

        <?php
            if(isset($_GET['process'])){
                $proc = explode('|', $_GET['process']);
                $flagProcess = true;
//                echo $proc[0];
//                echo '<br>';
//                echo $proc[1];
            }
            else $flagProcess = false;
        ?>

        <section class="col-lg-12">
            <div class="box box-primary">
            <form role="form">
            <section class="col-lg-6">
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
                </div>
            </section>
                <br>
                
            <section class="col-lg-6">
                <h4> Welding Process:</h4>
                <div class="form-group">
                  <label class="col-lg-3"> Total Weld: </label>
                  <input type="text" id="lengthjoin" placeholder="">
                  <label> m </label>
                </div>
                <div class="form-group">
                  <label class="col-lg-3"> Finished Weld: </label>
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
            </section>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Finish</button>
            </div>
          </form>
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
                  <th>NIK</th>
                  <th>Position/Division</th>
                  <th>Attendance</th>
                </tr>
                </thead>
                <tbody>
                @foreach($worker as $workers)
                <tr>
                  <td>{{$workers->NAME}}</td>
                  <td>{{$workers->NIK}}</td>
                  <td>{{$workers->POSITION.'/'.$workers->DIVISION}}</td>
                  <td>
                    <select class="form-control" name="process">
                      <option id="#">-- Attendance List --</option>
                      <option id="1">Present</option>
                      <option id="2">Was Sick/Accident</option>
                      <option id="3">Was Absent</option>
                    </select>
                  </td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <div class="col-lg-3">
            <div class="box box-primary">
            <div class="box box-body">
            <div class="form-group">
              <label style="font-size: 16px">Input Work Hours: </label><br>
              <input type="text" id="machinehours" placeholder="">
              <label>hours</label>       
              <label style="font-size: 16px">Additional Hours: </label><br>
              <input type="text" id="additionalhours" placeholder="">
              <label>hours</label>
            </div>
            </div>
            </div>
            </div>

            <div class="col-lg-4">
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
