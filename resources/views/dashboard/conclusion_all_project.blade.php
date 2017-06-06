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

        <div class="col-md-12">
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
                    <option value="6">Erection Process</option>                    
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

        <div class="col-lg-12">
        <div class="box box-primary">
        <div class="box-body">
         
          <div class="form-group" align="right">
            <label class="col-lg-10"> <h3><b>Total Workload All Project</b></h3> </label>
            <label class="col-lg-1"> <h3><b>:</b></h3> </label>
            <label> <h3><b>XXX ton</b></h3> </label>
          </div>      

        </div>
        </div>
        </div>

        @if(isset($_GET['workshop']))
        @if($_GET['workshop']==1)
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
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
            </tr>
            @endforeach  
          </tbody>
        </table>
        </div>
        </div>
        </div>

        <div class="col-lg-6">
        <div class="box box-primary">
        <div class="box-body">        
        <h3>SSH Workshop</h3>    

        </div>
        </div>
        </div>
        @elseif($_GET['workshop']==2)
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
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
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
        <h3>Divided of Workload</h3> 
        <table id="ship" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Project</th>
              <th>Start Project</th>
              <th>Target Finish</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
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
        <h3>Divided of Workload</h3> 
        <table id="ship" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Project</th>
              <th>Start Project</th>
              <th>Target Finish</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
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
        <h3>Divided of Workload</h3> 
        <table id="ship" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Project</th>
              <th>Start Project</th>
              <th>Target Finish</th>
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
            </tr>
            @endforeach  
          </tbody>
        </table>
        </div>
        </div>
        </div>


        @elseif($_GET['workshop']==6)
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
            </tr>
          </thead>
          <tbody>
            @foreach($ship as $ships)
            <tr>
                <td>{{ $ships->PROJECT_NAME }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->START)) }}</td>
                <td>{{ date('d-m-Y', strtotime($ships->FINISH)) }}</td>
            </tr>
            @endforeach  
          </tbody>
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
  });
</script>