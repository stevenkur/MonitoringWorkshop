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
                
            <?php 
                if(isset($_GET['project']) && $_GET['project']!='#') 
                   $flagProject=true;
                else $flagProject=false;
                if(isset($_GET['block']) && $_GET['block']!='#') 
                   $flagBlock=true;
                else $flagBlock=false;
            ?>
                
                <!-- /.box-header -->
            <!-- form start -->
            <div class="box box-primary">
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

            
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="box box-primary">
            
            <form action="{{route('material_list.store')}}" role="form" method="post">
                {{csrf_field()}}
              <div class="box-body">
                  <h4> Input Material List for [Ship_Name] [Block_Name]</h4>
                <div class="form-group">
                  <label for="inputID">ID:</label>
                  <input type="text" class="form-control" id="material_id" name="id" placeholder="Enter id of material">
                </div>
                <div class="form-group">
                  <label for="inputActivity">Select Block:</label>
                <div class="form-group">
                  <select class="form-control" name="block_id">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $blockData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME}}</option>
                    @endforeach
                  </select>
                </div>
                </div>
                <label for="inputType">Select Type of Material:</label>
                <div class="form-group">
                  <select class="form-control" name="type">
                    <option value="#">-- Type of Material --</option>
                    <option id="1">Plate</option>
                    <option id="2">Profile</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="inputDimension">Dimension (mm):</label>
                  <input type="text" class="form-control" id="material_length" name="length" placeholder="Enter length of material"><br>
                  <input type="text" class="form-control" id="material_breadth" name="breadth" placeholder="Enter breadth of material"><br>
                  <input type="text" class="form-control" id="material_thickness" name="thickness" placeholder="Enter thickness of material"><br>
                  <input type="text" class="form-control" id="material_height" name="height" placeholder="Enter height of material">
                </div>
                <div class="form-group">
                  <label for="inputQuantity">Quantity:</label>
                  <input type="text" class="form-control" id="material_quantityp" name="p"  placeholder="Enter quantity of material (p)"><br>
                  <input type="text" class="form-control" id="material_quantityc" name="c"  placeholder="Enter quantity of material (c)"><br>
                  <input type="text" class="form-control" id="material_quantitys" name="s"  placeholder="Enter quantity of material (s)">
                </div>
                <div class="form-group">
                  <label for="inputWeight">Weight:</label>
                  <input type="text" class="form-control" id="part_weight" name="weight" placeholder="Enter weight">
                </div>
                <div class="form-group">
                  <label for="inputForm">Profile form:</label>
                  <input type="text" class="form-control" id="form" name="form" placeholder="Enter form of profile">
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
        <section class="col-lg-6">
            <div class="box box-primary">
          <div class="box-body">
              <label for="viewPlate">Plate</label>
              <table id="materialPlate" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($plate as $plates)
                    <?php if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$plates['ID'].'</td>                            <td>'.'l='.$plates['LENGTH'].', b='.$plates['BREADTH'].', t='.$plates['THICKNESS'].'</td>
                        <td>p='.$plates['PORT'].', c='.$plates['CENTER'].', s='.$plates['STARBOARD'].'</td>
                        <td>'.$plates['WEIGHT'].'</td>
                    </tr>';
                        }?>
                    @endforeach
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
                
                <div class="box box-primary">
          <div class="box-body">
              <label for="viewProfile">Profile</label>
              <table id="materialProfile" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Form</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($profile as $profiles)
                    <?php if($flagBlock && $plates->ID_BLOCK == $_GET['block']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>       
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                    </tr>';
                    }
                    else if($flagProject && $plates->ID_PROJECT == $_GET['project']){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>       
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                    </tr>';
                    }
                    else if(!$flagBlock && !$flagProject){
                    echo '
                    <tr>
                        <td>'.$profiles['ID'].'</td>   
                        <td>'.'l='.$profiles['LENGTH'].', b='.$profiles['BREADTH'].', t='.$profiles['THICKNESS'].', h='.$profiles['HEIGHT'].'</td>
                        <td>'.'p'.$profiles['PORT'].', c='.$profiles['CENTER'].', s='.$profiles['STARBOARD'].'</td>
                        <td>'.$profiles['WEIGHT'].'</td>
                        <td>'.$profiles['FORM'].'</td>
                    </tr>';
                        }?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Dimension</th>
                  <th>Quantity</th>
                  <th>Weight</th>
                  <th>Form</th>
                </tr>
                </tfoot>
              </table>
            </div>
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
    $('#materialProfile').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
    $('#materialPlate').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
