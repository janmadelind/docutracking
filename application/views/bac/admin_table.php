<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Purchase Requests
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>PR#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Mode</th>
                                            <th>Office Originated</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>PR#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Mode</th>
                                            <th>Office Originated</th>
                                            <th>Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        if($readPR!=NULL){
                                            foreach ($readPR as $key) {
                                       ?>
                                        <tr>
                                            <td><?php echo $key->PR_No?></td>
                                            <td><?php echo $key->date_submitted?></td>
                                            <td><?php echo $key->proj_description?></td>
                                            <td><?php echo $key->mode_of_procurement?></td>
                                            <td><?php echo $key->college_name?> - <?php echo $key->department_name?> Department</td>
                                            <td><?php echo $key->amount?></td>
                                            <td>
                                                <?php echo 
                                                    '<a class="btn bg-red waves-effect" href="'.site_url('Admin_controller/bac_details/'.$key->PR_No.'').'">'?>View Details </a>
                                            </td>
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
            <!-- #END# Exportable Table -->
        </div>
    </section>
    
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js'); ?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js'); ?>"></script>

    <!-- Select Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js'); ?>"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.js'); ?>"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/node-waves/waves.js'); ?>"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/jquery.dataTables.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/jszip.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js'); ?>"></script>

    <!-- Custom Js -->
    <script src="<?php echo base_url('assets/js/admin.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/pages/tables/jquery-datatable.js'); ?>"></script>

    <!-- Demo Js -->
    <script src="<?php echo base_url('assets/js/demo.js'); ?>"></script>
</body>

</html>