<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Notifications
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
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>PR#</th>
                                            <th>Subject</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        if($read!=NULL){
                                            foreach ($read as $key) {
                                        ?>
                                        <tr>
                                            <td><?php echo $key->PR_No?></td>
                                            <td><?php echo $key->message_subject?></td>
                                            <td><?php echo $key->message_description?></td>
                                            <td><?php echo $key->created_at?></td>
                                        <td>

                                                <?php 
                                                if($key->message_subject == "Due Date"){
                                                    echo '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#notif'.$key->PR_No.'">ADD REMARKS </a>';
                                                }
                                                else{
                                                    echo 'No Actions';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                        <?php  
                                        echo '
                                        <div class="modal fade" id="notif'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo form_open("Cashier_controller/cashier_addPR_remarks1/$key->PR_No"); ?>
                                                        <div class="form-group form-float">
                                                            <div class="form-line">
                                                                    <input type="text" class="form-control" name="remarks" required>
                                                                    <label class="form-label">Remarks</label>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input class="btn bg-red waves-effect" type="submit" name="submit" value="UPDATE">
                                                        <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                                                        <?php echo form_close();?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
