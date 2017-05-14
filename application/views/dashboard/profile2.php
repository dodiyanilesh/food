<!-- profilr-page --> 
<section class="color">
<div class="container pda">
	<div class="prof-pagehd"><h1>Let's calculate your macros</h1></div>
	<!--chart---->
    <?php 
        $attributes = array('id' => 'profile2_form', 'name' => 'profile2_form');
        echo form_open('dashboard/profile2_process',$attributes);
    ?>
    <input type="hidden" name="profile_id" id="profile_id" value="<?php echo $this->input->get('token'); ?>" />
	<div class="col-lg-12 chart">
	<!--number--->
        <div class="col-lg-6 g-age">
	 <select  class="height-con" name="goals" id="goals">
      <option value="">Goals</option>
      <option value="Lose Fat" <?php if($profile->goals == 'Lose Fat'){ echo 'selected="selected"'; } ?>>Lose Fat</option>
      <option value="Gain Fat" <?php if($profile->goals == 'Gain Fat'){ echo 'selected="selected"'; } ?>>Gain Fat</option>
      <option value="Gain muscle" <?php if($profile->goals == 'Gain muscle'){ echo 'selected="selected"'; } ?>>Gain muscle</option>
      <option value="Maintain and stay fit" <?php if($profile->goals == 'Maintain and stay fit'){ echo 'selected="selected"'; } ?>>Maintain and stay fit</option>
      <option value="Other" <?php if($profile->goals == 'Other'){ echo 'selected="selected"'; } ?>>Other</option>
    </select>
	 </div>
        <!---active you---->
	<div class="col-lg-6 g-age">
	 <select  class="fat-con" name="how_active" id="how_active">
      <option value="">How active are you</option>
      <option value="Sedentary" <?php if($profile->how_active == 'Sedentary'){ echo 'selected="selected"'; } ?>>Sedentary</option>
      <option value="Lightly Active" <?php if($profile->how_active == 'Lightly Active'){ echo 'selected="selected"'; } ?>>Lightly Active</option>
      <option value="Active" <?php if($profile->how_active == 'Active'){ echo 'selected="selected"'; } ?>>Active</option>
      <option value="Very Active" <?php if($profile->how_active == 'Very Active'){ echo 'selected="selected"'; } ?>>Very Active</option>
    </select><a href="Javascript:void(0);" data-toggle="tooltip" title="This is Tooltip" class="info-tip"><i class="fa fa-question" aria-hidden="true"></i></a>
	 </div>
        
	<div class="col-lg-12 fat">
        
	 <select  class="fat-con" name="no_ex_inweek" id="no_ex_inweek">
        <option value="">Number of Exercise sessions a week</option>
      <option value="I dont exercise" <?php if($profile->no_ex_inweek == 'I dont exercise'){ echo 'selected="selected"'; } ?>>I dont exercise</option>
      <option value="1-3 times a week" <?php if($profile->no_ex_inweek == '1-3 times a week'){ echo 'selected="selected"'; } ?>>1-3 times a week</option>
      <option value="3-5 times a week" <?php if($profile->no_ex_inweek == '3-5 times a week'){ echo 'selected="selected"'; } ?>>3-5 times a week</option>
      <option value="Over 5 times a week" <?php if($profile->no_ex_inweek == 'Over 5 times a week'){ echo 'selected="selected"'; } ?>>Over 5 times a week</option>
    </select>
	 </div>
        
	 <!----goals--->
	 <div class="col-1g-12">
     <div class="col-lg-4 are-die">
	 <div class="form-inline">
         <p>Are you vegetarian ? </p>
            <input type="radio" class="g-radio-b" name="vegiterian" value="Yes" <?php if($profile->vegiterian == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
          <input type="radio" class="g-radio-b"  name="vegiterian" value="No" <?php if($profile->vegiterian == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
  	</div>
	 </div>
         <div class="col-lg-4 are-die">
	 <div class="form-inline">
         <p>Are you Lactose intolerant ?</p>
            <input type="radio" class="g-radio-b" name="lactose" value="Yes" <?php if($profile->lactose == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
          <input type="radio" class="g-radio-b"  name="lactose" value="No" <?php if($profile->lactose == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
  	</div>
	 </div>
         <div class="col-lg-4 are-die">
	 <div class="form-inline">
         <p>Are you Gluten ? </p>
            <input type="radio" class="g-radio-b" name="gluten" value="Yes" <?php if($profile->gluten == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
          <input type="radio" class="g-radio-b"  name="gluten" value="No" <?php if($profile->gluten == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
  	</div>
	 </div>
	</div>
	 
	 <!---5---->
	 <?php /*<div class="col-lg-12 fat mar-d">
	 <select  class="fat-con" name="state">
      <option value="">Do you have a protein goal per day ?</option>
         <option value="Let The Food Analysts determine my target">Let The Food Analysts determine my target</option>
    <?php 
        for($protien=0; $protien<=500; $protien++)
        {
            if( $protien%10 == 0){
                echo '<option value="'.$protien.' grams ">'.$protien.' grams </option>';
            }
        }
     ?>
    </select>
	 </div> */ ?>
	 <!---alco--->
	     <div class="col-lg-12 row mar-d">
	 <select  class="fat-con" name="alcohol" id="alcohol">
      <option value="">How many unit of Alcohol do you consume in a week?</option>
  <option value="I dont drink" <?php if($profile->alcohol == 'I dont drink'){ echo 'selected="selected"'; } ?>>I dont drink</option>
  <option value="1 unit" <?php if($profile->alcohol == '1 unit'){ echo 'selected="selected"'; } ?>>1 unit</option>
  <option value="2 units" <?php if($profile->alcohol == '2 units'){ echo 'selected="selected"'; } ?>>2 units</option>
  <option value="3 units" <?php if($profile->alcohol == '3 units'){ echo 'selected="selected"'; } ?>>3 units</option>
  <option value="4 units" <?php if($profile->alcohol == '4 units'){ echo 'selected="selected"'; } ?>>4 units</option>
  <option value="5 units" <?php if($profile->alcohol == '5 units'){ echo 'selected="selected"'; } ?>>5 units</option>
    </select><a href="Javascript:void(0);" data-toggle="tooltip" title="This is Tooltip" class="info-tip"><i class="fa fa-question" aria-hidden="true"></i></a>
	 </div>
	 
	 <!---dieb----->
	 <div class="col-1g-12 dieb">
	 <div class="col-lg-8 are-die">
	 <p>Are you Diabetic ? </p>
	 </div>
	 <div class="col-lg-4 are-radio">
	 <div class="form-inline">
  				<input type="radio" class="g-radio-b" name="diabetic" value="Yes" <?php if($profile->diabetic == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
              <input type="radio" class="g-radio-b"  name="diabetic" value="No" <?php if($profile->diabetic == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
  	</div>
	 </div>
	 </div>
	 <!--2-->
	 <div class="col-1g-12 dieb">
	 <div class="col-lg-8 are-die">
	 <p>Do you have any heart problems ? </p>
	 </div>
	 <div class="col-lg-4 are-radio">
	 <div class="form-inline">
  				<input type="radio" class="g-radio-b" name="heart_problem" value="Yes" <?php if($profile->heart_problem == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
              <input type="radio" class="g-radio-b"  name="heart_problem" value="No" <?php if($profile->heart_problem == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
  	</div>
	 </div>
	 </div>
	 <!---3--->
	 <div class="col-1g-12 dieb">
	 <div class="col-lg-8 are-die">
	 <p>Do you have any cholesterol related problems ? </p>
	 </div>
	 <div class="col-lg-4 are-radio">
	 <div class="form-inline">
  				<input type="radio" class="g-radio-b" name="cholesterol_problem" value="Yes" <?php if($profile->cholesterol_problem == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
              <input type="radio" class="g-radio-b"  name="cholesterol_problem" value="No" <?php if($profile->cholesterol_problem == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
				</div>
	 </div>
	 </div>
	 <!----4--->
	 <div class="col-1g-12 dieb">
	 <div class="col-lg-8 are-die">
	 <p>Do you suffer from high blood pressure? </p>
	 </div>
	 <div class="col-lg-4 are-radio">
	 <div class="form-inline">
  				<input type="radio" class="g-radio-b" name="high_blood_pressure" value="Yes" <?php if($profile->high_blood_pressure == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
              <input type="radio" class="g-radio-b"  name="high_blood_pressure" value="No" <?php if($profile->high_blood_pressure == 'No'){ echo 'checked="checked"'; } ?> /><span> No</span>
				</div>
	 </div>
	 </div>
        <div class="clearfix"></div>
        <div class="col-1g-12 dieb">
            <span><input type="checkbox" name="terms" id="terms" /></span> You confirm that you have read the Terms and Conditions<br/>
            You have an existing WhatsApp account and give us permission to contact you via this channel.<br/>
            You will use our services for meals consumed by yourself only.
        </div>
	 <!---button--->
	 <div class="col-1g-12 states-button">
         <a href="<?php echo base_url('dashboard/profile1'); ?>"><button class="s-button" type="button">Back</button></a>
         <button class="s-button" type="submit">Submit</button>
	 </div>
</div>	
    </form>
    </div>
</section>
<!-- /diet-page --> 