@extends('layouts.backend')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Conclusion to All Project
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>Planning Production</li>
        <li class="active">Conclusion to All Project</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-lg-6">
        <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->            
            <form class="form">
            <div class="box-body">
              <label for="inputActivity">Select Workshop:</label>
                <div class="form-group">
                  <select class="form-control" name="workshop">
                    <option value="#">-- Workshop List --</option>
                    <option value="1">SSH Workshop</option>
                    <option value="2">Fabrication Workshop</option>
                    <option value="3">Sub Assembly Workshop</option>
                    <option value="4">Assembly Workshop</option>
                    <option value="5">BBS Workshop</option>       
                    <!-- <option value="6">Erection Process</option> -->           
                  </select>
                </div>

              <div class="box-footer">
                <button method="post" class="btn btn-primary">Choose</button>
              </div>   
            </div>
            </form>

        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
         
          <div class="form-group"><br><br>
            <label> <h3>Total Workload All Project :</h3> </label>
            <label> <h3><b>{{$total_workload[0]->TOTAL}} ton</b></h3> </label><br><br>
          </div>      

        </div>
        </div>
        </div>

        @if(isset($_GET['workshop']))
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Divided of Workload</h3> 
        <table id="ship" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Project</th>
              <th>Start Project</th>
              <th>Target Finish</th>
              <th>Workload</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
                <td>{{ $ships->DISPLACEMENT.' ton' }}</td>
            </tr>
            @endforeach  
          </tbody>
        </table>
        </div>
        </div>
        </div>

        @if($_GET['workshop']==1)
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>SSH Workshop</h3>    
        <table id="ssh" class="table table-bordered table-striped">
            <thead>           
                <tr>
                    <th>Machine</th>
                @foreach($ship as $ships)
                    <th>{{ $ships->PROJECT_NAME }}</th>
                @endforeach  
                </tr>
            </thead>
            <tbody>
                @foreach($ssh as $sshs)
                <tr>    
                <td>{{$sshs->NAME}}</td>
                    @for($i=0; $i<count($ship);$i++)
                        @if($sshs->ACTIVITY=='Straightening')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[8]->COUNT.' ton'}}</td>
                        @elseif($sshs->ACTIVITY=='Blasting&ShopPrimer')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[7]->COUNT.' ton'}}</td>
                        @endif
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        @elseif($_GET['workshop']==2)
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>Fabrication Workshop</h3>    
        <table id="fabrication" class="table table-bordered table-striped">
          <thead>            
            <tr>
              <th>Machine</th>
            @foreach($ship as $ships)
              <th>{{ $ships->PROJECT_NAME }}</th>
            @endforeach  
            </tr>
          </thead>
              <tbody>
                @foreach($fabrication as $fabrications)
                <tr>    
                <td>{{$fabrications->NAME}}</td>
                    @for($i=0; $i<count($ship);$i++)
                        @if($fabrications->ACTIVITY=='Bending')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[6]->COUNT.' ton'}}</td>
                        @elseif($fabrications->ACTIVITY=='Cutting')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[5]->COUNT.' ton'}}</td>
                        @elseif($fabrications->ACTIVITY=='Marking')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[4]->COUNT.' ton'}}</td>
                        @endif
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        @elseif($_GET['workshop']==3)
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>Sub Assembly Workshop</h3>    
        <table id="subassembly" class="table table-bordered table-striped">
          <thead>           
            <tr>
              <th>Machine</th>
            @foreach($ship as $ships)
              <th>{{ $ships->PROJECT_NAME }}</th>
            @endforeach  
            </tr>
          </thead>
            <tbody>
                @foreach($subassembly as $subasss)
                <tr>    
                <td>{{$subasss->NAME}}</td>
                    @for($i=0; $i<count($ship);$i++)
                        @if($subasss->ACTIVITY=='Fairing')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[10]->COUNT.' ton'}}</td>
                        @elseif($subasss->ACTIVITY=='Fitting')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[12]->COUNT.' ton'}}</td>
                        @elseif($subasss->ACTIVITY=='Grinding')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[9]->COUNT.' ton'}}</td>
                        @elseif($subasss->ACTIVITY=='Welding')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[11]->COUNT.' ton'}}</td>
                        @endif
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        @elseif($_GET['workshop']==4)
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>Assembly Workshop</h3>    
        <table id="assembly" class="table table-bordered table-striped">
          <thead>           
            <tr>
              <th>Machine</th>
            @foreach($ship as $ships)
              <th>{{ $ships->PROJECT_NAME }}</th>
            @endforeach  
            </tr>
          </thead>
            <tbody>
                @foreach($assembly as $asss)
                <tr>    
                <td>{{$asss->NAME}}</td>
                    @for($i=0; $i<count($ship);$i++)
                        @if($asss->ACTIVITY=='Fairing')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[1]->COUNT.' ton'}}</td>
                        @elseif($asss->ACTIVITY=='Fitting')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[3]->COUNT.' ton'}}</td>
                        @elseif($asss->ACTIVITY=='Grinding')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[2]->COUNT.' ton'}}</td>
                        @elseif($asss->ACTIVITY=='Welding')
                            <td>{{$ship[$i]->DISPLACEMENT/$count[10]->COUNT.' ton'}}</td>
                        @endif
                    @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        @elseif($_GET['workshop']==5)
        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>BBS Workshop</h3>    
        <table id="bbs" class="table table-bordered table-striped">          
          <thead>
            <tr>
              <th>Room</th>
              <th>Workload Calculate per-Day</th>
            </tr>
          </thead>
          <tbody>
            @foreach($room as $rooms)
            <tr>
                <td>{{ $rooms->ROOM }}</td>
                <td>           
                    {{$ships->DISPLACEMENT/$rooms->AREA.' ton'}}
                </td>
            </tr>
            @endforeach    
          </tbody>
        </table>
        </table>
        </div>
        </div>
        </div>
        @endif
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

<script>
$(function() {
    $('#ship').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#ssh').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#fabrication').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#subassembly').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#assembly').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
    $('#bbs').DataTable({
          "paging": false,
          "lengthChange": true,
          "searching": false,
          "ordering": true,
          "info": false,
          "autoWidth": true
    });
  });
</script>