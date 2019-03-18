<!DOCTYPE html>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right tab-col-red" role="tablist">
                                <li role="presentation" class="active"><a href="#info" data-toggle="tab"><i class="material-icons">info</i> PR Info</a></li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="info">
                                    <?php 
                                    if($prdetails != NULL){
                                        foreach ($prdetails as $key) {
                                                                                        
                                    ?>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Example Tab -->
        </div>

    <style type="text/css">
        .card1{
            position: relative;
            width:180px;
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
