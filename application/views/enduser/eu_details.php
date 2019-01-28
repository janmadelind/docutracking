<!DOCTYPE html>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>PR DETAILS(enduser)</h2>
            </div>
            <div class="align-center m-t-15 font-bold">Current Route</div>
            <ol class="breadcrumb breadcrumb-bg-pink align-center">
                <li><a href="javascript:void(0);"><i class="material-icons">home</i> BAC</a></li>
                <li><a href="javascript:void(0);"><i class="material-icons">library_books</i> LPROCUREMENT</a></li>
                <li class="active"><i class="material-icons">home</i> BAC</li>
            </ol>
            <!-- Example Tab -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                <li role="presentation" class="active"><a href="#info" data-toggle="tab">PR Info</a></li>
                               <!--  <li role="presentation"><a href="#bidders" data-toggle="tab">Bidders</a></li>
                                <li role="presentation"><a href="#files" data-toggle="tab">Attached Files</a></li>
                                <li role="presentation"><a href="#remarks" data-toggle="tab">Remarks</a></li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="info">
                                    <?php 
                                    if($prdetails != NULL){
                                        foreach ($prdetails as $key) {
                                    
                                    ?>
                                    <div class="row">
                                        <div class="card1" >
                                            <p><b>PR #</b> </p>
                                            <p><b>Date Submitted:</b> </p>
                                            <p><b>Office:</b></p>
                                            <p><b>Project Name:</b> </p>                                    
                                            <p><b>Description:</b> </p>
                                            <p><b>Mode of Procurement:</b> </p>  
                                            <p><b>Amount:</b> </p>
                                        </div>
                                        <div class="card2">
                                            <p>  <?php echo $key->PR_No?></p>
                                            <p>  <?php echo $key->date_submitted?></p>
                                            <p>  PENDING</p>
                                            <p>  PENDING</p></p>                                    
                                            <p>  <?php echo $key->proj_description?></p>
                                            <p>  <?php echo $key->mode_of_procurement?></p>   
                                            <p>P <?php echo $key->amount?></p> 
                                        </div>
                                    </div>
                                    <?php 
                                        }
                                    }
                                    ?>
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
