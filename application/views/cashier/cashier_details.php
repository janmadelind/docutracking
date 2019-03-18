<!DOCTYPE html>
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
                                    if($prdetails != NULL){
                                        foreach ($prdetails as $key) {
                                    ?>
                                    <button class="btn bg-red waves-effect" data-toggle="modal" data-target="#qwe<?php echo $key->PR_No?>"><i class="material-icons">library_add</i><span>RETURN</span></button>
                                        
                                        <div class="modal fade" id="qwe<?php echo $key->PR_No?>" tabindex="-1" role="dialog">
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="smallModalLabel">Select PR Destination</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo form_open("Cashier_controller/cashier_PR_return/$key->PR_No");?>
                                                        <select class="form-control show-tick" name="destination">
                                                            <option><?php echo $key->end_user_name?></option>
                                                            <option value="1">BAC</option>
                                                            <option value="2">PROC</option>
                                                            <option value="6">ICO</option>
                                                            <option value="3">OP</option>
                                                            <option value="7">BUDGET</option>
                                                            <option value="8">ACCOUNTING</option>
                                                        </select>
                                                        <br>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                    <input type="text" class="form-control" name="remarks" required>
                                                                    <label class="form-label">Remarks</label>
                                                            </div>
                                                        </div>                                                                                                                
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input class="btn bg-red waves-effect" type="submit" name="submit" value="RETURN">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        <?php echo form_close();?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br><br>
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
                                                    if($return1 != NULL){                                                    
                                                        foreach ($return1 as $ret1) { 
                                                            if($ret1->end_user_name != NULL){ 
                                                               echo $ret1->college_name." - ".$ret1->department_name ;
                                                            } 
                                                        }       
                                                    }
                                                    else if($prcurloc != NULL AND $return1 == NULL){                                                    
                                                        foreach ($prcurloc as $curloc) { 
                                                            if($test != NULL && $curloc->admin_office_ID != NULL){ 
                                                               echo "Returned to ".$curloc->admin_office_name;
                                                            } 
                                                            else{ 
                                                               echo $curloc->admin_office_name;
                                                            } 

                                                        }       
                                                    }
                                                    else if($return != NULL){                                                    
                                                        foreach ($return as $ret) { 
                                                            if($ret->admin_office_ID != NULL){ 
                                                               echo $ret->admin_office_name;
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
                                            <td><p> <?php echo $key->mode_of_procurement;?> - <?php echo $key->type_name?></p></td>
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
                                    if($prbidders != NULL){
                                        foreach($prbidders as $key){ 
                                    ?>

                                    <div class="row clearfix">
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
                                    </div>
                                    <?php 
                                        }
                                    } 
                                    else{                                                
                                        echo "<br>No Bidders.";
                                    }
                                    ?>
                                </div>
                                
                                <div role="tabpanel" class="tab-pane fade" id="files">
                                    <div class="table-responsive">
                                        <?php 
                                        if($prdetails != NULL){
                                            foreach ($prdetails as $key) {
                                        ?>
                                        <!-- ADD ATTACHED FILE -->
                                            <?php  
                                            echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#attachments'.$key->PR_No.'">ADD ATTACHED FILE </a>';
                                            echo '
                                                <div class="modal fade" id="attachments'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <?php echo form_open("Cashier_controller/Cashier_addPR_attachments/$key->PR_No");?>
                                                                <p>Add name of Attached File for PR# <?php echo $key->PR_No?>:</p>
                                                                <input type="text" name="attachedfile" required>                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        <!-- ADD ATTACHED FILE -->

                                        <?php 
                                            } 
                                        }
                                        ?>
                                        <br><br> 
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
                                        <!-- ADD REMARKS -->
                                            <?php  
                                            echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#remarks'.$key->PR_No.'">ADD REMARKS </a>';
                                            echo '
                                                <div class="modal fade" id="remarks'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                                    <div class="modal-dialog modal-sm" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                            <?php echo form_open("Cashier_controller/Cashier_addPR_remarks/$key->PR_No");?>
                                                                <p>Add Remarks for PR# <?php echo $key->PR_No?>:</p>
                                                                <input type="text" name="remarks" required>                                                            
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input class="btn bg-red waves-effect" type="submit" name="submit" value="ADD">
                                                                <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                            </div>
                                                            <?php echo form_close(); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                        <!-- ADD REMARKS -->
                                        <?php 
                                            } 
                                        }
                                        ?>
                                        <br><br>
                                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
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
            <!-- #END# Example Tab -->
        
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
