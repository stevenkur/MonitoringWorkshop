@extends('layouts.backend-userssh')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Recap Material Coming
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>SSH</li>
        <li class="active">Recap Material Coming</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

            <section class="col-lg-4">
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
                if(isset($_GET['status']) && $_GET['status']!='#') 
                   $flagStatus=true;
                else $flagStatus=false;
            ?>
          
            <section class="col-lg-4">
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

            <section class="col-lg-4">
            <div class="box box-primary">
            
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="ShipBlock">
              <div class="box-body">
              <label for="inputActivity">Status:</label>
                <div class="form-group">
                  <select class="form-control" name="status">
                    <option value="#">-- List --</option>
                    <option id="1">Arrived</option>
                    <option id="2">Pending</option>
                  </select>
                </div>
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Choose</button>
              </div>
              </div>
              <!-- /.box-body -->
                
                </form>   
            </div>
        </section>
     
        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
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
                @foreach($plate as $plates)
                    <?php 
                    if($plates['DATE_COMING']==null) $status = 'Pending';
                    else $status = 'Received '.$plates['DATE_COMING'];
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                        if($flagStatus && $_GET['status']=='Arrived'){
                            if($status!='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if($flagStatus && $_GET['status']=='Pending'){
                            if($status=='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if(!$flagBlock){
                            echo '
                            <tr>
                                <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                <td>'.$plates['WEIGHT'].'</td>
                                <td>'.$status.'</td>
                            </tr>';
                        }
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                        if($flagStatus && $_GET['status']=='Arrived'){
                            if($status!='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if($flagStatus && $_GET['status']=='Pending'){
                            if($status=='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if(!$flagBlock){
                            echo '
                            <tr>
                                <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                <td>'.$plates['WEIGHT'].'</td>
                                <td>'.$status.'</td>
                            </tr>';
                        }
                    }                           
                    else if(!$flagBlock && !$flagProject){
                        if($flagStatus && $_GET['status']=='Arrived'){
                            if($status!='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if($flagStatus && $_GET['status']=='Pending'){
                            if($status=='Pending'){
                                echo '
                                <tr>
                                    <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                    <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                    <td>'.$plates['WEIGHT'].'</td>
                                    <td>'.$status.'</td>
                                </tr>';
                            }
                        }
                        else if(!$flagBlock){
                            echo '
                            <tr>
                                <td>'.$plates['ID'].'</td>                            <td>'.$plates['LENGTH'].','.$plates['BREADTH'].','.$plates['THICKNESS'].'</td>
                                <td>'.$plates['PORT'].','.$plates['CENTER'].','.$plates['STARBOARD'].'</td>
                                <td>'.$plates['WEIGHT'].'</td>
                                <td>'.$status.'</td>
                            </tr>';
                        }
                    }?>
                    @endforeach
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
            <!-- /.box-body -->
          </div>
        </div>

        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <h1>Profil</h1>
              <table id="profil" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>ID Material</th>
                    <th>Dimension</th>
                    <th>Quantity</th>
                    <th>Weight</th>
                    <th>Form</th>
                    <th>Date of Coming</th>
                </tr>
                </thead>
                <tbody>
                @foreach($profile as $profiles)
                    <?php 
                    if($profiles['DATE_COMING']==null) $status = 'pending';
                    else $status = 'Received '.$profiles['DATE_COMING'];
                    if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>                            <td>'.$profiles['LENGTH'].','.$profiles['BREADTH'].','.$profiles['THICKNESS'].'</td>
                        <td>'.$profiles['PORT'].','.$profiles['CENTER'].','.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                        <td>'.$status.'</td>
                    </tr>';
                        }?>
                    @endforeach
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
            <!-- /.box-body -->
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
