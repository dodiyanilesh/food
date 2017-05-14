<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard | The Food Analysts</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/bootstrap.min.css'); ?>" rel="stylesheet">
<link href="https://code.jquery.com/ui/1.10.0/themes/smoothness/jquery-ui.css" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/animate.css'); ?>" rel="stylesheet">
    <!-- Data Table CSS -->
    <link href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/style.css'); ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/colors/default.css'); ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
    <div id="wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">
            <div class="navbar-header">
                <div class="top-left-part">
                    <!-- Logo -->
                    
                    <a class="logo" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('theme/images/logo.png'); ?>" width="200" /></a>
                </div>
                <!-- /Logo -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <!--<li>
                        <form role="search" class="app-search hidden-sm hidden-xs m-r-10">
                            <input type="text" placeholder="Search..." class="form-control"> <a href=""><i class="fa fa-search"></i></a> </form>
                    </li>-->
                    <li>
                        <a class="profile-pic" href="<?php echo base_url('manager-admin/logout'); ?>"> <b>LOGOUT</b></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav slimscrollsidebar">
                <div class="sidebar-head">
                    <h3><span class="fa-fw open-close"><i class="ti-close ti-menu"></i></span> <span class="hide-menu">Navigation</span></h3>
                </div>
                <ul class="nav" id="side-menu">
                    <li style="padding: 70px 0 0;">
                        <a href="<?php echo base_url('manager-admin'); ?>" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true"></i>Dashboard</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url('manager-admin/users'); ?>" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Users</a>
                    </li>
                    <!--
                    <li>
                        <a href="fontawesome.html" class="waves-effect"><i class="fa fa-font fa-fw" aria-hidden="true"></i>Icons</a>
                    </li>
                    
                    <li>
                        <a href="blank.html" class="waves-effect"><i class="fa fa-columns fa-fw" aria-hidden="true"></i>Blank Page</a>
                    </li>
                    <li>
                        <a href="404.html" class="waves-effect"><i class="fa fa-info-circle fa-fw" aria-hidden="true"></i>Error 404</a>
                    </li>-->

                </ul>
            </div>
            
        </div>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->