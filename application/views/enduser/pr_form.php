<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    
    <title>PR Form</title>
    
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/style.css');?>" media="all"/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/print.css');?>" media="print" />
    <script type='text/javascript' src="<?php echo base_url('assets/PR_assets/js/jquery-1.3.2.min.js');?>"></script>
    <script type='text/javascript' src="<?php echo base_url('assets/PR_assets/js/example.js');?>"></script>

</head>

<body>

  <div id="page-wrap">

    <div id="identity">
    
          

            
    </div>
    
    <div style="clear:both"></div>
    
    <div id="customer">

    </div>
    <div class="row" style="margin-top: 0px;"> 
            <div class="column1" style="border-right: 0px; padding: 0;"><img src ="<?php echo base_url('assets/PR_assets/images/user.png');?>" style="height:70px; width:70px; margin: 2% 25% 5% 27%;"> </div>
          
               
            <div  class="column2" style="border-right: 0px;"><b>TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES </b> <br> Ayala Blvd., Ermita, Manila, 1000, Philippines <br> 
              Tel No. +632-301-3001 local 132 | Fax. No. +632-521-4063 <br> Email:procurement@tup.edu.ph | Website: www.tup.edu.ph</div>
          

             <div  class="column3" style="padding: 0 0 0 0;" >
              <div class="col1" style="border-bottom: 0px; "> Index No. </div>  
              <div class="col1" style="border-bottom: 0px;"> Issue No.  </div>  
              <div class="col1" style="border-bottom: 0px; "> Revision No. </div>  
              <div class="col1" style=" border-bottom: 0px;"> Date </div>  
            </div>

             <div  class="column4" style="padding: 0 0 0 0;">
              <div class="col2" style="border-left:0px;"> <textarea style=" width:130px;"></textarea>
              </div>
              <div class="col2" style="border-left:0px;"> <textarea style=" width:130px;"></textarea>
              </div>
              <div class="col2" style="border-left:0px;"> <textarea style=" width:130px;"></textarea>
              </div>
              <div class="col2" style="border-bottom: 0px; border-left:1px; height:20px;"> <textarea id="date" style="height:19px;width:130px;"></textarea>
              </div>
             </div>

              <div class="row1" style="padding: 0 0 0 0;""> 
            <div class="column12" style="border-top: 0px; border-right: 1px; height:38px;">VAF-PRO</div>
          
               
            <div  class="column22" style="border-top: 0px;border-right: 0px; height:38px;">PURCHASE REQUEST</div>
          

             <div  class="column32" style="border-top: 0px; border-right: 0px; width: 83px;">
              <div class="col3" style="border-bottom: 0px;  border-right: 0px; border-left: 0px;"> Page</div>
              <div class="col3" style="border-right: 0px;  border-left: 0px; height: 18px;"> QAC. No.</div>
              </div>

             <div  class="column42" style="height:38px; width:131px;"> 
                <div class="col4" style="border-right: 1px; border-left: 1px; border-top: 1px;border: 1px solid black; width: 132px; height:19px; "> <textarea style="border: 0 0 0 0; width: 130px; height:19px; "></textarea> </div>
              <div class="col4" style=" border-right: 1px; border-left: 1px; border-bottom: 1px;border: 1px solid black; width: 132px; height:19px;"> <textarea style="border: 0 0 0 0; width: 130px; height:16px; "></textarea> </div>  
             </div>
              </div>

              <div class="header1">
                <div class="h12"  style="border-bottom:0px; border-right: 0px;">Department:</div>
                <div class="h22" style="border-bottom:0px; border-right: 0px;"><textarea style="width:352px; height:18px;border-bottom:0px;" ></textarea></div>
                <div class="h32" style="border-bottom:0px; border-right:0px;">P.R. No.:</div>
                <div class="h42"><textarea style="width:137px; height:19px; "></textarea></div>
              </div>


              <div class="header1">
                <div class="h12"  style="border-right: 0px;">Section:</div>
                <div class="h22" style="border-right: 0px;"><textarea style="width:352px; height:18px; border-top:0px;" ></textarea></div>
                <div class="h32" style="border-right:0px;">SAI No.:</div>
                <div class="h42"><textarea style="width:137px; height:18px; "></textarea></div>
              </div>
    
    <table id="items" style="margin-top: 0px; border-top: hidden; ">
    
      <tr>
          <th style="width: 70px;">Item #</th>
          <th style="width: 40px;">Unit</th>
          <th style="width: 351px; ">Description</th>
          <th style="width: 40px;">Qty</th>
          <th style="width: 79px;">Unit Cost</th>
          <th style="width: 136px;">Total Cost</th>
      </tr>
      
      <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
      
        <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
          <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>
       <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>

      <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>

      <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>

      <tr class="item-row">
          <td class="item-name"><textarea style="text-align: center;"></textarea></td>
          <td class="unit"><textarea style="text-align: center;"></textarea></td>
          <td class="description"><textarea style="text-align: center;"></textarea></td>
           <td><textarea class="qty" style="text-align: center;"></textarea></td>
          <td><textarea class="cost" style="text-align: center;"></textarea></td>
          <td><span class="price" style="text-align: center;"></span></td>
      </tr>

      </table>

      <table id ="item2" style=" border-top: hidden; ">
     
     
      <tr colspan="5">
          <td  class="blank" style="width:61px;"></td>
          <td  class="blank"  style="width:71px;"> </td>
           <td  class="blank"  style="width:305px;"> </td>
          <td  class="total-line" style="width:141px;"><b> TOTAL AMOUNT: </b></td>
          <td class="total-value" style="width:118px;"><div id="total" >Php 0.00</div></td>
      </tr>
      
    </table>
    
    <div class="purpose" >
      <div class="p1" style="border-top: 0px; border-right: 0px;"> PURPOSE:</div>
      <div class="p2" style="border-top: 0px; "> <textarea style="width:657px; height: 48px;"></textarea></div>
    </div>

    <div class="ra"> 
        <div class="ra1" style="border-top: 0px; border-right: 0px;"> </div>
        <div class="ra2" style="border-top: 0px; border-right: 0px;">Requested by:</div>
        <div class="ra3" style="border-top: 0px;">Approved by:</div>
    </div>

    <div class="sign">
      <div class="s1" style="border-top: 0px; border-right: 0px;">Signature:</div>
      <div class="s2"  style="border-top: 0px; border-right: 0px;"></div>
      <div class="s3" style="border-top: 0px; "></div>
    </div>

    <div class="pn">
      <div class="pn1" style="border-top: 0px; border-right: 0px;">Printed Name: </div>
        <div class="pn2" style="border-top: 0px; border-right: 0px;"><textarea style="width:351px; height: 23px;"></textarea></div>
        <div class="pn3" style="border-top: 0px;"><textarea style="width:305px; height: 23px;"></textarea></div>
    </div>

    <div class="d">
      <div class="d1" style="border-top: 0px; border-right: 0px;">Designation: </div>
        <div class="d2" style="border-top: 0px; border-right: 0px;"><textarea style="width:351px; height: 39px;"></textarea></div>
        <div class="d3" style="border-top: 0px;"><textarea style="width:305px; height: 39px;"></textarea></div>
    </div>

    <div class="transaction">
      <div class="t1" style=" border-right: 0px; margin-top: 30px;"> Transaction ID</div>
      <div class="t2" style="margin-top: 30px;" ><textarea style="width:658px; height: 18px;"></textarea></div>
    </div>


    <div class="signature">
      <div class="sg1" style="border-top:0px; border-right: 0px; margin-bottom: 30px;"> Signature</div>
      <div class="sg2"style="border-top:0px;  margin-bottom: 30px;"></div>
    </div>

    <div class="box">
            <?php
        if($img_url)
        {
        ?>
          <img class="fill" src="<?php echo base_url('uploads/qr_image/'.$img_url); ?>" style=" height: 67px; width: 67px;" alt="QRCode Image">
        <?php
        }
        ?>
      </div>

  </div>
  
	<div class="icon-button-demo m-t-5 m-b-25 align-center noprint">
    <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" onclick="window.print()">
      <i class="material-icons">print</i>
    </button>
    <button type="button" class="btn btn-default btn-circle-lg waves-effect waves-circle waves-float" data-toggle="modal" data-target="#scanPR">
      <i class="material-icons">done</i>
    </button>
  </div>																																		  

  <div class="modal fade" id="scanPR" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="smallModalLabel">PR DETAILS</h4>
                        </div>
                        <div class="modal-body">
                          <form  action="<?php echo base_url('Admin_controller/addPR')?>" method="post">
                            Project Name: <input type="text" style="margin-bottom: 10px; width:170px;" name="projname">
                            Project Description: <input type="text" name="projdesc">
                            <input class="btn bg-pink btn-lg waves-effect margin-down" style="margin: 10% 20% 5% 35%;"type="submit" name="Submit" value="Submit">
                          </form> 
                        </div>
                        
                    </div>
                </div>
            </div> 


</body>

</html>
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

    <script>
      function getInfo(){
        var name1;
        name1 = document.getElementById(){
          
        }
      }
    </script>
</body>

</html>
