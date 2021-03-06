@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ship Project
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Create Ship Project Data</li>
        <li class="active">Ship Project</li>
      </ol>
    </section>

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
                  <select class="form-control" name="id">
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
            
            <!-- /.box-header -->
            <!-- form start -->  
            <div class="col-md-6">
            <div class="box box-primary">  
            
            <?php 
                if(isset($_GET['id']) && $_GET['id']!='0' && $_GET['id']!='#'){
                    $flag = true;
                    for($j=1; $j<$i; $j++){
                        if($datas[$j]->ID == $_GET['id']){
                            $ship = $datas[$j];
                            break;
                        }
                    }?>
                    @if($data->where('id','=',$_GET['id']))
                        <?php $flag2=true;?>
                    @else 
                        <?php $flag2=false;?>
                    @endif
                <?php }
                else $flag = false;
            ?>
    
            <form 
                  @if($flag && $flag2) action="{{route('ship_project.update', $_GET['id'])}}" 
                  @else action="{{route('ship_project.store')}}" 
                  @endif                                            
                  role="form" method="post">
                @if($flag && $flag2) <input name="_method" type="hidden" value="PATCH"> @endif
                {{csrf_field()}}
              <div class="box-body">
                  <h4> @if(isset($flag2) && isset($flag) && $flag2 && $flag) 
                      {{$ship->PROJECT_NAME }}
                      @else {{'New Ship Project Detail'}}
                        @endif</h4>
                <div class="form-group">
                  <label for="inputProject">Name of Project Ship:</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="project_name" name="project_name" value="{{$ship->PROJECT_NAME}}">
                    @else    
                    <input type="text" class="form-control" id="project_name" name="project_name" placeholder="Enter name of  project">              
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputOwner">Owner:</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="owner" name="owner" value="{{$ship->OWNER}}">
                    @else    
                    <input type="text" class="form-control" id="owner" name="owner" placeholder="Enter name of owner">            
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputType">Type of Ship:</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="ship_type" name="ship_type" value="{{$ship->SHIP_TYPE}}">
                    @else       
                    <input type="text" class="form-control" id="ship_type" name="ship_type" placeholder="Enter type of ship">         
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputLWL">Length of Water Line (m):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="lwl" name="lwl" value="{{$ship->LWL}}">
                    @else      
                    <input type="text" class="form-control" id="lwl" name="lwl" placeholder="Enter length of water line (m)">          
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputLPP">Length between Perpendicular (m):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="lpp" name="lpp" value="{{$ship->LPP}}">
                    @else      
                    <input type="text" class="form-control" id="lpp" name="lpp" placeholder="Enter length between perpendicular (m)">          
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputBreadth">Breadth (B) (m):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="breadth" name="breadth" value="{{$ship->BREADTH}}">
                    @else     
                    <input type="text" class="form-control" id="breadth" name="breadth" placeholder="Enter breadth (m)">           
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputDepth">Depth (D) (m):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="depth" name="depth" value="{{$ship->DEPTH}}">
                    @else       
                    <input type="text" class="form-control" id="depth" name="depth" placeholder="Enter depth (m)">         
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputDraft">Draft (T) (m):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="draft" name="draft" value="{{$ship->DRAFT}}">
                    @else      
                    <input type="text" class="form-control" id="draft" name="draft" placeholder="Enter draft (m)">          
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputDisplacement">Construction Weight (ton):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="displacement" name="displacement" value="{{$ship->DISPLACEMENT}}">
                    @else       
                    <input type="text" class="form-control" id="displacement" name="displacement" placeholder="Enter construction weight (ton)">         
                    @endif
                </div>
                <div class="form-group">
                  <label for="inputSeaSpeed">Designed Sea Speed (knot):</label>
                    @if($flag && $flag2)
                    <input type="text" class="form-control" id="sea_speed" name="sea_speed" value="{{$ship->DESIGNED_SPEED}}">  
                    @else 
                    <input type="text" class="form-control" id="sea_speed" name="sea_speed"       placeholder="Enter designed sea speed (knot)">               
                    @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDateStart">Start:</label>
                    @if($flag && $flag2)
                    <input type="date" class="form-control" id="start" name="start" value="{{$ship->START}}">  
                    @else 
                    <input type="date" class="form-control" id="start" name="start"       placeholder="Enter when the project begin">               
                    @endif
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDateFinish">Finish:</label>
                    @if($flag && $flag2)
                    <input type="date" class="form-control" id="finish" name="finish" value="{{$ship->FINISH}}">  
                    @else 
                    <input type="date" class="form-control" id="finish" name="finish"       placeholder="Enter when the project must be finished">               
                    @endif
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="reset" class="btn btn-default">Reset</button>
                <button type="submit" class="btn btn-primary"><?php if($flag && $flag2) echo 'Update'; else echo 'Create';?></button>
                @if($flag && $flag2) 
                    {{ Form::open(array('url' => 'ship_project/' . $_GET['id'])) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                    {{ Form::close() }}
                @endif
              </div>
            </form>
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