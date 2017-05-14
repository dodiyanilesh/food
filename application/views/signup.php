<!-- content area start -->
  <section class="color">
  <div class="container wid">
    <div class="col-lg-12 sign-up">
      <h1>SIGN UP</h1>
    </div>
    <div class="col-lg-12 sign-box">
    <?php 
        $attributes = array('id'=>'signup_form', 'name'=> 'signup_form');
        echo form_open('signup/process',$attributes);
    ?>
          <div class="col-lg-6 sign-box-a">
            <?php echo $this->session->flashdata('alert_msg'); ?>
            <h1>Personal Information :</h1>
            <input class="sign-form" type="text" name="first_name" id="first_name" placeholder="First Name">
            <input class="sign-form" type="text" name="last_name" id="last_name" placeholder="Last Name">
            <input class="sign-form" type="text" name="email" id="email" placeholder="Email Address ">
            <input class="sign-form" type="password" name="password" id="password" placeholder="Password ">
            <input class="sign-form" type="password" name="conf_password" id="conf_password" placeholder="Confirm Password ">
              <div class="col-lg-12 s-check">
	   <div class="col-lg-12 s-check">
	   <p>You confirm that you have read the Terms and Conditions</p>
	   </div>
	   <!--<div class="col-lg-4 s-check">
		<div class="checkbox">
      <label>
	  <input type="checkbox" name="remember"> 
	  </label>
    </div>
	</div>--->
	
	</div>
	<div class="col-lg-12 s-check">
	   <div class="col-lg-12 s-check">
	   <p>You have an existing WhatsApp account and give us permission to contact you via this channel.</p>
	   </div>
	   <!--<div class="col-lg-4 s-check">
		<div class="checkbox">
      <label>
	  <input type="checkbox" name="remember"> 
	  </label>
    </div>
	</div>--->
	
	</div>
	<div class="col-lg-12 s-check">
	   <div class="col-lg-12 s-check">
	   <p>You will use our services for meals consumed by yourself only.</p>
	   </div>
	  <!-- <div class="col-lg-4 s-check">
		<div class="checkbox">
      <label>
	  <input type="checkbox" name="remember"> 
	  </label>
    </div>
	</div>-->
	
	</div>
            <div class="col-lg-12" style="padding:0px;">
            <button class="butti" type="submit">SIGN UP</button>
            </div>
          </div>
        </form>
      <div class="col-lg-1 sign-line">
        <div class="sign-line-a"></div>
      </div>
      <div class="col-lg-5 sign-box-b">
        <h1>Select Login Option :</h1>
        <a href="<?php echo $login_url; ?>"><button class="face" type="button">Continue with Facebook</button></a>
      </div>
    </div>
  </div>
</div>
</section>
<!-- content area end --> 