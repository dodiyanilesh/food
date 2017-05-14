<!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Accounts</h4> </div>
                </div>
                <!-- /.row -->
                <!-- .row -->
                <div class="row">
                    <div class="col-md-12">
                        <?php echo $this->session->flashdata('alert_msg'); ?>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h5>Update Basic Profile</h5>
                        <div class="white-box">
                            <?php 
                                $attributes = array('name' => 'update_profile_form', 'id' => 'update_profile_form', 'class' => 'form-horizontal form-material');
                                echo form_open('my_profile/update_profile',$attributes);
                            ?>
                                <div class="form-group">
                                    <label class="col-md-12">First Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="first_name" id="first_name" value="<?php echo $user->first_name; ?>" required="required" placeholder="First Name" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Last Name</label>
                                    <div class="col-md-12">
                                        <input type="text" name="last_name" id="last_name" value="<?php echo $user->last_name; ?>" required="required" placeholder="Last Name" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label for="example-email" class="col-md-12">Email</label>
                                    <div class="col-md-12">
                                        <input type="email" name="email" id="email" value="<?php echo $user->email; ?>" required="required" placeholder="Email Address" class="form-control form-control-line" name="example-email" id="example-email"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success waves-effect waves-light">Update Profile</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <h5>Update Your Password</h5>
                        <div class="white-box">
                            <?php 
                                $attributes = array('name' => 'update_password_form', 'id' => 'update_password_form', 'class' => 'form-horizontal form-material');
                                echo form_open('my_profile/update_password',$attributes);
                            ?>
                                <div class="form-group">
                                    <label class="col-md-12">Current Password</label>
                                    <div class="col-md-12">
                                    <input type="password" name="current_password" id="current_password" required="required" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">New Password</label>
                                    <div class="col-md-12">
                                    <input type="password" name="new_password" id="new_password" required="required" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12">Confirm New Password</label>
                                    <div class="col-md-12">
                                    <input type="password" name="cofirm_new_password" id="cofirm_new_password" required="required" class="form-control form-control-line"> </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <button class="btn btn-success waves-effect waves-light">Update Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
            <footer class="footer text-center"> 2017 &copy; Ample Admin brought to you by wrappixel.com </footer>
        </div>
        <!-- /#page-wrapper -->