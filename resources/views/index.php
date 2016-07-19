<!-- resources/views/index.php -->

<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>School Management System</title>
    <!-- Responsive -->
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
    <!-- messages -->
    <link href="dist/css/jquery.gritter.css" rel="stylesheet" type="text/css" />
    <!-- icons-->
    <link href="dist/css/css/font-awesome.css" rel="stylesheet" type="text/css"/>

</head>
<body class="hold-transition skin-blue sidebar-mini" ng-app="authApp">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>School</b>Mgmt</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>School</b>Mgmt</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
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

        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li class="active treeview">
                <a href="#/home">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#/classes">
                    <i class="fa fa-dashboard"></i> <span>Classes</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#/students">
                    <i class="fa fa-dashboard"></i> <span>Students</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#/parents">
                    <i class="fa fa-dashboard"></i> <span>Parents</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#register">
                    <i class="fa fa-dashboard"></i> <span>Register</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#/teachers">
                    <i class="fa fa-dashboard"></i> <span>Teachers</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            <li class="active treeview">
                <a href="#/reports">
                    <i class="fa fa-dashboard"></i> <span>Reports</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
            </li>
            <li class="active treeview">
                <a href="#/about">
                    <i class="fa fa-dashboard"></i> <span>About</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{page.name}}
            </h1>
            <ol class="breadcrumb">
                {{breadcrumb}}
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div ui-view></div>
        </section><!-- /.content -->
    </div><!-- /.content-wrapper -->
    <footer class="main-footer">
        <strong>Copyright &copy; 2015-2016 <a href="">School Management System</a>.</strong> All rights reserved.
    </footer>
</div><!-- ./wrapper -->
</body>

<!-- Application Dependencies -->
<script src="node_modules/angular/angular.js"></script>
<script src="node_modules/angular-ui-router/build/angular-ui-router.js"></script>
<script src="node_modules/satellizer/satellizer.js"></script>

<!-- Application Scripts -->
<script src="app/app.js"></script>

<script src="app/controllers/authController.js"></script>
<script src="app/controllers/dashboardController.js"></script>
<script src="app/controllers/register.js"></script>
<script src="app/controllers/classController.js"></script>
<script src="app/controllers/teacherController.js"></script>
<script src="app/controllers/studentController.js"></script>
<script src="app/controllers/reportController.js"></script>
<script src="app/controllers/parentController.js"></script>
<script src="app/controllers/registerController.js"></script>


<!-- jQuery 2.1.4 -->
<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jQueryUI/jquery-ui.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.5 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="plugins/daterangepicker/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<script src="dist/js/jquery.gritter.min.js"></script>
</html>