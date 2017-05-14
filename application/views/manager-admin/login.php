<!DOCTYPE html>
<html lang="en" style="background:#f8f8f8;">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Dashboard | The Food Analysts</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <!-- animation CSS -->
    <link href="<?php echo base_url('theme/admin-theme/css/animate.css'); ?>" rel="stylesheet">
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

<body class="fix-header" style="background:#f8f8f8;">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    
           <div class="container-fluid">
                
                <div class="row">
                    <div class="text-center login-logo">
                        <a class="logo" href="<?php echo base_url('dashboard'); ?>"><img src="<?php echo base_url('theme/images/logo.png'); ?>" width="200" /></a>
                    </div>
                    <div class="col-sm-4 login-box">
                        <?php 
                            $attributes = array('id' => 'manager_login_form', 'name' => 'manager_login_form', 'class' => 'form-horizontal form-material');
                            echo form_open('manager-admin/login/process', $attributes);
                        ?>
                            <div class="login-box-ctn">
                                <div class="form-group">
                                    <label class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="text" name="email" id="email" required="required" placeholder="Email" class="form-control form-control-line"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Password</label>
                                    <div class="col-md-12">
                                        <input type="password" name="password" id="password" required="required" placeholder="Password" class="form-control form-control-line"> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-block btn-success waves-effect waves-light">Login</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            
    
    
    
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/bootstrap.min.js'); ?>"></script>
    <!--slimscroll JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/jquery.slimscroll.js'); ?>"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url('theme/admin-theme/js/waves.js'); ?>"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url('theme/admin-theme/js/custom.js'); ?>"></script>
</body>

</html>
