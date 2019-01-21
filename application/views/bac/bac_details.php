<!DOCTYPE html>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PR DETAILS (BAC)</h2>
            </div>
            <div class="align-center m-t-15 font-bold">Current Route</div>
            <ol class="breadcrumb breadcrumb-bg-pink align-center">
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> BAC</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> LPROCUREMENT</a></li>
                <li class="active"><i class="material-icons">home</i> BAC</li>
            </ol>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#info" data-toggle="tab">PR Info</a></li>
                                <li role="presentation"><a href="#bidders" data-toggle="tab">Bidders</a></li>
                                <li role="presentation"><a href="#files" data-toggle="tab">Attached Files</a></li>
                                <li role="presentation"><a href="#remarks" data-toggle="tab">Remarks</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="info">
                                    <?php 
                                    if($prdetails != NULL && $prdetails[0]->mode_ID == 0){
                                        foreach ($prdetails as $key) {
                                  
                                    ?>
                                    <?php  
                                        echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#mode'.$key->PR_No.'">ADD MODE </a>'
                                        ?>
                                    <?php echo '
                                    <div class="modal fade" id="mode'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <?php echo form_open("Admin_controller/bac_addPR_mode/$key->PR_No");?>
                                                    <input type="checkbox" name="mode[]" id="Small_Value" value="1" ><label for="Small_Value">Small Value Shopping</label>
                                                    <input type="checkbox" name="mode[]" id="Negotiated" value="2"><label for="Negotiated">Negotiated Procurement</label>
                                                    <div class="Small_Value">
                                                        <input type="checkbox" name="submode[]" id="food" value="1"><label for="food">Food</label><br>
                                                        <input type="checkbox" name="submode[]" id="Supplies" value="2"><label for="Supplies">Supplies and Materials</label><br>
                                                        <input type="checkbox" name="submode[]" id="Venue" value="3"><label for="Venue">Venue</label><br>
                                                        <input type="checkbox" name="submode[]" id="Equipment" value="4"><label for="Equipment">Equipment</label><br>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <!-- <p><b>PR #</b> <?php echo $key->PR_No?></p>
                                    <p><b>Date Submitted:</b> <?php echo $key->date_submitted?></p>
                                    <p><b>Office:</b> PENDING</p>
                                    <p><b>Project Name:</b> <?php echo $key->proj_name?></p></p>                                    
                                    <p><b>Description:</b> <?php echo $key->proj_description?></p>
                                    <p><b>Submitted by:</b> <?php echo $key->end_user_name?>  </p> 
                                    <p><b>College: </b> <?php echo $key->college_name?> </p>
                                    <p><b>Department:</b> <?php echo $key->department_name?>  </p>     
                                    <p><b>Amount:</b> P <?php echo $key->amount?></p> -->
                                    <?php 
                                        }
                                    }
                                    ?>
                                    <?php 
                                    if($prdetails != NULL ){
                                        foreach ($prdetails as $key) {
                                    ?>
                                    <div class="row">
                                        <div class="card1" >
                                            <p><b>PR #</b> </p>
                                            <p><b>Date Submitted:</b> </p>
                                            <p><b>Office:</b></p>
                                            <p><b>Project Name:</b> </p>                                    
                                            <p><b>Description:</b> </p>
                                            <p><b>Mode of Procurement:</b> </p>                                            
                                            <p><b>Submitted BY:</b></p> 
                                            <p><b>College: </b> </p>
                                            <p><b>Submitted BY:</b> </p>     
                                            <p><b>Amount:</b> </p>
                                        </div>
                                        <div class="card2">
                                            <p>  <?php echo $key->PR_No?></p>
                                            <p>  <?php echo $key->date_submitted?></p>
                                            <p>  PENDING</p>
                                            <p>  PENDING</p></p>                                    
                                            <p>  <?php echo $key->proj_description?></p>
                                            <p>  <?php echo $key->mode_of_procurement?></p>
                                            <p>  <?php echo $key->end_user_name?>  </p> 
                                            <p>  <?php echo $key->college_name?> </p>
                                            <p>  <?php echo $key->end_user_name?>  </p>     
                                            <p>P <?php echo $key->amount?></p> 
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    }
                                    ?>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="bidders">
                                    <div class="row">
										<?php 
                                            if($prbidders != NULL){
                                                foreach($prbidders as $key){ 
                                            ?>
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">  
                                            <div class="card" >
                                                <div class="body bg-grey">
                                                    <p><b>Name:</b> <?php echo $key->bidders_name?></p>
                                                    <p><b>Contact #:</b> <?php echo $key->contact_no?></p>
                                                    <p><b>Email:</b> <?php echo $key->email?></p>
                                                    <b>-</b>
                                                    <p><b>Amount:</b><?php echo $key->amount?></p>
                                                    <p><b>Status:</b> (PENDING) </p>
                                                </div>
                                            </div>
                                        </div>
										<?php 
                                                }
                                            } 
                                            else{
                                                echo "No Bidders.";
                                            }
                                            ?>
                                    </div>  
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="files">
                                    <div class="table-responsive">
                                        <?php 
                                        if($prdetails != NULL){
                                            foreach ($prdetails as $key) {
                                        ?>
                                        <?php  
                                        echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#attachments'.$key->PR_No.'">ADD ATTACHED FILE </a>'
                                        ?>
                                        <?php echo '
                                            <div class="modal fade" id="attachments'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo form_open("Admin_controller/bac_addPR_attachments/$key->PR_No");?>
                                                            <p>Add name of Attached File for PR# <?php echo $key->PR_No?>:</p>
                                                            <input type="text" name="attachedfile">                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                        <br><br> 
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Date Added</th>
                                                    <th>Name</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                if($prattachements != NULL){
                                                    foreach ($prattachements as $key) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key->date_attached?></td>
                                                    <td><?php echo $key->file_name?></td>
                                                </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div role="tabpanel" class="tab-pane fade" id="remarks">
                                    <div class="table-responsive">
                                        <?php 
                                        if($prdetails != NULL){
                                            foreach ($prdetails as $key) {
                                        ?>
                                        <?php  
                                        echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#remarks'.$key->PR_No.'">ADD REMARKS </a>'
                                        ?>
                                        <?php echo '
                                            <div class="modal fade" id="remarks'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo form_open("Admin_controller/bac_addPR_remarks/$key->PR_No");?>
                                                            <p>Add Remarks for PR# <?php echo $key->PR_No?>:</p>
                                                            <input type="text" name="remarks">                                                            
                                                        </div>
                                                        <div class="modal-footer">
                                                            <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        </div>
                                                        <?php echo form_close(); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php 
                                            } 
                                        }
                                        ?>
                                        <br><br>
                                        <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Date Added</th>
                                                    <th>Added By</th>
                                                    <th>Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php 
                                                if($prremarks != NULL){
                                                    foreach ($prremarks as $key) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key->date_added ?></td>
                                                    <td><?php echo $key->admin_user_name ?> - <?php echo $key->admin_office_name?></td>
                                                    <td><?php echo $key->remarks ?></td>
                                                </tr>
                                                <?php 
                                                    }
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>
    </section>
    <style type="text/css">
        .card1{
            position: relative;
            width:160px;
            border-radius: 5px;
            padding: 25px 0 0 15px;
            margin-right: 10px;
            float: left;
        }
        .card2{
            position: relative;
            width:650px;
            margin: 0 auto;
            border-radius: 5px;
            padding: 25px 15px 0 0;
            margin-right: 10px;
            float: left;
        }
        .Small_Value{
            margin-left: 30px;
        }
    </style>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js');?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js');?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/node-waves/waves.js');?>"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-countto/jquery.countTo.js');?>"></script>

    <!-- Morris Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/raphael/raphael.min.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/morrisjs/morris.js');?>"></script>

    <!-- ChartJs -->
    <script src="<?php echo base_url('assets/plugins/chartjs/Chart.bundle.js');?>"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.resize.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.pie.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.categories.js');?>"></script>
    <script src="<?php echo base_url('assets/plugins/flot-charts/jquery.flot.time.js');?>"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-sparkline/jquery.sparkline.js');?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/admin.js');?>"></script>
    <script src="<?php echo base_url('assets/js/pages/index.js');?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets/js/demo.js');?>"></script>
</body>

</html>
