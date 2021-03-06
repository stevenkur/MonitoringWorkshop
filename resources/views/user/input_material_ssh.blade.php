@extends('layouts.backend-userssh')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Input Material Coming
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>SSH</li>
        <li class="active">Input Material Coming</li>
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
                  <select class="form-control" name="project">
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
            ?>
          
            <section class="col-lg-6">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Block:</label>
                <div class="form-group">
                  <select class="form-control" name="block">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $blocks)
                      <?php 
                        $data_block[$i] = $blocks; $i++;
                        if($flagProject && $blocks['ID_PROJECT']==$_GET['project']){
                            echo '<option value="'.$blocks['ID'].'">'.$blocks['NAME'].'</option>';
                        }
                        else if(!$flagProject){
                            echo '<option value="'.$blocks['ID'].'">'.$blocks['NAME'].'</option>';
                        }?>
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
            <h3>Plate</h3>
              <table id="plate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Checklist</th>
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
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
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
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
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
                        <td>';?>
                            @if ($plates->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_plate', $plates->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $plates->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
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
            <h3>Profile</h3>
              <table id="profile" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Material</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Checklist</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profile as $profiles)
                    <?php if($flagBlock && $profiles->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>    
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>';?>
                            @if ($profiles->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_profile', $profiles->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $profiles->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
                            </form>
                            @endif
                        <?php echo '</td>
                    </tr>';
                    }
                    else if($flagProject && $profiles->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td> 
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>';?>
                            @if ($profiles->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_profile', $profiles->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $profiles->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
                            </form>
                            @endif
                        <?php echo '</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>     
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>';?>
                            @if ($profiles->DATE_COMING==null)
                            <form method="post"  action="{{route('confirm_material_profile', $profiles->ID)}}">
                                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                <input name="id" type="hidden" value="{{ $profiles->ID }}">
                                <button type="submit" class="btn btn-primary" id="confirmMaterial" placeholder="">CONFIRM COMING</button>
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

        <div class="box-footer" align="right">
          <label style="font-size: 16px">Date of Coming: </label>
          <input type="date" id="dateofcoming" placeholder="">
          <button type="submit" class="btn btn-primary">Input</button>
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
    $('#plate').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#profile').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
