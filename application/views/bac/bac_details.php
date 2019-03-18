<!DOCTYPE html>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right tab-col-red" role="tablist">
                                <li role="presentation" class="active"><a href="#info" data-toggle="tab"><i class="material-icons">info</i> PR Info</a></li>
                                <li role="presentation"><a href="#bidders" data-toggle="tab"><i class="material-icons">assignment_ind</i> Bidders</a></li>
                                <li role="presentation"><a href="#files" data-toggle="tab"><i class="material-icons">attach_file</i> Attached Files</a></li>
                                <li role="presentation"><a href="#remarks" data-toggle="tab"><i class="material-icons">comment</i> Remarks</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="info">
                                    <?php 
                                    if($prdetails != NULL){
                                        foreach ($prdetails as $key) {
                                            $dash = " - ";
                                            if($key->mode_ID == 0  )
                                            {
                                                $key->mode_of_procurement ="None";
                                                $dash = "";
                                                $key->type_name ="";
                                            }
                                            
                                    ?>                                    
                                    <!-- ADD PR MODE -->
                                        <?php
                                        if ($prdetails[0]->mode_ID == 0){?>
                                        <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#mode<?php echo $key->PR_No?>"><i class="material-icons">library_add</i><span>ADD MODE</span></button>
                                        
                                        <div class="modal fade" id="mode<?php echo $key->PR_No?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="smallModalLabel">Select PR Mode</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo form_open("Admin_controller/bac_addPR_modetype/$key->PR_No");?>
                                                        <input type="radio" name="mode[]" id="Small_Value" value="1" ><label for="Small_Value">Small Value Shopping</label>
                                                        <input type="radio" name="mode[]" id="Negotiated" value="2"><label for="Negotiated">Lease of Real Property And Venue</label>
                                                        <input type="radio" name="mode[]" id="Shopping" value="3"><label for="Shopping">Shopping<label>
                                                        <input type="radio" name="mode[]" id="Direct" value="4"><label for="Direct">Direct Contracting<label>
                                                        <br>
                                                        <div class="Small_Value">
                                                            <input type="radio" name="type[]" id="food" value="1"><label for="food">Food</label><br>
                                                            <input type="radio" name="type[]" id="Supplies" value="3"><label for="Supplies">Supplies and Materials</label><br>
                                                            <!-- <input type="radio" name="type[]" id="Venue" value="2"><label for="Venue">Venue</label><br> -->
                                                            <input type="radio" name="type[]" id="Equipment" value="4"><label for="Equipment">Equipment</label><br>
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
                                        <br><br>
                                        <?php } ?>
                                    <!-- ADD PR MODE -->
                                    
                                    <!-- ADD RESO OF MODE -->                                   
                                        <?php
                                            if($prdetails[0]->type_ID == 1 OR $prdetails[0]->type_ID == 2){ 
                                                if($prresomode == NULL){                                
                                        ?>
                                            <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#reso1<?php echo $key->PR_No;?>"><i class="material-icons">library_add</i><span>ADD RESOLUTION FOR MODE</span></button>
                                            <div class="modal fade" id="reso1<?php echo $key->PR_No;?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="smallModalLabel">Resolution for Mode Detail</h4>
                                                        </div>
                                                        <?php echo form_open("Admin_controller/bac_addPR_resomode/$key->PR_No");?>
                                                        <div class="modal-body">
                                                            <div class="form-group form-float">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="resomode" required>
                                                                    <label class="form-label">Resolution Number</label>
                                                                </div>
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
                                        <br><br>
                                        <?php
                                                }
                                            }
                                        ?>
                                    <!-- ADD RESO OF MODE -->
                                                                                                
                                    <table>
                                        <tr>
                                            <td><p><b>PR #</b> </p></td>
                                            <td><p>  <?php echo $key->PR_No?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Date Submitted:</b> </p></td>
                                            <td><p>  <?php echo $key->date_submitted?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Current Office:</b></p></td>
                                            <td>
                                                <p>  
                                                    <?php 
                                                    if($prcurloc != NULL){                                                    
                                                        foreach ($prcurloc as $curloc) { 
                                                            if($curloc->admin_office_ID != NULL){ 
                                                               echo $curloc->admin_office_name;
                                                            } 
                                                        }       
                                                    }
                                                    else{
                                                        echo "Bids and Awards Committee";
                                                    }                                         
                                                    ?>
                                                </p>
                                            </td>
                                        </tr>
                                                                     
                                        <tr>
                                            <td><p><b>Description:</b> </p></td>
                                            <td><p>  <?php echo $key->proj_description?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Mode of Procurement:</b> </p>  </td> 
                                            <td><p> <?php echo $key->mode_of_procurement;echo $dash; echo $key->type_name?></p></td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Submitted BY:</b></p> </td> 
                                            <td><p>  <?php echo $key->end_user_name?>  </p> </td>
                                        </tr>
                                        <tr>
                                            <td><p><b>College: </b> </p></td> 
                                            <td><p>  <?php echo $key->college_name?> </p></td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Department:</b> </p></td> 
                                            <td><p>  <?php echo $key->department_name?>  </p>  </td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Amount:</b> </p></td> 
                                            <td><p>P <?php echo $key->amount?></p> </td>
                                        </tr>
                                        <tr>
                                            <td><p><b>Awarded to:</b> </p></td> 
                                            <td><p> <?php echo $key->bidders_name?></p> </td>
                                        </tr> 
                                        <?php                                             
      
                                            }
                                        }
                                        ?>
                                        <?php
                                        if($prresomode!=NULL){
                                            foreach ($prresomode as $resomode) {
                                                
                                        ?>
                                            <tr>
                                                <td><p><b>Resolution for mode:</b> </p></td> 
                                                <td><p>  <?php echo $resomode->reso_num?>  </p>  </td>
                                            </tr>
                                        <?php       
                                            }
                                        }
                                        else{
                                        ?>
                                            <tr>
                                                <td><p><b>Resolution for mode:</b> </p></td> 
                                                <td><p>  (Pending) </p>  </td>
                                            </tr>
                                        <?php     
                                        }
                                        ?>
                                        <?php
                                        if($prresoaward!=NULL){
                                            foreach ($prresoaward as $resoaward) {                                            
                                        ?>
                                            <tr>
                                                <td><p><b>Resolution for award:</b> </p></td> 
                                                <td><p>   <?php echo $resoaward->reso_num?></p> </td>
                                            </tr>  
                                        <?php       

                                            }
                                        }
                                        else{
                                        ?>
                                            <tr>
                                                <td><p><b>Resolution for award:</b> </p></td> 
                                                <td><p>  (Pending)</p> </td>
                                            </tr>  
                                        <?php 
                                        }
                                        ?>
                                    </table>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="bidders">
                                    <?php 
                                    if($prdetails != NULL){
                                        foreach ($prdetails as $key) {  
                                            if($key->type_ID == 1 OR $key->type_ID == 2){   
                                                if($prresoaward == NULL){           
       
                                    ?>
                                            <!-- ADD RESO OF AWARDS -->
                                                <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#reso2<?php echo $key->PR_No?>"><i class="material-icons">library_add</i><span>ADD RESOLUTION FOR AWARD</span></button>
                                                
                                                <div class="modal fade" id="reso2<?php echo $key->PR_No?>" tabindex="-1" role="dialog">
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="smallModalLabel">Resolution for Awards Detail</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo form_open("Admin_controller/bac_addPR_resoawards/$key->PR_No");?>
                                                                <div class="form-group form-float">
                                                                    <div class="form-line">
                                                                        <input type="text" class="form-control" name="resoaward" required>
                                                                        <label class="form-label">Resolution Number</label>
                                                                    </div>
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
                                                <?php }?>
                                            <!-- ADD RESO OF AWARDS -->


                                            <!-- ADD NEW BIDDER -->
                                                <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#bidders1<?php echo $key->PR_No?>"><i class="material-icons">person_add</i><span>ADD NEW BIDDER</span></button>
                                                <div class="modal fade" id="bidders1<?php echo $key->PR_No?>" tabindex="-1" role="dialog">'; ?>
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="smallModalLabel">New Bidder Details</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <?php echo form_open("Admin_controller/bac_addPR_newbidders/$key->PR_No");?>
                                                                <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" name="bidders" required>
                                                                            <label class="form-label">Bidder Name</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" name="contact" required>
                                                                            <label class="form-label">Contact Number</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" name="email" required>
                                                                            <label class="form-label">Email Address</label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group form-float">
                                                                        <div class="form-line">
                                                                            <input type="text" class="form-control" name="amount" required>
                                                                            <label class="form-label">Amount (Php)</label>
                                                                        </div>
                                                                    </div>                                                          
                                                            </div>
                                                        <div class="modal-footer">
                                                            <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        </div>
                                                                <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- ADD NEW BIDDER -->                                               

                                            <!-- ADD EXISTING BIDDER -->
                                                <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#bidders2<?php echo $key->PR_No?>"><i class="material-icons">person</i><span>ADD EXISTING BIDDER</span></button>
                                                <div class="modal fade" id="bidders2<?php echo $key->PR_No?>" tabindex="-1" role="dialog">'; ?>
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="smallModalLabel">Add Existing Bidder Details</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <?php echo form_open("Admin_controller/bac_addPR_oldbidders/$key->PR_No");?> 
                                                                <select class="form-control show-tick" name ="bidder">
                                                                <?php 
                                                                foreach($allbidders as $key){
                                                                    echo '<option  value="'.$key->bidders_ID.'">'.$key->bidders_name.'</option>';
                                                                }           
                                                                ?>
                                                                </select>  
                                                                <br>
                                                                <div class="form-group form-float m-t-20">
                                                                    <div class="form-line">
                                                                        <input type="text" class="form-control" name="amount" required>
                                                                        <label class="form-label">Amount (Php)</label>
                                                                    </div>
                                                                </div>                                             
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD" >
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                            <?php echo form_close(); ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            <!-- ADD EXISTING BIDDER -->   
                                            <br><br>                                            
                                    <?php 
                                            }
                                        } 
                                    }
                                    ?>
                                       

                                    <div class="row clearfix">                                     
                                    <?php 
                                    if($prbidders != NULL){
                                        foreach($prbidders as $key){ 
                                            if($prdetails != NULL){
                                                foreach($prdetails as $details){ 
                                    ?>
                                    <!-- BOX of bidder -->
                                   
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                            <div class="card">
                                                <div class="header bg-grey">
                                                    <h2>
                                                        <?php echo $key->bidders_name?> <small></small>
                                                    </h2>
                                                    <ul class="header-dropdown m-r--5">
                                                        <li class="dropdown">
                                                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                                                <i class="material-icons">more_vert</i>
                                                            </a>
                                                            <ul class="dropdown-menu pull-right">
                                                                <li><a data-toggle="modal" data-target="#updateStatus">Update Status</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="body">
                                                    <table>
                                                        <tr>
                                                            <td><p><b>Contact Number: </b> </p></td>
                                                                <td><p> <?php echo $key->contact_no?> </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Email Address: </b> </p></td>
                                                                <td><p> <?php echo $key->email?> </p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Amount: </b> </p></td>
                                                                <td><p> P<?php echo $key->amount?></p></td>
                                                        </tr>
                                                        <tr>
                                                            <td><p><b>Status: </b> </p></td>
                                                                <td><p class="col-red"> Pending </p></td>
                                                        </tr>      
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                   
                                    <!--  BOX of bidder -->

                                    <!-- Add amount -->
                                    <div class="modal fade" id="addAmount" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="smallModalLabel">Add Amount</h4>
                                                </div>
                                                <div class="modal-body">
                                                     <?php echo form_open("Admin_controller/bac_updatePR_bidderamount/$key->bidders_ID/$details->PR_No")?>
                                                    Amount: <input type="text" style="margin-bottom: 10px; width:170px;" name="amount">
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-link waves-effect" type="submit" name="submit" value="SAVE CHANGES">
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    <?php echo form_close();?>     
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Add amount -->

                                    <!-- Update Status -->
                                    <div class="modal fade" id="updateStatus" tabindex="-1" role="dialog">
                                        <div class="modal-dialog modal-sm" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="smallModalLabel">Update Status</h4>
                                                </div>
                                                <div class="modal-body p-t-10">
                                                    <form  action="" method="post">    
                                                        <?php echo form_open("Admin_controller/bac_updatePR_bidderstatus/$key->bidders_ID/$details->PR_No");?>
                                                        <div class="">
                                                            <input type="radio" name="status[]" id="Approved" value="Approved"><label for="Approved">Approved</label><br>
                                                            <input type="radio" name="status[]" id="Disapproved" value="Disapproved"><label for="Disapproved">Disapproved</label><br>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <input class="btn btn-link waves-effect" type="submit" name="submit" value="SAVE CHANGES">
                                                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                    <?php echo form_close();?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Update Status -->

                                    <?php 
                                                } 
                                            } 
                                        } 
                                    }
                                    else{                                                
                                        echo "<div class='body'>No Bidders.</div>";
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
                                        <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#attachments<?php echo $key->PR_No;?>"><i class="material-icons">note_add</i><span>ADD ATTACHED FILE</span></button>
                                        <div class="modal fade" id="attachments<?php echo $key->PR_No;?>" tabindex="-1" role="dialog">'; ?>
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="smallModalLabel">Attached File Detail</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                    <?php echo form_open("Admin_controller/bac_addPR_attachments/$key->PR_No");?>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                <input type="text" class="form-control" name="attachedfile" required>
                                                                <label class="form-label">File Name</label>
                                                            </div>
                                                        </div>                                                           
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
                                                    <th>Added By</th>
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
                                                    <td><?php echo $key->admin_user_name?> - <?php echo $key->admin_office_name?></td>
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
                                        <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#remarks<?php echo $key->PR_No;?>"><i class="material-icons">add</i><span>ADD REMARKS</span></button>
                                        
                                            <div class="modal fade" id="remarks<?php echo $key->PR_No;?>" tabindex="-1" role="dialog">
                                                <div class="modal-dialog modal-sm" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title" id="smallModalLabel">Newe Remarks Detail</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                        <?php echo form_open("Admin_controller/bac_addPR_remarks/$key->PR_No");?>
                                                            <div class="form-group form-float m-t-20">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" name="remarks" required>
                                                                    <label class="form-label">Input Remarks</label>
                                                                </div>
                                                            </div>                                                          
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
                                                    <th>Remarks</th>                                                    
                                                    <th>Added By</th>
                                                </tr>
                                            </thead>
                                            <tbody>                                                
                                                <?php 
                                                if($prremarks != NULL){
                                                    foreach ($prremarks as $key) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $key->date_added ?></td>
                                                    <td><?php echo $key->remarks ?></td>                                                   
                                                    <td><?php echo $key->admin_user_name ?> - <?php echo $key->admin_office_name?></td>
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
        table tr td p b{
            margin-right: 50px;
        }
    </style>
