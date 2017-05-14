<!-- profilr-page --> 
<?php 
if($profile->whatsapp_no != ''){
    $whatsapp_no = $profile->whatsapp_no;
    $whatsapp_no = explode(' ',$whatsapp_no);
}else{
    $whatsapp_no[0] = '';
    $whatsapp_no[1] = '';
}
?>
<section class="color">
<div class="container pda">
	<div class="prof-pagehd"><h1>Let's get your profile setup</h1></div>
    <?php echo $this->session->flashdata('alert_msg'); ?>
	<!--chart---->
    <?php 
        $attributes = array('id' => 'profile1_form','name' => 'profile1_form');
        echo form_open('dashboard/profile1_process',$attributes);
    ?>
	<div class="col-lg-12 chart">
	<div class="col-1g-12 s-form">
	<div class="col-lg-3 what"><p>Whatsapp No </p></div>
	<div class="col-lg-9 what-no">
	<div class="col-lg-12">
	<select class="what-con" name="country_code" id="country_code" style="width:100%;">
        <option value="+44">United Kingdom (+44)</option>
        <?php 
            foreach($country_codes as $country_code)
            {
                echo '<option value="+'.$country_code->phonecode.'" '.(($whatsapp_no[0] == '+'.$country_code->phonecode)?'selected="selected"':"").'>'.$country_code->nicename.' (+'.$country_code->phonecode.')</option>';
            }
        ?>
    </select>
	</div>
	<div class="col-lg-12 ">
	<input type="text" class="what-in" name="whatsapp_no" id="whatsapp_no" value="<?php echo $whatsapp_no[1]; ?>">
	</div>
        <div class="col-lg-12 what-text">
	<p style="margin-top:10px;">
	(This is the number on which 
     The Food Analysts will contact you on.)
	 </p>
	 </div>
	</div>
	
	 </div>
	 <!--gender-->
	 <div class="col-1g-12 g-form">
	 <div class="col-lg-3 what"><p>Gender </p></div>
	 <div class="col-lg-9 g-radio">
	 <div class="form-inline">
  				<input type="radio" class="g-radio-b" name="gender" id="gender" value="Male" <?php if($profile->gender == 'Male'){ echo 'checked="checked"'; }else{ ?> checked <?php } ?> > <span>Male</span>
  				<input type="radio" class="g-radio-b"  name="gender" id="gender" value="Female" <?php if($profile->gender == 'Female'){ echo 'checked="checked"'; } ?>><span>Female</span>
  	</div>
	 </div>
	 </div>
	 
	 <!---height--->
	 <div class="col-1g-12 h-form">
	 <div class="col-lg-4 g-age">
	 <select name="age" id="age" class="height-con">
      <option value="">Age</option>
      <?php 
        for($age=18; $age<=110; $age++)
        {
            echo '<option value="'.$age.' years" '.(($profile->age == $age.' years')?'selected="selected"':"").'>'.$age.' years</option>';
        }
     ?>
    </select>
	 </div>
	 <div class="col-lg-4 g-height">
	 <select class="height-con" name="height" id="height">
      <option value="">Height</option>
      <?php 
        for($height=50; $height<=270; $height++)
        {
            echo '<option value="'.$height.' cm" '.(($profile->height == $height.' cm')?'selected="selected"':"").'>'.$height.' cm</option>';
        }
     ?>
    </select>
	 </div>
         <div class="col-lg-4 g-height">
	 <select class="height-con" name="actual_weight" id="actual_weight">
      <option value="">Actual Weight </option>
      <?php 
        for($actual_weight=20; $actual_weight<=200; $actual_weight++)
        {
            echo '<option value="'.$actual_weight.'kg" '.(($profile->actual_weight == $actual_weight.'kg')?'selected="selected"':"").'>'.$actual_weight.'kg</option>';
        }
     ?>
    </select>
	 </div>
	</div>
	<!---weight---->
	<div class="col-1g-12 d-form">
	 
	</div>
	 <!--button--->
	 <div class="col-1g-12 states-button">
	 <button class="s-button" type="submit">NEXT</button>
	 </div>
	</div>
    </form>
</div>	

</section>
<!-- /diet-page --> 