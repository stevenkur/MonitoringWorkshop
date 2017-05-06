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
        <li>SSH</li>
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
                if(isset($_GET['block']) && $_GET['block']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
            ?>
        
            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Select BLock:</label>
                <div class="form-group">
                  <select class="form-control" name="block">
                    <option id="#">-- Block List --</option>
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

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h4 align="right"><b>Target Quantity per Day: [TARGET] Plate</b></h4>
            <h3>Material List Plate</h3>
              <table id="tabel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Material Process</th>
                  <th>Machine Process</th>
                  <th>Confirmation</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plate as $plates)
                    <?php if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>
                          <select class="form-control" name="process">
                            <option id="#">-- Material Process List --</option>
                            <option id="1">Straightening</option>
                            <option id="2">Blasting & Shop Primer</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" name="machine">
                            <option id="#">-- Machine Process List --</option>
                            <option id="1">Rool Machine</option>
                            <option id="2">Shoot Blasting & Primering Machine</option>
                          </select>
                        </td>
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">INPUT</button>
                            </form>
                            @endif
                        <?php echo '</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>
                          <select class="form-control" name="process">
                            <option id="#">-- Material Process List --</option>
                            <option id="1">Straightening</option>
                            <option id="2">Blasting & Shop Primer</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" name="machine">
                            <option id="#">-- Machine Process List --</option>
                            <option id="1">Rool Machine</option>
                            <option id="2">Shoot Blasting & Primering Machine</option>
                          </select>
                        </td>
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">INPUT</button>
                            </form>
                            @endif
                        <?php echo '</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            
                        <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                        <td>
                          <select class="form-control" name="process">
                            <option id="#">-- Material Process List --</option>
                            <option id="1">Straightening</option>
                            <option id="2">Blasting & Shop Primer</option>
                          </select>
                        </td>
                        <td>
                          <select class="form-control" name="machine">
                            <option id="#">-- Machine Process List --</option>
                            <option id="1">Rool Machine</option>
                            <option id="2">Shoot Blasting & Primering Machine</option>
                          </select>
                        </td>
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">INPUT</button>
                            </form>
                            @endif
                        <?php echo '</td>
                    </tr>';
                        }?>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
            <h3>Worker & Time</h3>
              <table id="worker" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name of Worker</th>
                  <th>NIP</th>
                  <th>Position/Division</th>
                  <th>Checklist</th>
                  <th>Was Sick/Accident</th>
                  <th>Was Absent</th>
                  <th>Operator</th>
                </tr>
                </thead>
                <tbody>
                @foreach($worker as $workers)
                <tr>
                  <td>{{$workers->NAME}}</td>
                  <td>{{$workers->NIP}}</td>
                  <td>{{$workers->POSITION.'/'.$workers->DIVISION}}</td>
                  <td><input type="checkbox" id="checklistok" placeholder=""></td>
                  <td><input type="checkbox" id="checklistsick" placeholder=""></td>
                  <td><input type="checkbox" id="checklistabsent" placeholder=""></td>
                  <td>
                    <select class="form-control">
                    <option id="0">Not Operator</option>
                    <option id="1">Operator Rool Machine</option>
                    <option id="2">Operator Shoot Blasting & Primering Machine</option>
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
              <label style="font-size: 16px">Input Machine Working Hours: </label><br>
              <input type="text" id="machinehours" placeholder="">
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
    $('#tabel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
