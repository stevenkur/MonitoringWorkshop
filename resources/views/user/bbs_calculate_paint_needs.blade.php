@extends('layouts.backend-userbbs')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Calculation Paint Needs
      </h1>
      <ol class="breadcrumb">
        <li><i class="fa fa-dashboard"></i> Home</li>
        <li>BBS</li>
        <li class="active">Calculation Paint Needs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
    
        <div class="col-md-12">
        <div class="box box-primary">
            <!-- /.box-header -->
            <div class="box-body">
              <table id="machine" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Ship Project</th>
                  <th>Block</th>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area(m<sup>2</sup>)</th>
                  <th>Total Layer</th>
                  <th>Paint Type</th>
                  <th>Volume Solid (%)</th>
                  <th>Paint Needs (litre(s))</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($room as $rooms)
                <tr>
                    <td>{{$rooms->PROJECT_NAME}}</td>
                    <td>{{$rooms->BLOCK_NAME}}</td>
                    <td>{{$rooms->ROOM}}</td>
                    <td>{{$rooms->SIDE}}</td>
                    <td>{{$rooms->FRAME}}</td>
                    <td>{{$rooms->DECK}}</td>
                    <td>{{$rooms->AREA}}</td>
                    <td>{{$rooms->TOTAL_LAYER}}</td>
                    <td>{{$rooms->PAINT_TYPE}}</td>
                    <td>{{$rooms->VOLUME_SOLID}}</td>
                    <td>{{$rooms->PAINT_NEEDS}}/{{$rooms->PAINT_NEEDS*$rooms->TOTAL_LAYER}}</td>
                    <td>
                        {{ Form::open(array('url' => 'bbs_delete_paint_needs/' . $rooms->ID)) }}
                            {{ Form::hidden('_method', 'DELETE') }}
                            {{ Form::submit('Delete', array('onclick'=>"return confirm('Anda yakin akan menghapus data ?');", 'class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Ship Project</th>
                  <th>Block</th>
                  <th>Room</th>
                  <th>Side</th>
                  <th>Frame</th>
                  <th>Deck</th>
                  <th>Area(m<sup>2</sup>)</th>
                  <th>Total Layer</th>
                  <th>Paint Type</th>
                  <th>Volume Solid (%)</th>
                  <th>Paint Needs (litre(s))</th>
                  <th>Delete</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        </div> 
        <section class="col-lg-8">
        <div class="box box-primary">

        <form role="form" action="{{route('add_rooms')}}" method="post">
        {{csrf_field()}}
        <h3>Insert Rooms</h3>
                <br>
        <div class="box-body">
                <div class="form-group">
                  <label class="col-lg-3"> Ship Project </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <select class="form-control" name="project">
                    <option value="#">-- Ship Project List --</option>
                    <?php $i=1;?>
                    @foreach($ship as $data)
                        <?php $shipData[$i] = $data; $i++;?>
                        <option value="{{$data->ID}}|<?php echo $data['PROJECT_NAME'];?>">{{$data->PROJECT_NAME}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Block </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <select class="form-control" name="block">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $datas)
                        <?php $blockData[$i] = $datas; $i++;?>
                        <option value="{{$datas->ID}}|<?php echo $datas['NAME'];?>">{{$datas->NAME}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Room </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="room" name="room" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Side </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="side" name="side" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Frame </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="frame" name="frame" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Deck </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="deck" name="deck" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Area </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="area" name="area" placeholder="" style="width:250px">
                  <label> m<sup>2</sup> </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Dry Film Thickness </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="dft" name="dft" placeholder="" style="width:250px">
                  <label> mikron </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Volume Solid </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="vs" name="vs" placeholder="" style="width:250px">
                  <label> % </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Loss Factor </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="lf" name="lf" placeholder="" style="width:250px">
                  <label> % </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Total Layer </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="layer" name="layer" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-3"> Paint Type </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="painttype" name="painttype" placeholder="" style="width:250px">
                  </div>
                </div>
                <br>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-ok">Reset</button>
              <button type="submit" class="btn btn-primary">Input</button>
            </div>
        </div>
        </form>
        
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
    $('#machine').DataTable({
          "paging": true,
          "lengthChange": true,
          "searching": true,
          "ordering": true,
          "info": true,
          "autoWidth": true
    });
  });
</script>
