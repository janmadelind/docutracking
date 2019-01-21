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
                <div onclick="window.location.href='enduser_table_pending'" class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box-3 bg-red hover-zoom-effect">
                        <div class="icon">
                            <i class="material-icons">assignment</i>
                        </div>
                        <div class="content">
                            <div class="text">Pending PRs</div>
                            <?php 
                            if($euserpending != NULL){
                                foreach ($euserpending as $key) {
                            ?>
                            <div class="number count-to" data-from="0" data-to="<?php echo $key->prpending; ?>"  data-speed="1500" data-fresh-interval="20"></div>
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
                            <div class="text">Finished PRs</div>
                            <div class="number count-to" data-from="0" data-to="0" data-speed="1500" data-fresh-interval="20"></div>
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
                            <div class="number count-to" data-from="0" data-to="0" data-speed="1500" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# BAC -->
        </div>
    </section>

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