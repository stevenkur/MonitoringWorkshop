@extends('layouts.backend-user')

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
                  <th>Paint Needs</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>Ship Project</td>
                  <td>Block</td>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Ship Project</td>
                  <td>Block</td>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Ship Project</td>
                  <td>Block</td>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
                <tr>
                  <td>Ship Project</td>
                  <td>Block</td>
                  <td>Room</td>
                  <td>Side</td>
                  <td>Frame</td>
                  <td>Deck</td>
                  <td>Area(m2)</td>
                  <td>Layer</td>
                  <td>Cat</td>
                  <td>Hitung Rumus</td>
                </tr>
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
                  <th>Paint Needs</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
        </div>
        </div>

        <section class="col-lg-12">
        <div class="box box-primary">
        <div class="box-body">
        <h3>Insert Rooms</h3>
        <form role="form" name="BBSPaint">
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Ship Project </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
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
                <br>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Block </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <select class="form-control" name="block">
                    <option value="#">-- Block List --</option>
                    <?php $i=1;?>
                    @foreach($block as $datas)
                        <?php $blockData[$i] = $datas; $i++;?>
                        <option value="{{$datas->ID}}">{{$datas->NAME}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
                <br>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Room </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="room" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Side </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="side" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Frame </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="frame" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Deck </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="deck" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Area </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="area" placeholder="" style="width:550px">
                  <label> m<sup>2</sup> </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Dry Film Thickness </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="dryfilm" placeholder="" style="width:550px">
                  <label> mikron </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Volume Solid </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="volumesolid" placeholder="" style="width:550px">
                  <label> % </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Loss Factor </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="lossfactor" placeholder="" style="width:550px">
                  <label> % </label>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Total Layer </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="layer" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="col-lg-2"> Paint Type </label>
                  <label class="col-lg-1"> : </label>
                  <div class="col-lg-6">
                  <input type="text" id="painttype" placeholder="" style="width:550px">
                  </div>
                </div>
                <br>

            <div class="box-footer" align="right">
              <button type="reset" class="btn btn-primary">Reset</button>
              <button type="submit" class="btn btn-primary">Input</button>
            </div>
        </form>
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
