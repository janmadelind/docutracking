<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <button type="button" onclick="window.location.href='pr_form'" class="btn bg-pink btn-lg waves-effect margin-down">ADD PR</button>

            <div class="dash-title">
                <h6>COS OFFICE</h6>
            </div>
            <div class="row">
                 <div onclick="window.location.href='enduser_table_submittedpr'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">All submitted PRs</div>
                            <?php 
                            if($euserPR != NULL){
                                foreach ($euserPR as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prsubmitted; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='enduser_table_ongoing'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_late</i>
                        </div>
                        <div class="content">
                            <div class="text">Ongoing PRS</div>
                            <?php 
                            if($euserongoing != NULL){
                                foreach ($euserongoing as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prongoing; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='enduser_table_done'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment_turned_in</i>
                        </div>
                        <div class="content">
                            <div class="text">Approved PRs</div>
                            <?php 
                            if($pr_done != NULL){
                                foreach ($pr_done as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prdone; ?>"  data-speed="1500" data-fresh-interval="20"></div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <div onclick="window.location.href='enduser_table_failed'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
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
            <!-- #END# BAC -->
        </div>
    </section>
