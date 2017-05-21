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
        <li>Assembly</li>
        <li class="active">Input Activities & Worker</li>
      </ol>
    </section>

    <section class="content">
    <div class="row">

            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipProject">
              <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                    <select class="form-control">
                    <option value="#">-- Ship Project List --</option>
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
                if(isset($_GET['block']) && $_GET['block']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
                if(isset($_GET['machine']) && $_GET['machine']!='#') 
                   $flagMachine=true;
                else $flagMachine=false;
            ?>
        
            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select Block:</label>
                <div class="form-group">
                  <select class="form-control">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
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
            </section>

        <?php
            if(isset($_GET['process'])){
                $proc = explode('|', $_GET['process']);
                $flagProcess = true;
                if($proc[0]==1) $process = 'Fitting';
                else if($proc[0]==2) $process = 'Welding';
                else if($proc[0]==3) $process = 'Grinding';
                else if($proc[0]==4) $process = 'Fairing';
                $idMaterial = $proc[1];
            }
            else $flagProcess = false;
        ?>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h4 align="right"><b>Target Quantity per Day: [TARGET] Ton</b></h4>
            <h3>Panels</h3>
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Part</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Material Process</th>
                </tr>
                </thead>
                <tbody>
                @foreach($panel as $panels)
                    <?php 
                    if($panels->FITTING<1) $flagFit = false;
                    else $flagFit = true;
                    if($panels->WELDING<1) $flagWeld = false;
                    else $flagWeld = true;
                    if($panels->GRINDING<1) $flagGrind = false;
                    else $flagGrind = true;
                    if($panels->FAIRING<1) $flagFair = false;
                    else $flagFair = true;

                    if($flagBlock && $panels->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td>
                        <td>'.$panels['NAME'].'</td>
                        <td>'.'l='.$panels['LENGTH'].', b='.$panels['BREADTH'].', t='.$panels['THICKNESS'].'</td>
                        <td>p='.$panels['PORT'].', c='.$panels['CENTER'].', s='.$panels['STARBOARD'].'</td>
                        <td>'.$panels['WEIGHT'].'</td>';?>
                        <td>
                          @if(!$flagFit)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="1|<?php echo $panels['ID'];?>">Fitting</option>
                                </select>
                            </form>
                            @elseif(!$flagWeld)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="2|<?php echo $panels['ID'];?>">Welding</option>
                                </select>
                            </form>
                            @elseif(!$flagGrind)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="3|<?php echo $panels['ID'];?>">Grinding</option>
                                </select>
                            </form>
                            @elseif(!$flagFair)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="4|<?php echo $panels['ID'];?>">Fairing</option>
                                </select>
                            </form>
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }
                    else if($flagProject && $panels->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td>
                        <td>'.$panels['NAME'].'</td>
                        <td>'.'l='.$panels['LENGTH'].', b='.$panels['BREADTH'].', t='.$panels['THICKNESS'].'</td>
                        <td>p='.$panels['PORT'].', c='.$panels['CENTER'].', s='.$panels['STARBOARD'].'</td>
                        <td>'.$panels['WEIGHT'].'</td>';?>
                        <td>
                          @if(!$flagFit)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="1|<?php echo $panels['ID'];?>">Fitting</option>
                                </select>
                            </form>
                            @elseif(!$flagWeld)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="2|<?php echo $panels['ID'];?>">Welding</option>
                                </select>
                            </form>
                            @elseif(!$flagGrind)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="3|<?php echo $panels['ID'];?>">Grinding</option>
                                </select>
                            </form>
                            @elseif(!$flagFair)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="4|<?php echo $panels['ID'];?>">Fairing</option>
                                </select>
                            </form>
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$panels['ID'].'</td>
                        <td>'.$panels['NAME'].'</td>
                        <td>'.'l='.$panels['LENGTH'].', b='.$panels['BREADTH'].', t='.$panels['THICKNESS'].'</td>
                        <td>p='.$panels['PORT'].', c='.$panels['CENTER'].', s='.$panels['STARBOARD'].'</td>
                        <td>'.$panels['WEIGHT'].'</td>';?>
                        <td>
                          @if(!$flagFit)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="1|<?php echo $panels['ID'];?>">Fitting</option>
                                </select>
                            </form>
                            @elseif(!$flagWeld)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="2|<?php echo $panels['ID'];?>">Welding</option>
                                </select>
                            </form>
                            @elseif(!$flagGrind)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="3|<?php echo $panels['ID'];?>">Grinding</option>
                                </select>
                            </form>
                            @elseif(!$flagFair)
                            <form action="./input_act_assembly" class="form" method="get">
                                <select class="form-control" name="process" onChange="this.form.submit();">
                                    <option value="#">-- Material Process List --</option>
                                    <option value="4|<?php echo $panels['ID'];?>">Fairing</option>
                                </select>
                            </form>
                            @else
                            Finished
                            @endif
                        </td>
                    <?php echo '</tr>';
                    }?>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          
        </div>
        </div>

        @if($flagProcess)
        <div class="col-md-12">
            <form action="{{route('input_works_assembly')}}" role="form" method="post">
            {{csrf_field()}}
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Worker & Time</h3>
              <table id="tabel2" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>NIK</th>
                  <th>Position/Division</th>
                  <th>Attendance</th>
                  <th>Operator Machine</th>
                </tr>
                </thead>
                <tbody>
                <?php $i=0;?>
                @foreach($worker as $workers)
                <tr>
                  <td>{{$workers->NAME}}</td>
                  <td>{{$workers->NIK}}</td>
                  <td>{{$workers->POSITION.'/'.$workers->DIVISION}}</td>
                  <td>
                    <input name="<?php echo 'id'.$i;?>" type="hidden" value="{{ $workers->ID }}">
                    <input name="<?php echo 'name'.$i;?>" type="hidden" value="{{ $workers->NAME }}">
                    <select class="form-control" name="<?php echo 'attendance'.$i;?>">
<!--                      <option value="#">-- Attendance List --</option>-->
                      <option id="1">Present</option>
                      <option id="2">Was Sick/Accident</option>
                      <option id="3">Was Absent</option>
                    </select>
                  </td>
                  <td>
                      <select class="form-control" id="checklistoperator" name="<?php echo 'operator'.$i;?>" placeholder="">
                        <option value="no">No</option>
                        <option value="ok">Yes</option>
                      </select>  
                    </td>
                </tr>
                <?php $i++;?> 
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->

            <div class="col-lg-3">
                <div class="box box-primary">
                    <div class="box box-body">
                    <div class="form-group">
                        <label style="font-size: 16px">Select Machine: </label><br>
                        <select class="form-control" name="machine">
            <!--                <option value="#">-- Machine List --</option>-->
                            <?php $i=1;?>
                            @foreach($machine as $machines)
                                <?php $blockMachine[$i] = $machines; $i++;?>
                                <option id="{{$machines->ID}}">{{$machines->NAME}}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="box box-body">
                        <div class="form-group">
                            <label style="font-size: 16px">Input Progress </label><br>
                            <input type="text" id="progress" name="progress" placeholder="" value="0">
                            <label> %</label> 
                        </div>
                    </div>
                </div>
            </div>

            <input name="num" type="hidden" value="{{ $worker->count() }}">
            <input name="id_material" type="hidden" value="{{ $idMaterial }}">
            <input name="process" type="hidden" value="{{ $process }}">
            <div class="col-lg-3">
                <div class="box box-primary">
                    <div class="box box-body">
                        <div class="form-group">
                          <label style="font-size: 16px">Input Machine Working Hours: </label><br>
                          <input type="text" id="machinehours" name="machinehours" placeholder="" value="0">
                          <label>hours</label>              
                          <label style="font-size: 16px">Additional Hours: </label><br>
                          <input type="text" id="additionalhours" NAME="machineaddhours" placeholder="" value="0">
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
                              <input type="text" id="wastetime" name="wastetime" placeholder="" value="0">
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
            </form>
        </div>
        @endif

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
    $('#tabel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#tabel2').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>

