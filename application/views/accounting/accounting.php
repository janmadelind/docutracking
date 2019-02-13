<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <button type="button" class="btn bg-pink btn-lg waves-effect margin-down" data-toggle="modal" data-target="#scanPR">SCAN PR</button>
            <div class="dash-title">
                <h6>Accounting</h6>
            </div>
            <div class="row">                
                <div onclick="window.location.href='Accounting_table_ongoing'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_late</i>
                        </div>
                        <div class="content">
                            <div class="text">Ongoing PRs</div>
                            <?php 
                            if($accountingongoing != NULL){
                                foreach ($accountingongoing as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->accountingongoingcount; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='Accounting_table_done'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="content">
                            <div class="text">Approved PRs</div>
                            <?php 
                            if($prdone != NULL){
                                foreach ($prdone as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prdone; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='Accounting_table_failed'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_late</i>
                        </div>
                        <div class="content">
                            <div class="text">Failed PRs</div>
                            <?php 
                            if($prfail != NULL){
                                foreach ($prfail as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prfail; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# proc -->
        </div>
    </section>

    <div class="modal fade" id="scanPR" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url('Accounting_controller/Accounting_scanPR')?>" method="post">
                                <input type="text" name="scanPR" value="<?php echo $prinfo['PR_No']; ?>">
                                <p><b>PR #</b> <?php echo $prinfo['PR_No']; ?></p>
                                <p><b>Date Submitted:</b> <?php echo $prinfo['date_submitted']; ?></p>
                                      
                                <p><b>Description:</b> <?php echo $prinfo['proj_description']; ?></p>
                                <p><b>Amount:</b> P <?php echo $prinfo['amount']; ?></p> 
                                <p><b>Submitted by:</b> <?php echo $prinfo['end_user_name'];?>  </p> 
                                <p><b>College: </b> <?php echo $prinfo['college_name'];?> </p>
                                <p><b>Department:</b> <?php echo $prinfo['department_name'];?>  </p>    
                                <p><b>Date Scanned :</b><?php echo $prinfo['date_scanned']; ?></p>  
                           </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </div>
                </div>
            </div>