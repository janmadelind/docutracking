<section class="content">
        <div class="container-fluid">
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?php echo $title ?> Purchase Requests
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
                                            <th>Mode of Procurement</th>
                                            <th>Office Originated</th>
                                            <th>Amount</th>
                                            <th>Status</th>                                            
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>PR#</th>
                                            <th>Date</th>
                                            <th>Description</th>
                                            <th>Mode of Procurement</th>
                                            <th>Office Originated</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php 
                                        if($readPR!=NULL){
                                            foreach ($readPR as $key) {
                                            $dash = " - ";
                                            if($key->mode_ID == 0  )
                                            {
                                                $key->mode_of_procurement ="None";
                                                $dash = "";
                                                $key->type_name ="";
                                            }
                                       ?>
                                        <tr>
                                            <td><?php echo $key->PR_No?></td>
                                            <td><?php echo $key->date_submitted?></td>
                                            <td><?php echo $key->proj_description?></td>
                                            <td><?php echo $key->mode_of_procurement; echo $dash; echo $key->type_name?></td>
                                            <td><?php echo $key->college_name?> - <?php echo $key->department_name?> Department</td>
                                            <td><?php echo $key->amount?></td>
                                            <td><?php echo $key->status?></td>
                                            <td>
                                                <?php echo 
                                                    '<a class="btn bg-red waves-effect" href="'.site_url('Admin_controller/bac_details/'.$key->PR_No.'').'">'?>View Details </a>
                                        
                                                <?php echo 
                                                    '<a class="btn bg-red waves-effect" data-toggle="modal" data-target="#status'.$key->PR_No.'">Update Status </a>';?>
                                            </td>
                                        </tr>
                                        <?php  
                                        echo '
                                        <div class="modal fade" id="status'.$key->PR_No.'" tabindex="-1" role="dialog">'; ?>
                                            <div class="modal-dialog modal-sm" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <?php echo form_open("Admin_controller/bac_addPR_status/$key->PR_No"); ?>
                                                        Status:
                                                        <select class="form-control show-tick" name= "status">
                                                            <option value="pending">Pending</option>
                                                            <option value="approved">Approved</option>
                                                            <option value="failed">Failed</option>
                                                        </select> 

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
                                <a name="admintable"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>
