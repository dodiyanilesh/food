<!-- ============================================================== -->
<!-- Page Content -->
<!-- ============================================================== -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row bg-title">
            <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                <h4 class="page-title">Membership</h4> 
            </div>
            <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->session->flashdata('alert_msg'); ?>
                </div>
                <?php 
                    $user_id = $this->session->userdata('user_id');
                    $current_date = date('Y-m-d H:i:s');
                    $membership = check_membership($user_id);
                    if($membership != FALSE){
                        if($membership->status == 'Authorised' && $membership->membership_expired > $current_date){
                ?>
                        <div class="col-md-12 col-xs-12">
                            <h1>Your Current Plan is 
                                <?php if($membership->amount == "18.99"){ ?>
                                <span style="font-size:14px">$18.99/Month - 1 Month Subscription</span>
                                <?php }else if($membership->amount == "47.97"){ ?>
                                <span style="font-size:14px">$15.99/Month - 3 Month Subscription</span>
                                <?php }else if($membership->amount == "89.94"){ ?>
                                <span style="font-size:14px">$14.99/Month - 6 Month Subscription</span>
                                <?php }else if($membership->amount == "167.88"){ ?>
                                <span style="font-size:14px">$13.99/Month - 12 Month Subscription</span>
                                <?php } ?>
                            </h1>
                            
                            <p>Purchased on <?php echo date('d, M Y',strtotime($membership->created_at)); ?></p>
                            <p>Expired on <?php echo date('d, M Y',strtotime($membership->membership_expired)); ?></p>
                            <p>Your Transaction Ref no : <?php echo $membership->trans_ref; ?></p>
                        </div>
                <?php 
                        }else if($membership->status == 'Authorised' && $membership->membership_expired < $current_date){
                ?>      <h1>Your Plan is Expired select package to Renew</h1>
                        <?php 
                            echo form_open('telr');
                        ?>
                            <div class="radiowrapper" id="wrap1">
                                <input name="ivp_amount" value="18.99" type="radio" required id="problem1">
                                <label for="problem1">1 Month <br/> $18.99 </label>
                            </div>
                            <div class="radiowrapper" id="wrap2">
                                <input name="ivp_amount" value="47.97" type="radio" required id="problem2">
                                <label for="problem2">3 Month <br/> $15.99 </label>
                            </div>
                            <div class="radiowrapper" id="wrap3">
                                <input name="ivp_amount" value="89.94" type="radio" required id="problem3">
                                <label for="problem3">6 Month <br/> $14.99 </label>
                            </div>
                            <div class="radiowrapper" id="wrap4">
                                <input name="ivp_amount" value="167.88" type="radio" required id="problem4">
                                <label for="problem4">12 Month <br/> $13.99 </label>
                            </div>

                            <input name="ivp_method" value="create" type="hidden">
                            <input name="ivp_store" value="18194" type="hidden">
                        <input name="ivp_authkey" value="qsSt^bfbXX@fk7p8" type="hidden">
                        <input name="ivp_currency" value="USD" type="hidden">
                            <input name="ivp_test" value="0" type="hidden">
                            <input name="ivp_desc" value="Membership Plan" type="hidden">
                            <input name="return_auth" value="<?php echo base_url('telr/success'); ?>" type="hidden">
                            <input name="return_decl" value="<?php echo base_url('telr/success'); ?>" type="hidden">
                            <input name="return_can" value="<?php echo base_url('telr/cancel'); ?>" type="hidden">
                            <div class="form-group" style="display:inline-block; width:100%; margin-top:20px;">
                            <input value="Renew Membership" name="submit" class="btn btn-primary waves-effect" type="submit">
                            </div>
                        </form>
                <?php
                        }
                    }else {
                ?>
                <div class="col-md-12 col-xs-12">
                    <?php 
                        echo form_open('telr');
                    ?>
                        <div class="radiowrapper" id="wrap1">
                            <input name="ivp_amount" value="18.99" type="radio" required id="problem1">
                            <label for="problem1">1 Month <br/> $18.99 </label>
                        </div>
                        <div class="radiowrapper" id="wrap2">
                            <input name="ivp_amount" value="47.97" type="radio" required id="problem2">
                            <label for="problem2">3 Month <br/> $15.99 </label>
                        </div>
                        <div class="radiowrapper" id="wrap3">
                            <input name="ivp_amount" value="89.94" type="radio" required id="problem3">
                            <label for="problem3">6 Month <br/> $14.99 </label>
                        </div>
                        <div class="radiowrapper" id="wrap4">
                            <input name="ivp_amount" value="167.88" type="radio" required id="problem4">
                            <label for="problem4">12 Month <br/> $13.99 </label>
                        </div>

                        <input name="ivp_method" value="sale" type="hidden">
                        <input name="ivp_store" value="18194" type="hidden">
                        <input name="ivp_authkey" value="qsSt^bfbXX@fk7p8" type="hidden">
                        <input name="ivp_currency" value="USD" type="hidden">
                        <input name="ivp_test" value="0" type="hidden">
                        <input name="ivp_desc" value="Membership Plan" type="hidden">
                        <input name="return_auth" value="<?php echo base_url('telr/success'); ?>" type="hidden">
                        <input name="return_decl" value="<?php echo base_url('telr/success'); ?>" type="hidden">
                        <input name="return_can" value="<?php echo base_url('telr/cancel'); ?>" type="hidden">
                        <div class="form-group" style="display:inline-block; width:100%; margin-top:20px;">
                        <input value="Purchase Membership" name="submit" class="btn btn-primary waves-effect" type="submit">
                        </div>
                    </form>
                </div>
                <?php
                    }
                ?>
            </div>
            
        
    </div>
    <!-- /.container-fluid -->
            