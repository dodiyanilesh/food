<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Edit Your Profile</h4> </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <?php 
                    $attributes = array('name' => 'analysts_update_profile_form', 'id' => 'analysts_update_profile_form', 'class' => 'form-horizontal form-material');
                    echo form_open('analysts_profile/update_profile',$attributes);
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('alert_msg'); ?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="white-box">
                                <div class="form-group">
                                    <label class="col-md-12">Whatsapp No</label>
                                    <div class="col-md-12">
                                        <input type="text" name="whatsapp_no" id="whatsapp_no" value="<?php echo $profile->whatsapp_no ?>" required="required" placeholder="Whatsapp Number" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Gender</label>
                                    <div class="col-md-12">
                                        <input type="radio" name="gender" value="Male" <?php if($profile->gender == 'Male'){ echo 'checked="checked"'; } ?> /> Male
                                        <input type="radio" name="gender" value="Female" <?php if($profile->gender == 'Female'){ echo 'checked="checked"'; } ?> /> Female
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Age</label>
                                    <div class="col-md-12">
                                        <select name="age" id="age" class="form-control form-control-line">
                                          <option value="">Age</option>
                                            <?php 
                                                for($age=18; $age<=110; $age++)
                                                {
                                                    echo '<option value="'.$age.' years" '.(($profile->age == $age.' years')?'selected="selected"':"").'>'.$age.' years</option>';
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Height</label>
                                    <div class="col-md-12">
                                        <select name="height" id="height" class="form-control form-control-line">
                                          <option value="">Height</option>
                                            <?php 
                                                for($height=50; $height<=270; $height++)
                                                {
                                                    echo '<option value="'.$height.' cm" '.(($profile->height == $height.' cm')?'selected="selected"':"").'>'.$height.' cm</option>';
                                                }
                                            ?>
                                        </select>    
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Actual Weight</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name="actual_weight" id="actual_weight">
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
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">How active are you</label>
                                    <div class="col-md-12">
                                        <select  class="form-control form-control-line" name="how_active" id="how_active">
                                          <option value="">How active are you</option>
                                          <option value="Sedentary" <?php if($profile->how_active == 'Sedentary'){ echo 'selected="selected"'; } ?>>Sedentary</option>
                                          <option value="Lightly Active" <?php if($profile->how_active == 'Lightly Active'){ echo 'selected="selected"'; } ?>>Lightly Active</option>
                                          <option value="Active" <?php if($profile->how_active == 'Active'){ echo 'selected="selected"'; } ?>>Active</option>
                                          <option value="Very Active" <?php if($profile->how_active == 'Very Active'){ echo 'selected="selected"'; } ?>>Very Active</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Number of Exercise sessions a week</label>
                                    <div class="col-md-12">
                                        <select  class="form-control form-control-line" name="no_ex_inweek" id="no_ex_inweek">
                                          <option value="">Number of Exercise sessions a week</option>
                                          <option value="I dont exercise" <?php if($profile->no_ex_inweek == 'I dont exercise'){ echo 'selected="selected"'; } ?>>I dont exercise</option>
                                          <option value="1-3 times a week" <?php if($profile->no_ex_inweek == '1-3 times a week'){ echo 'selected="selected"'; } ?>>1-3 times a week</option>
                                          <option value="3-5 times a week" <?php if($profile->no_ex_inweek == '3-5 times a week'){ echo 'selected="selected"'; } ?>>3-5 times a week</option>
                                          <option value="Over 5 times a week" <?php if($profile->no_ex_inweek == 'Over 5 times a week'){ echo 'selected="selected"'; } ?>>Over 5 times a week</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="white-box">
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Goals</label>
                                    <div class="col-md-12">
                                        <select class="form-control form-control-line" name="goals" id="goals">
                                          <option value="">Goals</option>
                                          <option value="Lose Fat" <?php if($profile->goals == 'Lose Fat'){ echo 'selected="selected"'; } ?>>Lose Fat</option>
                                          <option value="Gain Fat" <?php if($profile->goals == 'Gain Fat'){ echo 'selected="selected"'; } ?>>Gain Fat</option>
                                          <option value="Gain muscle" <?php if($profile->goals == 'Gain muscle'){ echo 'selected="selected"'; } ?>>Gain muscle</option>
                                          <option value="Maintain and stay fit" <?php if($profile->goals == 'Maintain and stay fit'){ echo 'selected="selected"'; } ?>>Maintain and stay fit</option>
                                          <option value="Other" <?php if($profile->goals == 'Other'){ echo 'selected="selected"'; } ?>>Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Are you Vegetarian</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="vegiterian" value="Yes" <?php if($profile->vegiterian == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
                                        <input type="radio" class="g-radio-b"  name="vegiterian" value="No" <?php if($profile->vegiterian == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Are you Lactose intolerant?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="lactose" value="Yes" <?php if($profile->lactose == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
                                        <input type="radio" class="g-radio-b"  name="lactose" value="No" <?php if($profile->lactose == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Are you Gluten ?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="gluten" value="Yes" <?php if($profile->gluten == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
                                        <input type="radio" class="g-radio-b"  name="gluten" value="No" <?php if($profile->gluten == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">How many unit of Alcohol do you consume in a week?</label>
                                    <div class="col-md-12">
                                        <select  class="form-control form-control-line" name="alcohol" id="alcohol">
                                          <option value="">How many unit of Alcohol do you consume in a week?</option>
                                          <option value="I dont drink" <?php if($profile->alcohol == 'I dont drink'){ echo 'selected="selected"'; } ?>>I dont drink</option>
                                          <option value="1 unit" <?php if($profile->alcohol == '1 unit'){ echo 'selected="selected"'; } ?>>1 unit</option>
                                          <option value="2 units" <?php if($profile->alcohol == '2 units'){ echo 'selected="selected"'; } ?>>2 units</option>
                                          <option value="3 units" <?php if($profile->alcohol == '3 units'){ echo 'selected="selected"'; } ?>>3 units</option>
                                          <option value="4 units" <?php if($profile->alcohol == '4 units'){ echo 'selected="selected"'; } ?>>4 units</option>
                                          <option value="5 units" <?php if($profile->alcohol == '5 units'){ echo 'selected="selected"'; } ?>>5 units</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Are you Diabetic ?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="diabetic" value="Yes" <?php if($profile->diabetic == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
  				                          <input type="radio" class="g-radio-b"  name="diabetic" value="No" <?php if($profile->diabetic == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Do you have any heart problems ?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="heart_problem" value="Yes" <?php if($profile->heart_problem == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
  				                          <input type="radio" class="g-radio-b"  name="heart_problem" value="No" <?php if($profile->heart_problem == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Do you have any cholesterol related problems ?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="cholesterol_problem" value="Yes" <?php if($profile->cholesterol_problem == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
  				                          <input type="radio" class="g-radio-b"  name="cholesterol_problem" value="No" <?php if($profile->cholesterol_problem == 'No'){ echo 'checked="checked"'; } ?> /> <span>No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Do you suffer from high blood pressure?</label>
                                    <div class="col-md-12">
                                        <input type="radio" class="g-radio-b" name="high_blood_pressure" value="Yes" <?php if($profile->high_blood_pressure == 'Yes'){ echo 'checked="checked"'; } ?> /> <span>Yes</span>
  				                          <input type="radio" class="g-radio-b"  name="high_blood_pressure" value="No" <?php if($profile->high_blood_pressure == 'No'){ echo 'checked="checked"'; } ?> /><span> No</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success waves-effect waves-light">Update Profile</button>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                </form>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- /#page-wrapper -->