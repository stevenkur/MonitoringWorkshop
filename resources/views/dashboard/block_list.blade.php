@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Block List
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Create Ship Project Data</li>
        <li class="active">Block List</li>
      </ol>
    </section>

      
          <?php 
            if(isset($_GET['id']) && $_GET['id']!='#') 
               $flag=true;
            else $flag=false;
            if(isset($_GET['id_block']) && $_GET['id_block']!='#') {
                foreach($block as $blocks){
                    if($blocks['ID']==$_GET['id_block']){
                        $id_block = $_GET['id_block'];
                        $block_name = $blocks['NAME'];
                        $block_project = $blocks['PROJECT_NAME'];
                        $block_id_project = $blocks['ID_PROJECT'];
                        $flagBlock=true;
                        break;
                    }
                }
            }
            else $flagBlock=false;
            ?>
      
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-6">
        <div class="box box-primary">
         
            <!-- /.box-header -->
            <!-- form start -->
            
            <form role="form">
            <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control" name="id">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=0;?>
                    @foreach($ship as $data)
                        <?php
                            $dump[$i][1]=$data->ID;
                            $dump[$i][2]=$data->NAME;
                            $dump[$i][3]=$data->PROJECT_NAME;
                            $i++;
                        ?>
                        <option value="{{$data->ID}}">{{$data->PROJECT_NAME}}</option>
                    @endforeach
                  </select>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button method="post" class="btn btn-primary">Choose</button>
              </div>
            </form>
            </div>
            
            <div class="box box-primary">   
                @if($flagBlock)
                    <form role="form" action="{{route('block.update', $id_block)}}" method="post">
                    <input name="_method" type="hidden" value="PATCH">
                @else 
                    <form role="form" action="{{route('block.store')}}" method="post">
                    <input name="_method" type="hidden" value="POST">
                @endif
                {{csrf_field()}}
              <div class="box-body">
                @if($flagBlock)
                  <h4> Update Block </h4>
                <div class="form-group">
                  <label for="inputBlock">Name of Block:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$block_name}}">
                </div>
                <div class="form-group">
                  <label for="projectID">Select Project:</label>
                  <input type="text" value="{{$block_project}}" class="form-control" name="project_name" disabled>
                </div>
                <div class="form-group">
                <input type="text" value="{{$block_id_project}}" class="form-control" name="project_id" style="visibility:hidden">
                </div>
                @else 
                  <h4> New Block </h4>
                  <div class="form-group">
                  <label for="inputBlock">Name of Block:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of block">   
                </div>
                <div class="form-group">
                  <label for="projectID">Select Project:</label>
                  <select class="form-control" name="project_id">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=0;?>
                    @foreach($ship as $data)
                        <option value="{{$data->ID}}">{{$data->PROJECT_NAME}}</option>
                    @endforeach
                  </select>
                </div>
                @endif
                </div>
                
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary">Create</button>
              </div>
            </form>
          </div>
          </div>          
          
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="col-md-6">
            <div class="box box-primary">
          <div class="box-body">
              <label for="viewBlock">Block</label>
              <table id="block" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>PROJECT</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($block as $blocks)
                        <?php if($flag && $blocks->ID_PROJECT == $_GET['id']){
                    echo '<tr>
                        <td>'.$blocks['ID'].'</td>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$blocks['PROJECT_NAME'].'</td>';?>
                        <td><a class="btn btn-primary" type="submit" href="./block?id_block={{$blocks->ID}}">Edit</a></td>
                        <td>
                            {{ Form::open(array('url' => 'block/' . $blocks->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';
                        }
                        else if(!$flag)
                        echo '
                    <tr>
                        <td>'.$blocks['ID'].'</td>
                        <td>'.$blocks['NAME'].'</td>
                        <td>'.$blocks['PROJECT_NAME'].'</td>';?>
                        <td><a class="btn btn-primary" type="submit" href="./block?id_block={{$blocks->ID}}">Edit</a></td>
                        <td>
                            {{ Form::open(array('url' => 'block/' . $blocks->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                            {{ Form::close() }}
                        <?php echo '</td>
                    </tr>';?>
                    @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>PROJECT</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </tfoot>
              </table>
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
    $('#block').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>