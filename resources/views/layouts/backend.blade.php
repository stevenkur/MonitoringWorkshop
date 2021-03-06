<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link href="public/img/ship-icon.png" rel="icon" type="image/png" />
  <title>Monitoring Workshop | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="public/adminlte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="public/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="public/adminlte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="public/adminlte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="public/adminlte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="public/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="public/adminlte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="public/adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="public/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="public/adminlte/plugins/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
    

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <header class="main-header">
    <!-- Logo -->
    <a href="{{ route('dashboard.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MWS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>MonitoringWorkshop</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>

        <h4 align="right" style="color:white; font-size: 24px">{{ date('l, d M Y') }}</h4>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="public/adminlte/dist/img/user.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Administrator</p>
          <p style="font-size: 12px"><i class="fa fa-circle text-success"></i> Online</p>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{ route('dashboard.index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Create Ship Project Data</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('ship_project.index')}}"><i class="fa fa-circle-o"></i> Ship Project</a></li>
            <li><a href="{{ route('block.index')}}"><i class="fa fa-circle-o"></i> Block List</a></li>
            <li><a href="{{ route('panel.index')}}"><i class="fa fa-circle-o"></i> Panel List</a></li>
            <li><a href="{{ route('material_list.index')}}"><i class="fa fa-circle-o"></i> Material List</a></li>
            <li><a href="{{ route('assembly_part.index')}}"><i class="fa fa-circle-o"></i> Assembly Part List</a></li>
          </ul>
        </li>
          
        <li class="treeview">
          <a href="{{ route('users.index')}}">
            <i class="fa fa-user"></i>
            <span>Application User</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('machine.index')}}">
            <i class="fa fa-ship"></i>
            <span>Machine</span>
          </a>
        </li>

        <li class="treeview">
          <a href="{{ route('worker.index')}}">
            <i class="fa fa-users"></i>
            <span>Worker</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-industry"></i> 
            <span>Monitoring Prod. Wshop</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('ssh_menu')}}"><i class="fa fa-circle-o"></i> SSH</a></li>
            <li><a href="{{ route('fabrication_menu')}}"><i class="fa fa-circle-o"></i> Fabrication</a></li>
            <li><a href="{{ route('subassembly_menu')}}"><i class="fa fa-circle-o"></i> Sub Assembly</a></li>
            <li><a href="{{ route('assembly_menu')}}"><i class="fa fa-circle-o"></i> Assembly</a></li>
            <li><a href="{{ route('bbs_menu')}}"><i class="fa fa-circle-o"></i> BBS</a></li>
            <li><a href="{{ route('erection_menu')}}"><i class="fa fa-circle-o"></i> Erection Process</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="{{ route('total_ship_progress')}}">
            <i class="fa fa-ship"></i>
            <span>Total Ship Progress</span>
          </a>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-line-chart"></i> 
            <span>Planning Production</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('planning_workload')}}"><i class="fa fa-circle-o"></i> Planning Workload</a></li>
            <li><a href="{{ route('conclusion_all_project')}}"><i class="fa fa-circle-o"></i> Conclusion of All Project</a></li>
            <li><a href="{{ route('conclusion_finishing_workload')}}"><i class="fa fa-circle-o"></i> Conclusion Finishing Workload</a></li>
          </ul>
        </li>

        <li><a href="logout"><i class="fa fa-laptop"></i> <span>Log Out</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

    @yield('content')
    
    <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0
    </div>
    <strong>Copyright &copy; 2017 <a href="#">EZ-Life Developer Team</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

</body>
</html>