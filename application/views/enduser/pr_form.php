<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
    
    <title>PR Form</title>
    
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/style.css');?>" media="all"/>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/print.css');?>" media="print" />
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/justprint.css');?>" media="screen" />
    <!-- <script type='text/javascript' src="<?php echo base_url('assets/PR_assets/js/jquery-1.3.2.min.js');?>"></script> -->
    <script type='text/javascript' src="<?php echo base_url('assets/PR_assets/js/example.js');?>"></script>

</head>

<body>
	<form  action="<?php echo base_url('Admin_controller/addPR')?>" method="post">
	  	<div id="page-wrap">
	    	<div id="identity"></div>
	    	<div style="clear:both"></div>
		    <div id="customer"></div>
	    	<div class="row" style="margin-top: 0px;"> 
	            <div class="column1" style="border-right: 0px; padding: 0;"><img src ="<?php echo base_url('assets/PR_assets/images/user.png');?>" style="height:70px; width:70px; margin: 2% 25% 5% 27%;"> </div>
	            <div  class="column2" style="border-right: 0px; padding: 0; height: 80px">
	            	<b>TECHNOLOGICAL UNIVERSITY OF THE PHILIPPINES </b> <br> Ayala Blvd., Ermita, Manila, 1000, Philippines <br> 
	              	Tel No. +632-301-3001 local 132 | Fax. No. +632-521-4063 <br> Email:procurement@tup.edu.ph | Website: www.tup.edu.ph
	          	</div>

	          	<div  class="column3" style="padding: 0 0 0 0;" >
	              	<div class="col1" style="border-bottom: 0px; "><p> Index No.</p> </div>  
	              	<div class="col1" style="border-bottom: 0px;"><p> Issue No.</p>  </div>  
	              	<div class="col1" style="border-bottom: 0px; "><p> Revision No.</p> </div>  
	              	<div class="col1" style=" border-bottom: 0px;"><p> Date</p> </div>  
	            </div>

	            <div  class="column4" style="padding: 0 0 0 0;">
	              	<div class="col2" style="border-left:0px;"> 
	              		<textarea style=" width:130px;"></textarea>
	              	</div>
	              	<div class="col2" style="border-left:0px;"> 
	              		<textarea style=" width:130px;"></textarea>
	              	</div>
	              	<div class="col2" style="border-left:0px;"> 
	              		<textarea style=" width:130px;"></textarea>
	              	</div>
	              	<div class="col2" style="border-bottom: 0px; border-left:1px; height:20px;"> 
		              	<p style="height:19px;width:130px;"><?php echo date('M d, Y');?></p>
	              	</div>
	            </div>

	            <div class="row1" style="padding: 0 0 0 0;""> 
	            	<div class="column12" style="border-top: 0px; border-right: 1px; height:38px;">VAF-PRO</div>
		          	<div  class="column22" style="border-top: 0px;border-right: 0px; height:38px;">PURCHASE REQUEST</div>
					<div  class="column32" style="border-top: 0px; border-right: 0px; width: 83px; height: 38px">
	              		<div class="col3" style="border-bottom: 0px;  border-right: 0px; border-left: 0px; height: 19px;"> <p> Page </p></div>
	              		<div class="col3" style=" border-right: 0px;  border-left: 0px; height: 19px;"><p> QAC. No. </p></div>
	              	</div>
	             	<div  class="column42" style="height:38px; width:131px;"> 
	                	<div class="col4" style="border-right: 1px; border-left: 1px; border-top: 1px;border: 1px solid black; width: 132px; height:19px; "> 
	                		<textarea style=" border: 0 0 0 0; width: 130px; height:30px; padding-top: 2px;">1/1</textarea> 
	                	</div>
	              		<div class="col4" style=" border-right: 1px; border-left: 1px; border-bottom: 1px;border: 1px solid black; width: 132px; height:19px;"> 	<textarea style="border: 0 0 0 0; width: 130px; height:17px; "></textarea> 
	              		</div>  
	             	</div>
	            </div>

	            <div class="header1">
	            	<div class="h12"  style="border-bottom:0px; border-right: 0px;"><p>Department:</p></div>
	                <div class="h22" style="border-bottom:0px; border-right: 0px;">
	                	<p style="width:352px; height:18px;border-bottom:0px;" ><?php echo "  ".$this->session->userdata['department_name']; ?> Department</p>
	                </div>
	                <div class="h32" style="border-bottom:0px; border-right:0px;"><p>P.R. No.:</p></div>
	                <div class="h42">
	                	<textarea style="width:137px; height:19px; "></textarea>
	                </div>
	            </div>

				<div class="header1">
	                <div class="h12"  style="border-right: 0px;"><p>Section:</p></div>
	                <div class="h22" style="border-right: 0px;">
	                	<textarea style="width:352px; height:18px; border-top:0px;" ></textarea>
	                </div>
	                <div class="h32" style="border-right:0px;"><p>SAI No.:</p></div>
	                <div class="h42">
	                	<textarea style="width:137px; height:18px; "></textarea>
	                </div>
	            </div>
	    
			    <table id="items" style="margin-top: 0px; border-top: hidden; ">
			    	<tr>
			         	<th style="width: 70px;">  <p>Item #</p></th>
			          	<th style="width: 40px;">  <p>Unit</p></th>
			          	<th style="width: 351px;"> <p>Description</p></th>
			          	<th style="width: 40px;">  <p>Qty</p></th>
			          	<th style="width: 79px;">  <p>Unit Cost</p></th>
			          	<th style="width: 136px;"> <p>Total Cost</p></th>
			      	</tr>
			      	
			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>


			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption2" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit2" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption3" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit3" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption4" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit4" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption5" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit5" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption6" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit6" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption7" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit7" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption8" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit8" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption9" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit9" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption10" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit10" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption11" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit11" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption12" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit12" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption13" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit13" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption14" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit14" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption15" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit15" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption16" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit16" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption17" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit17" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption18" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit18" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption19" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit19" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption20" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit20" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption21" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit21" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> 
			          		<select name="unitOption22" class="noprint" style="background: #e9e9e9; width: 80px;" >
							  <option value="none" class="noprint"></option>
							  <option value="1" class="noprint">pax</option>
							  <option value="1" class="noprint">pieces</option>
							  <option value="2" class="noprint">box</option>
							  <option value="3" class="noprint">bundle</option>
							</select>

							<textarea id="show_unit22" class="justprint" style="text-align: center;"></textarea>
							
			          	</td>
			          	<td class="description"><textarea style="text-align: center;"></textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> </td>
			          	<td class="description"><textarea style="text-align: left;">Note:</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> </td>
			          	<td class="description"><textarea style="text-align: left;">Request at least a month before the need for the service/good.</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"></td>
			          	<td class="description"><textarea style="text-align: left;">Attach the latest PPMP and action plan containing your request.</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"></td>
			          	<td class="description"><textarea style="text-align: left;">Put detailed specifications.</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> </td>
			          	<td class="description"><textarea style="text-align: left;">Avoid using brand names (Section 18 of the IRR of RA 9184).</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>

			      	<tr class="item-row">
			          	<td class="item-name"><textarea style="text-align: center;"></textarea></td>
			          	<td class="unit" style="width: 82px"> </td>
			          	<td class="description"><textarea style="text-align: left;">Check from Supply Office for the availability of the items.</textarea></td>
			           	<td>
			           		<textarea class="qty" style="text-align: center;"></textarea>
			           	</td>
			          	<td>
			          		<textarea class="cost" style="text-align: center;"></textarea>
			          	</td>
			          	<td style="text-align: right"><span class="price" style="text-align: center;"></span></td>
			      	</tr>


			    </table>

			    <table id ="item2" style=" border-top: hidden; ">
			    	<tr colspan="5">
			          	<td  class="blank" style="width:61px;"></td>
			          	<td  class="blank"  style="width:71px;"> </td>
			           	<td  class="blank"  style="width:305px;"> </td>
			          	<td  class="total-line" style="width:141px;"><b> TOTAL AMOUNT: </b></td>
			          	<input type="hidden" id="total_input" value="0.00" name="total">
			          	<td class="total-value" style="width:118px; text-align: right"><div id="total" ><p>Php 0.00</p></div></td>			          	
			      	</tr>
			    </table>
			    
			    <div class="purpose" >
			      	<div class="p1" style="border-top: 0px; border-right: 0px;"><p>PURPOSE:</p></div>
			      	<div class="p2" style="border-top: 0px; "> 
			      		<textarea style="width:657px; height: 48px;" name="projdesc"></textarea>
			      	</div>
			    </div>

			    <div class="ra"> 
			        <div class="ra1" style="border-top: 0px; border-right: 0px;"> </div>
			        <div class="ra2" style="border-top: 0px; border-right: 0px;"><p>Requested by:</p></div>
			        <div class="ra3" style="border-top: 0px;"><p>Approved by:</p></div>
			    </div>

			    <div class="sign">
			      	<div class="s1" style="border-top: 0px; border-right: 0px;"><p>Signature:</p></div>
			      	<div class="s2"  style="border-top: 0px; border-right: 0px;"></div>
			      	<div class="s3" style="border-top: 0px; "></div>
			    </div>

			    <div class="pn">
			      	<div class="pn1" style="border-top: 0px; border-right: 0px;"><p>Printed Name:</p> </div>
				    <div class="pn2" style="border-top: 0px; border-right: 0px;">
				    	<p style="width:351px; height: 23px; text-align: center;" ><?php echo $this->session->userdata['end_user_name']?></p>
				    </div>
			        <div class="pn3" style="border-top: 0px;">
			        	<textarea style="width:305px; height: 23px; text-align: center;">DR. RICARDO M. DE LUMEN</textarea>
			        </div>
			    </div>

			    <div class="d">
			      	<div class="d1" style="border-top: 0px; border-right: 0px;"><p>Designation:</p> </div>
			        <div class="d2" style="border-top: 0px; border-right: 0px;">
			        	<p style="width:351px; height: 39px; text-align: center"><?php echo $this->session->userdata['college_name']; ?> - <?php echo $this->session->userdata['department_name']; ?></p>
			        </div>
			        <div class="d3" style="border-top: 0px;">
			        	<textarea style="width:305px; height: 39px; text-align: center;">Vice President for Admin & Finance</textarea>
			        </div>
			    </div>

			    <div class="transaction">
			      	<div class="t1" style=" border-right: 0px; margin-top: 30px;"> <p>Transaction ID</p></div>
			      	<div class="t2" style="margin-top: 30px;" >
				      	<textarea style="width:658px; height: 18px;"></textarea>
			      	</div>
			    </div>

				<div class="signature">
			      	<div class="sg1" style="border-top:0px; border-right: 0px; margin-bottom: 30px;"><p>Signature</p></div>
			      	<div class="sg2"style="border-top:0px;  margin-bottom: 30px;"></div>
			    </div>

			    <div class="box">
			        <?php
			        if($img_url)
			        {
			        ?>
			          <img class="" src="<?php echo base_url('uploads/qr_image/'.$img_url); ?>" style=" height: 67px; width: 67px;" alt="QRCode Image">
			        <?php
			        }
			        ?>
			    </div>
			</div>
  			<div class="icon-button-demo m-t-5 m-b-25 align-center noprint">
    			<button type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" onclick="this.disabled=true;this.value='Submit';;this.form.submit();window.print();">
      				<i class="material-icons">send</i>
    			</button>
  			</div>
  		</div>
  	</div>
  </form>
</body>

</html>
    <!-- Jquery Core Js -->
    <script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>

    <!-- Bootstrap Core Js -->
    <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.js');?>"></script>

    <!-- Select Plugin Js -->
    <!-- <script src="<?php echo base_url('assets/plugins/bootstrap-select/js/bootstrap-select.js');?>"></script> -->

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
    <script src="<?php echo base_url('assets/js/pr.js');?>"></script>
    <style type="text/css">
    	textarea{
    		background-color: #e9e9e9;
    		/*object-fit: fill; 
    		height: 20px;
    		width: 118px; height: 118px; position: absolute; border-radius: 3px;*/
    	}
    	p{
    		padding-left: 3px;
    	}
    	b{
    		padding-left: 3px;
    	}
    </style>
    <script>
      function getInfo(){
        var name1;
        name1 = document.getElementById(){
          
        }
      }
    </script>
    
</body>

</html>