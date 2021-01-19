<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Gestión</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../Content/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../Content/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../Content/bower_components/Ionicons/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../Content/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../Content/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../Content/dist/css/skins/_all-skins.min.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../Content/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../Content/plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../Content/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- ************************Scripts************************ -->
    <!-- jQuery 3 -->
    <script src="../Content/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../Content/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../Content/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Sparkline -->
    <script src="../Content/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../Content/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../Content/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../Content/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../Content/dist/js/adminlte.min.js"></script>
    <!-- DataTables -->
    <script src="../Content/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../Content/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- Script Personal -->
    <script src="../Content/js/data.js"></script>
    <!-- InputMask -->
    <script src="../Content/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../Content/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../Content/plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../Content/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker-es.js"></script>
    <!-- bootstrap time picker -->
    <script src="../Content/plugins/timepicker/bootstrap-timepicker.min.js"></script>

    <style>
        td {
            max-width: 0;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>
</head>

<body class="hold-transition skin-black sidebar-mini">
    <div class="wrapper">
        <header class="main-header">
            <a href="profesorinicio.php" class="logo">
                <span class="logo-mini"><b>G </b>TSI</span>
                <span class="logo-lg"><b>Gestión </b>TSIWEEK</span>
            </a>
            <nav>
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
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
                        <img src="../Content/img/avatar.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p id="RolUsuarioLogin">INSTRUCTOR</p>
                    </div>
                </div>
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <!--
                    <li class="headline">
                        <a href="profesorPaselista.php">
                            <i class="fa fa-list"></i>
                            <span>Pase de Lista</span>
                        </a>
                    </li>                   
                    -->
                    <hr>
                    <li class="headline">
                        <a href="index.php">
                            <i class="fa fa-sign-out"></i>
                            <span>Cerrar sesión</span>
                        </a>
                    </li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>