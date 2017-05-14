<!-- content area start -->
<section class="color-a">
<div class="container defa">
<div class="col-lg-12 lo">
<img src="<?php echo base_url('theme/images/logo.png'); ?>">
</div>
<?php 
    $attributes = array('id'=>'login_form', 'name'=> 'login_form');
    echo form_open('login/process',$attributes);
?>
<div class="display-proper"><?php echo $this->session->flashdata('alert_msg'); ?></div>
<div class="col-lg-12 a-form">
<input type="text" class="ee" name="email" id="email" placeholder="E-mail Address">
<input type="password" class="ee" name="password" id="password" placeholder="Password">
<button class="log-e" type="submit">LOG IN</button>
<a href="<?php echo base_url('signup'); ?>"><button class="log-f" type="button">SIGN UP</button></a>
<a href="<?php echo base_url('forgot-password'); ?>"><p>forgot your password?</p></a>
</div>
</form>
</div>
</section>
<!-- content area end -->
