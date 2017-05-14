<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nutrition</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('theme/css/bootstrap.min.css'); ?>" rel="stylesheet">
        
    <!-- Custom CSS -->
    <link href="<?php echo base_url('theme/css/style.css'); ?>" rel="stylesheet">
    
    <!-- Custom Fonts -->
    <link href="<?php echo base_url('theme/css/font-awesome.min.css'); ?>" rel="stylesheet" type="text/css">
	
	<!----font----------->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="page-top" class="index">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top back">
        <div class="container wid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <a class="navbar-brand page-scroll" href="<?php echo base_url(); ?>"><img src="<?php echo base_url('theme/images/logo.png'); ?>"  alt="Audience Nest"/></a>
            </div>
			<div class="navbar-right menu-links">
            	 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <?php 
                    if($this->session->userdata('logged_in') == TRUE){
                ?>
                    <a href="<?php echo base_url('dashboard'); ?>" class="btn btn-success cess">DASHBOARD</a>
                    <a href="<?php echo base_url('logout'); ?>" class="btn btn-primary ">LOGOUT</a>
                <?php 
                    }else{
                ?>
                    <a href="<?php echo base_url('signup'); ?>" class="btn btn-success cess">GET STARTED NOW</a>
                    <a href="<?php echo base_url('login'); ?>" class="btn btn-primary ">LOG IN</a>
                <?php
                    }
                ?>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
       <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url('about-us'); ?>">About Us</a> </li>
<li><a href="<?php echo base_url('how-to-use'); ?>">How to use The Food Analysts</a> </li>
		
<li><a href="<?php echo base_url('choose-your-package'); ?>">Choose Your Package</a> </li>
 
        <li><a href="<?php echo base_url('signup'); ?>">Sign Up</a> </li>
        
		<li><a href="<?php echo base_url('login'); ?>">login</a> </li>
      </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
	<!-- navigantion bar end -->
    <div class="wrapper" id="fullpage">
        <div class="main">
            