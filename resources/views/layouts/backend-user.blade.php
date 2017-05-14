<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Monitoring Workshop | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="adminlte/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="adminlte/dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="adminlte/plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="adminlte/plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="adminlte/plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="adminlte/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="adminlte/plugins/datatables/dataTables.bootstrap.css">

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
    <a href="{{ route('admins.index') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>MWS</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>User </b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="adminlte/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="{{ route('usermain.index') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring SSH</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('input_material_ssh')}}"><i class="fa fa-circle-o"></i> Input Material Coming</a></li>
            <li><a href="{{ route('input_act_ssh')}}"><i class="fa fa-circle-o"></i> Input Activities and Worker</a></li>
            <li><a href="{{ route('ssh_recap_material_coming')}}"><i class="fa fa-circle-o"></i> Recap Material Coming</a></li>
            <li><a href="{{ route('ssh_recap_material_process')}}"><i class="fa fa-circle-o"></i> Recap Material Process</a></li>
            <li><a href="{{ route('ssh_recap_progress_activity')}}"><i class="fa fa-circle-o"></i> Recap Progress & Activity</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring Fabrication</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('input_act_fabrication')}}"><i class="fa fa-circle-o"></i> Input Activities and Worker</a></li>
            <li><a href="{{ route('fabrication_recap_material_process')}}"><i class="fa fa-circle-o"></i> Recap Material Process</a></li>
            <li><a href="{{ route('fabrication_recap_worker')}}"><i class="fa fa-circle-o"></i> Recap Worker & Time</a></li>
            <li><a href="{{ route('fabrication_recap_progress_activity')}}"><i class="fa fa-circle-o"></i> Recap Progress & Activity</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring Sub Assembly</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('input_act_subassembly')}}"><i class="fa fa-circle-o"></i> Input Activities and Worker</a></li>
            <li><a href="{{ route('subassembly_recap_join_part_process')}}"><i class="fa fa-circle-o"></i> Recap Join Part Process</a></li>
            <li><a href="{{ route('subassembly_recap_worker')}}"><i class="fa fa-circle-o"></i> Recap Worker & Time</a></li>
            <li><a href="{{ route('subassembly_recap_progress_activity')}}"><i class="fa fa-circle-o"></i> Recap Progress & Activity</a></li>
          </ul>
        </li>
         
         <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring Assembly</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('input_act_assembly')}}"><i class="fa fa-circle-o"></i> Input Activities and Worker</a></li>
            <li><a href="{{ route('assembly_recap_join_panel_process')}}"><i class="fa fa-circle-o"></i> Recap Join Panel Process</a></li>
            <li><a href="{{ route('assembly_recap_worker')}}"><i class="fa fa-circle-o"></i> Recap Worker & Time</a></li>
            <li><a href="{{ route('assembly_recap_progress_activity')}}"><i class="fa fa-circle-o"></i> Recap Progress & Activity</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring BBS</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('bbs_calculate_paint_needs')}}"><i class="fa fa-circle-o"></i> Input & Calculate Paint Needs</a></li>
            <li><a href="{{ route('input_act_bbs')}}"><i class="fa fa-circle-o"></i> Input Activities & Progress</a></li>
            <li><a href="{{ route('bbs_recap_material_process')}}"><i class="fa fa-circle-o"></i> Recap Material Process</a></li>
            <li><a href="{{ route('bbs_recap_worker')}}"><i class="fa fa-circle-o"></i> Recap Worker & Time</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="#">
            <i class="fa fa-ship"></i>
            <span>Monitoring Erection Process</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li><a href="{{ route('input_act_erection')}}"><i class="fa fa-circle-o"></i> Input Activities and Worker</a></li>
            <li><a href="{{ route('erection_recap_block')}}"><i class="fa fa-circle-o"></i> Recap Join Block</a></li>
            <li><a href="{{ route('erection_recap_worker')}}"><i class="fa fa-circle-o"></i> Recap Worker & Time</a></li>
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