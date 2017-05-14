<!--FOOTER START-->
<footer class="footer">
  <div class="container">
    <div class="col-lg-4 col-md-5 col-xs-12 footer-a">
      <h3>The Food Analysts</h3>
      <hr class="hri">
     <p> We want to support any person, worldwide, to monitor the nutritional value of his/her food intake. The services we offer operate on a subscription basis, and provide important preconditions with our various products and services for this purpose. The following General Terms and Conditions of Business set out the legal framework for using the services of www.thefoodanalysts.com. 
    </p>
	</div>
	<div class="col-lg-2 col-md-4 col-xs-12 footer-b">
      <h3>Quick LInk</h3>
      <hr class="hri Q-link">
     <a href="<?php echo base_url('how-to-use'); ?>"><p> How to use The Food Analysts</p></a>
     <a href="<?php echo base_url('choose-your-package'); ?>"><p> Choose your package</p></a>
     <a href="<?php echo base_url('privacy'); ?>"><p>Privacy</p></a>
     <a href="<?php echo base_url('terms-and-condition'); ?>"><p> Product Delivery and T&Cs</p></a>
	  
      
     
    </div>
    <div class="col-lg-3 col-md-3 col-xs-12 footer-c">
      
      <div class="col-lg-2 f-icon"><a href="#"><img src="<?php echo base_url('theme/images/google-icon.png'); ?>"></a></div>
      <div class="col-lg-2 f-icon"><a href="#"> <img src="<?php echo base_url('theme/images/fb-icon.png'); ?>"></a></div>
      <div class="col-lg-2 f-icon"><a href="#"><img src="<?php echo base_url('theme/images/twiteer-icon.png'); ?>"></a></div>
    </div>
	<!--add-->
	<div class="col-lg-3 col-md-3 col-xs-12 footer-c">
      <h3>Contact Us</h3>
	  <hr class="hri l-link">
	  <a href="mailto:contact@thefoodanalysts.com"><p><span><i class="fa fa-envelope-o space" aria-hidden="true"></i></span> contact@thefoodanalysts.com
</p></a>
    </div>
	
	
	<div class="col-lg-12 footer-master"> 
	<div class="container f-con">
      <div class="col-lg-6  col-md-6 col-xs-6  f-master">
	  <img src="<?php echo base_url('theme/images/master.png'); ?>">
	  </div>
	  <div class="col-lg-6 col-md-6 col-xs-6  f-master">
	  <img src="<?php echo base_url('theme/images/visa.png'); ?>">
	  </div>
	  
    </div>
	</div>
    <div class="col-lg-12 footer-logo"> <img src="<?php echo base_url('theme/images/logo.png'); ?>" width=30%;>
      <p>© 2017 The Food Analysts. All rights reserved</p>
    </div>
  </div>
</footer>


<!------------------------model---------------------->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
	   <button type="button" class="clos " data-dismiss="modal">&times;</button>
        <div class="embed-responsive embed-responsive-16by9">
		<iframe width="560" height="315" class="embed-responsive-item" src="https://www.youtube.com/embed/ITOF_Su28dY" frameborder="0" allowfullscreen></iframe>
      </div>
     
    </div>

  </div>
</div>
<!---/foooter-----> 
<!--=========================================================code end================================================-->
    <!-- jQuery -->
    <script src="<?php echo base_url('theme/js/jquery.js'); ?>"></script>
       
<!-- This Page JavaScript -->
	<!--script type="text/javascript" src="js/jquery.slimscroll.min.js"></script>
	<script type="text/javascript" src="js/jquery.fullPage.min.js"></script-->
	 <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
      <script src="<?php echo base_url('theme/js/classie.js'); ?>"></script>
    <script src="<?php echo base_url('theme/js/cbpAnimatedHeader.min.js'); ?>"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('theme/js/bootstrap.min.js'); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/additional-methods.min.js"></script>
      
    <!-- Custom Theme JavaScript -->
	<!---login-js---------->
	<script>
	$(".email-signup").hide();
$("#signup-box-link").click(function(){
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function(){
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});
	</script>
      <script src="<?php echo base_url('theme/js/custom.js'); ?>"></script>
</body>
</html>
