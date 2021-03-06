@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Assembly Part List
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Create Ship Project Data</li>
        <li class="active">Assembly Part List</li>
      </ol>
    </section>

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
                    @foreach($ship as $dataShip)
                        <?php $shipData[$i] = $dataShip; $i++;?>
                        <option value="{{$dataShip->ID}}">{{$dataShip->PROJECT_NAME}}</option>
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
                if(isset($_GET['panel']) && $_GET['panel']!='#') 
                   $flagPanel=true;
                else $flagPanel=false;
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
            <form role="form">
              <div class="box-body">
              <label for="inputActivity">Select Panel:</label>
                <div class="form-group">
                  <select class="form-control" name="panel">
                    <option value="#">-- Panel List --</option>
                    <?php $i=1;?>
                    @foreach($panel as $panels)
                        <?php $data_panel[$i] = $panels; $i++;
                        if($flagProject && $panels['ID_PROJECT']==$_GET['project']){
                            echo '<option value="'.$panels['ID'].'">'.$panels['NAME'].'</option>';
                        }
                        else if($flagBlock && $panels['ID_BLOCK']==$_GET['block']){
                            echo '<option value="'.$panels['ID'].'">'.$panels['NAME'].'</option>';
                        }
                        else if(!$flagProject && !$flagBlock){
                            echo '<option value="'.$panels['ID'].'">'.$panels['NAME'].'</option>';
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
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="box box-primary">
            
            <form action="{{route('assembly_part.store')}}" role="form" method="post">
                {{csrf_field()}}
              <div class="box-body">
                  <h4> Input Assembly Part List</h4>
                <div class="form-group">
                  <label for="inputID">ID:</label>
                  <input type="text" class="form-control" id="part_id" name="id" placeholder="Enter id of part">
                </div>
                <div class="form-group">
                  <label for="inputName">Name of Part:</label>
                  <input type="text" class="form-control" id="part_name" name="name" placeholder="Enter name of part">
                </div>
                <div class="form-group">
                  <label for="inputActivity">Select Panel:</label>
                <div class="form-group">
                  <select class="form-control" name="panel_id">
                    <option value="#">-- Panel List --</option>
                    <?php $i=1;?>
                    @foreach($panel as $dataPanel)
                        <?php $panelData[$i] = $dataPanel; $i++;?>
                        <option value="{{$dataPanel->ID}}">{{$dataPanel->NAME}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
                <div class="form-group">
                  <label for="inputDimension">Dimension: (mm)</label>
                  <input type="text" class="form-control" id="part_length" name="length" placeholder="Enter length (mm)"><br>
                  <input type="text" class="form-control" id="part_breadth" name="breadth" placeholder="Enter breadth (mm)"><br>
                  <input type="text" class="form-control" id="part_thickness" name="thickness"  placeholder="Enter thickness (mm)">
                </div>
                <div class="form-group">
                  <label for="inputQuantity">Quantity:</label>
                  <input type="text" class="form-control" id="material_quantityp" name="p"  placeholder="Enter quantity of material (p)"><br>
                  <input type="text" class="form-control" id="material_quantityc" name="c"  placeholder="Enter quantity of material (c)"><br>
                  <input type="text" class="form-control" id="material_quantitys" name="s"  placeholder="Enter quantity of material (s)">
                </div>
                <div class="form-group">
                  <label for="inputWeight">Weight: (kg)</label>
                  <input type="text" class="form-control" id="part_weight" name="weight"  placeholder="Enter weight (kg)">
                </div>
                <div class="form-group">
                  <label for="inputStage">Form:</label>
                  <input type="text" class="form-control" id="part_stage" name="stage"  placeholder="Enter stage">
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

        <section class="col-lg-8">
            <div class="box box-primary">
            <div class="box-body">
              <label for="viewAssemblyPart">Assembly Part</label>
              <div class="table-responsive" style="overflow: auto">
              <table id="assemblypart" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>DIMENSION (mm)</th>
                  <th>QUANTITY</th>
                  <th>WEIGHT (kg)</th>
                  <th>STAGE</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($part as $parts)
                    <?php if($flagBlock && $parts->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$parts['ID'].'</td>
                        <td>'.$parts['NAME'].'</td>
                        <td>'.$parts['LENGTH'].','.$parts['BREADTH'].','.$parts['THICKNESS'].'</td>
                        <td>'.$parts['PORT'].','.$parts['CENTER'].','.$parts['STARBOARD'].'</td>
                        <td>'.$parts['WEIGHT'].'</td>
                        <td>'.$parts['STAGE'].'</td>
                        <td>';?>
                            {{ Form::open(array('url' => 'assembly_part/' . $parts->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';
                    }
                    else if($flagProject && $parts->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$parts['ID'].'</td>
                        <td>'.$parts['NAME'].'</td>
                        <td>'.$parts['LENGTH'].','.$parts['BREADTH'].','.$parts['THICKNESS'].'</td>
                        <td>'.$parts['PORT'].','.$parts['CENTER'].','.$parts['STARBOARD'].'</td>
                        <td>'.$parts['WEIGHT'].'</td>
                        <td>'.$parts['STAGE'].'</td>
                        <td><a class="btn btn-primary" type="submit" href="">Edit</a></td>
                        <td>';?>
                            {{ Form::open(array('url' => 'assembly_part/' . $parts->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';
                    }
                    else if($flagPanel && $parts->ID_PANEL == $_GET['panel']){
                    echo '
                    <tr>
                        <td>'.$parts['ID'].'</td>
                        <td>'.$parts['NAME'].'</td>
                        <td>'.$parts['LENGTH'].','.$parts['BREADTH'].','.$parts['THICKNESS'].'</td>
                        <td>'.$parts['PORT'].','.$parts['CENTER'].','.$parts['STARBOARD'].'</td>
                        <td>'.$parts['WEIGHT'].'</td>
                        <td>'.$parts['STAGE'].'</td>
                        <td>';?>
                            {{ Form::open(array('url' => 'assembly_part/' . $parts->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject && !$flagPanel){
                    echo '
                    <tr>
                        <td>'.$parts['ID'].'</td>
                        <td>'.$parts['NAME'].'</td>
                        <td>'.$parts['LENGTH'].','.$parts['BREADTH'].','.$parts['THICKNESS'].'</td>
                        <td>'.$parts['PORT'].','.$parts['CENTER'].','.$parts['STARBOARD'].'</td>
                        <td>'.$parts['WEIGHT'].'</td>
                        <td>'.$parts['STAGE'].'</td>
                        <td>';?>
                            {{ Form::open(array('url' => 'assembly_part/' . $parts->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';
                        }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>DIMENSION (mm)</th>
                  <th>QUANTITY</th>
                  <th>WEIGHT (kg)</th>
                  <th>STAGE</th>
                  <th>DELETE</th>
                </tr>
                </tfoot>
              </table>
              </div>
            </div>
            </div>
            </section>
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
