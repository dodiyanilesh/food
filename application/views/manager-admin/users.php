<div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Users</h4> 
                    </div>
                    <div class="col-lg-9 text-right">
                        <a href="Javascript:void(0);" data-toggle="modal" data-target="#add_user"><button class="btn btn-primary waves-effect">Add User</button></a>
                    </div>
                </div>
                <!-- /row -->
                <div class="row">
                    <div class="col-sm-12">
                        <?php echo $this->session->flashdata('alert_msg'); ?>
                        <div class="white-box">
                            <div class="table-responsive">
                                <table class="table" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if($users != FALSE){
                                                $i=1;
                                                foreach($users as $user){
                                        ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $user->first_name; ?></td>
                                                    <td><?php echo $user->last_name; ?></td>
                                                    <td><?php echo $user->email; ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('manager-admin/food_log'); ?>">Food Log</a> &nbsp;&nbsp;&nbsp;
                                                        <a href="<?php echo base_url('manager-admin/edit_user/'.$user->id); ?>"><i class="fa fa-pencil fa-2x text-primary" aria-hidden="true"></i></a>&nbsp;&nbsp;
                                                        <a href="<?php echo base_url('manager-admin/users/delete_user/'.$user->id); ?>" class="delete_user"><i class="fa fa-trash fa-2x text-danger" aria-hidden="true"></i></a>
                                                        &nbsp;&nbsp;
                                                        <a href="<?php echo base_url('manager-admin/users/food_log/'.$user->id); ?>" class=""><i class="fa fa-flag fa-2x" aria-hidden="true"></i></a>
                                                    </td>
                                                </tr>
                                        <?php
                                                    $i++;
                                                }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
    
            <!-- Modal -->
            <div id="add_user" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Add User</h4>
                  </div>
                <?php 
                    $attributes = array('name' => 'user_add_form', 'id' => 'user_add_form');
                    echo form_open('manager-admin/users/add',$attributes);
                  ?>
                  <div class="modal-body">
                    <div class="form-group mar-bot-15">
                        <label class="col-md-12">First Name</label>
                        <div class="col-md-12">
                            <input type="text" name="first_name" id="first_name" required="required" class="form-control form-control-line"> 
                        </div>
                    </div>
                    <div class="form-group mar-bot-15">
                        <label class="col-md-12">Last Name</label>
                        <div class="col-md-12">
                            <input type="text" name="last_name" id="last_name" required="required" class="form-control form-control-line"> 
                        </div>
                    </div>
                    <div class="form-group mar-bot-15">
                        <label class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="text" name="email" id="email" required="required" class="form-control form-control-line"> 
                        </div>
                    </div>
                    <div class="form-group mar-bot-15">
                        <label class="col-md-12">Password</label>
                        <div class="col-md-12">
                            <input type="password" name="password" id="password" required="required" class="form-control form-control-line"> 
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary waves-effect">Add</button>
                  </div>
                </form>
                </div>

              </div>
            </div>