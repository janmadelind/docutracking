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
                                                    '<a class="btn bg-red waves-effect" href="'.base_url('Budget_controller/budget_details/'.$key->PR_No.'').'">'?>View Details </a>
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
    