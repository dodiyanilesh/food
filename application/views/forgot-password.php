<!-- content area start -->
<section class="color-a">
<div class="container defa">
<div class="col-lg-12 lo">
<img src="<?php echo base_url('theme/images/logo.png'); ?>">
</div>
<?php 
    $attributes = array('id'=>'login_form', 'name'=> 'login_form');
    echo form_open('forgot_password/process',$attributes);
?>
<div class="display-proper"><?php echo $this->session->flashdata('alert_msg'); ?></div>
<div class="col-lg-12 a-form">
<input type="text" class="ee" name="email" id="email" placeholder="E-mail Address">
<button class="log-e" type="submit">Submit</button>
<a href="<?php echo base_url('login'); ?>"><button class="log-f" type="button"><< Login</button></a>
</div>
</form>
</div>
</section>
<!-- content area end -->
