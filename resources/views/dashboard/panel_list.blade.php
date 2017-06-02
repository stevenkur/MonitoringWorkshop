@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel List
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Create Ship Project Data</li>
        <li class="active">Panel List</li>
      </ol>
    </section>

        
        <?php 
            if(isset($_GET['project']) && $_GET['project']!='#') 
               $flagProject=true;
            else $flagProject=false;
            if(isset($_GET['block']) && $_GET['block']!='#') 
               $flagBlock=true;
            else $flagBlock=false;
            if(isset($_GET['id']) && $_GET['id']!='#'){ 
                foreach($panel as $panels){
                    if($panels['ID']==$_GET['id']){
                        $id_panel = $_GET['id'];
                        $panel_name = $panels['NAME'];
                        $panel_block = $panels['BLOCK_NAME'];
                        $flagPanel=true;
                        break;
                    }
                }
            }
            else $flagPanel=false;
        ?>
      
    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-6">
        <div class="box box-primary">
        
            <!-- /.box-header -->
            <!-- form start -->            
            <form class="form">
            <div class="box-body">
              <label for="inputActivity">Select Project of Ship:</label>
                <div class="form-group">
                  <select class="form-control" name="project">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $datas[$i] = $data; $i++;?>
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
        </div>
                        
        <div class="col-md-6">
        <div class="box box-primary">
         
            <!-- /.box-header -->
            <!-- form start -->    
            <form class="form">
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
                <button method="post" class="btn btn-primary">Choose</button>
              </div>
            </form>
        </div>
        </div>
            
        <div class="col-md-4">
        <div class="box box-primary">  
            @if($flagPanel)
                <form role="form" action="{{route('panel.update', $id_panel)}}" method="post">
                <input name="_method" type="hidden" value="PATCH">
            @else 
                <form role="form" action="{{route('panel.store')}}" method="post">
                <input name="_method" type="hidden" value="POST">
            @endif
            {{csrf_field()}}
              <div class="box-body">
            @if($flagPanel)      
                  <h4> Update Panel </h4>
                <div class="form-group">
                  <label for="inputPanel">Name of Panel:</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$panel_name}}">
                </div>
                <div class="form-group">
                  <label for="projectID">Block Name:</label>
                  <input class="form-control" name="block_id" value="{{$panel_block}}" disabled>
                </div>
            @else
                  <h4> New Panel </h4>
                <div class="form-group">
                  <label for="inputPanel">Name of Panel:</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter name of panel">   
                </div>
                <div class="form-group">
                  <label for="projectID">Select Block:</label>
                  <select class="form-control" name="block_id">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $data)
                        <?php $datas[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}">{{$data->NAME." - ".$data->PROJECT_NAME}}</option>
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
            <div class="col-md-8">
            <div class="box box-primary">
          <div class="box-body">
              <label for="viewPanel">Panel</label>
              <table id="panel" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>PROJECT</th>
                  <th>BLOCK</th>
                  <th>EDIT</th>
                  <th>DELETE</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($panel as $panels)
                        <?php if($flagBlock && $panels->ID_BLOCK == $_GET['block']){
                        echo '
                        <tr>
                            <td>'.$panels['ID'].'</td>
                            <td>'.$panels['NAME'].'</td>
                            <td>'.$panels['PROJECT_NAME'].'</td>
                            <td>'.$panels['BLOCK_NAME'].'</td>';?>
                            <td><a class="btn btn-primary" type="submit" href="./panel?id={{$panels->ID}}">Edit</a></td>
                            <td>
                                {{ Form::open(array('url' => 'panel/' . $panels->ID)) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                            <?php echo '</td>
                        </tr>';
                        }
                        else if($flagProject && $panels->ID_PROJECT == $_GET['project']){
                        echo '
                        <tr>
                            <td>'.$panels['ID'].'</td>
                            <td>'.$panels['NAME'].'</td>
                            <td>'.$panels['PROJECT_NAME'].'</td>
                            <td>'.$panels['BLOCK_NAME'].'</td>';?>
                            <td><a class="btn btn-primary" type="submit" href="./panel?id={{$panels->ID}}">Edit</a></td>
                            <td>
                                {{ Form::open(array('url' => 'panel/' . $panels->ID)) }}
                                {{ Form::hidden('_method', 'DELETE') }}
                                {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                                {{ Form::close() }}
                            <?php echo '</td>
                        </tr>';
                        }
                        else if(!$flagBlock && !$flagProject){
                        echo '
                        <tr>
                            <td>'.$panels['ID'].'</td>
                            <td>'.$panels['NAME'].'</td>
                            <td>'.$panels['PROJECT_NAME'].'</td>
                            <td>'.$panels['BLOCK_NAME'].'</td>';?>
                            <td><a class="btn btn-primary" type="submit" href="./panel?id={{$panels->ID}}">Edit</a></td>
                            <td>
                                {{ Form::open(array('url' => 'panel/' . $panels->ID)) }}
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
                  <th>PROJECT</th>
                  <th>BLOCK</th>
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
    $('#panel').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>