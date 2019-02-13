<!DOCTYPE html>

<head>
    <link rel='stylesheet' type='text/css' href="<?php echo base_url('assets/PR_assets/css/print.css');?>" media="print" />
</head>

<body>
    <section class="content">
        <div class="container-fluid">
			<?php 
				$jan2 = $feb2 = $mar2=$apr2 = $may2 = $jun2 = $jul2 = $aug2 = $sep2 = $oct2 = $nov2 = $dec2 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
				$SVP = array();
	            if($svpPRcount != NULL){
	            	foreach($svpPRcount as $key){
	            		// echo "<b>".$key->count."</b><br>" ;
	            		$SVP[] = $key->PR_No;
	            		if($key->mon == 1){
			            	$jan2[]=$key->PR_No;
			           	}
			           	if($key->mon == 2){
			           		$feb2[]=$key->PR_No;
			           	}
			           	if($key->mon == 3){
			           		$mar2[]=$key->PR_No;
			           	}
			           	if($key->mon == 4){
			           		$apr2[]=$key->PR_No;
			           	}
			           	if($key->mon == 5){
			           		$may2[]=$key->PR_No;
		            	}
		            	if($key->mon == 6){
		            		$jun2[]=$key->PR_No;
			            }
			           	if($key->mon == 7){
			           		$jul2[]=$key->PR_No;
			           	}
			           	if($key->mon == 8){
			           		$aug2[]=$key->PR_No;
			           	}
			           	if($key->mon == 9){
			           		$sep2[]=$key->PR_No;
			           	}
			           	if($key->mon == 10){
			           		$oct2[]=$key->PR_No;
			           	}
			           	if($key->mon == 11){
			           		$nov2[]=$key->PR_No;
			           	}
			           	if($key->mon == 12){
			           		$dec2[]=$key->PR_No;
			           	}
			           	if ($key->mon == 1 OR $key->mon == 2 OR $key->mon == 3){
			           		$firstQ2[] = $key->PR_No;
			           	}
			           	if ($key->mon == 4 OR $key->mon == 5 OR $key->mon == 6){
			           		$secondQ2[] = $key->PR_No;
			           	}
			            if ($key->mon == 7 OR $key->mon == 8 OR $key->mon == 9){
			          		$thirdQ2[] = $key->PR_No;
			            }
		            	if ($key->mon == 10 OR $key->mon == 11 OR $key->mon == 12){
		            		$forthQ2[] = $key->PR_No;
		            	}
		            }
		            $svpmon = array(
						array("label"=> "January", "y"  => count($jan2)),
						array("label"=> "February", "y" => count($feb2)),
						array("label"=> "March", "y"    => count($mar2)),
						array("label"=> "April", "y"    => count($apr2)),
						array("label"=> "May", "y"      => count($may2)),		
						array("label"=> "June", "y"     => count($jun2)),
						array("label"=> "July", "y"	    => count($jul2)),		
						array("label"=> "August", "y"   => count($aug2)),
						array("label"=> "September", "y"=> count($sep2)),
						array("label"=> "October", "y"  => count($oct2)),
						array("label"=> "November", "y" => count($nov2)),
						array("label"=> "December", "y" => count($dec2))
					);
					$svpQ = array(
						array("label"=> "First Quarter", "y"  => count($firstQ2)),
						array("label"=> "Second Quarter", "y" => count($secondQ2)),
						array("label"=> "Third Quarte", "y"    => count($thirdQ2)),
						array("label"=> "Forth Quarter", "y"    => count($forthQ2))
					);
		            $svpcount = array(
						array("label"=> "Negotiated Procurement", "y"  => count($SVP))
					);
					// print_r($svpmon);

            	}
           	?>
			<?php 
				$jan1= $feb1 = $mar1 = $apr1 = $may1 = $jun1 = $jul1 = $aug1 = $sep1 = $oct1 = $nov1 = $dec1 = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$NP = array();
	            if($npPRcount != NULL){
	            	foreach($npPRcount as $key){
	            		// echo "<b>".$key->count."</b><br>" ;
	            		$NP[] = $key->PR_No;
	            		if($key->mon == 1){
		            		$jan1[]=$key->PR_No;
		            	}
		            	if($key->mon == 2){
		            		$feb1[]=$key->PR_No;
		            	}
		            	if($key->mon == 3){
		            		$mar1[]=$key->PR_No;
		            	}
		            	if($key->mon == 4){
		            		$apr1[]=$key->PR_No;
		            	}
		            	if($key->mon == 5){
		            		$may1[]=$key->PR_No;
		            	}
		            	if($key->mon == 6){
		            		$jun1[]=$key->PR_No;
		            	}
		            	if($key->mon == 7){
		            		$jul1[]=$key->PR_No;
		            	}
		            	if($key->mon == 8){
		            		$aug1[]=$key->PR_No;
		            	}
		            	if($key->mon == 9){
		            		$sep1[]=$key->PR_No;
		            	}
		            	if($key->mon == 10){
		            		$oct1[]=$key->PR_No;
		            	}
		            	if($key->mon == 11){
		            		$nov1[]=$key->PR_No;
		            	}
		            	if($key->mon == 12){
		            		$dec1[]=$key->PR_No;
		            	}
		            	if ($key->mon == 1 OR $key->mon == 2 OR $key->mon == 3){
		            		$firstQ1[] = $key->PR_No;
		            	}
		            	if ($key->mon == 4 OR $key->mon == 5 OR $key->mon == 6){
		            		$secondQ1[] = $key->PR_No;
		            	}
		            	if ($key->mon == 7 OR $key->mon == 8 OR $key->mon == 9){
		            		$thirdQ1[] = $key->PR_No;
		            	}
		            	if ($key->mon == 10 OR $key->mon == 11 OR $key->mon == 12){
		            		$forthQ1[] = $key->PR_No;
		            	}
	            	}
	            	$npmon = array(
						array("label"=> "January", "y"  => count($jan1)),
						array("label"=> "February", "y" => count($feb1)),
						array("label"=> "March", "y"    => count($mar1)),
						array("label"=> "April", "y"    => count($apr1)),
						array("label"=> "May", "y"      => count($may1)),		
						array("label"=> "June", "y"     => count($jun1)),
						array("label"=> "July", "y"	    => count($jul1)),		
						array("label"=> "August", "y"   => count($aug1)),
						array("label"=> "September", "y"=> count($sep1)),
						array("label"=> "October", "y"  => count($oct1)),
						array("label"=> "November", "y" => count($nov1)),
						array("label"=> "December", "y" => count($dec1))
					);
					$npQ = array(
						array("label"=> "First Quarter", "y"  => count($firstQ1)),
						array("label"=> "Second Quarter", "y" => count($secondQ1)),
						array("label"=> "Third Quarte", "y"    => count($thirdQ1)),
						array("label"=> "Forth Quarter", "y"    => count($forthQ1))
					);
	            	$npcount = array(
						array("label"=> "Negotiated Procurement", "y"  => count($NP))
					);
            }?>
           	
			<?php 
				$jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = array();
				$firstQ = $secondQ = $thirdQ = $forthQ = array();
	            //MONTHLY AND QURTERLY OF ALL PR
	            if($mon != NULL){
	            	foreach($mon as $key){
	            		if($key->mon == 1){
	            			$jan[]=$key->PR_No;
	            		}
	            		if($key->mon == 2){
	            			$feb[]=$key->PR_No;
	            		}
	            		if($key->mon == 3){
	            			$mar[]=$key->PR_No;
	            		}
	            		if($key->mon == 4){
	            			$apr[]=$key->PR_No;
	            		}
	            		if($key->mon == 5){
	            			$may[]=$key->PR_No;
	            		}
	            		if($key->mon == 6){
	            			$jun[]=$key->PR_No;
	            		}
	            		if($key->mon == 7){
	            			$jul[]=$key->PR_No;
	            		}
	            		if($key->mon == 8){
	            			$aug[]=$key->PR_No;
	            		}
	            		if($key->mon == 9){
	            			$sep[]=$key->PR_No;
	            		}
	            		if($key->mon == 10){
	            			$oct[]=$key->PR_No;
	            		}
	            		if($key->mon == 11){
	            			$nov[]=$key->PR_No;
	            		}
	            		if($key->mon == 12){
	            			$dec[]=$key->PR_No;
	            		}
	            		if ($key->mon == 1 OR $key->mon == 2 OR $key->mon == 3){
	            			$firstQ[] = $key->PR_No;
	            		}
	            		if ($key->mon == 4 OR $key->mon == 5 OR $key->mon == 6){
	            			$secondQ[] = $key->PR_No;
	            		}
	            		if ($key->mon == 7 OR $key->mon == 8 OR $key->mon == 9){
	            			$thirdQ[] = $key->PR_No;
	            		}
	            		if ($key->mon == 10 OR $key->mon == 11 OR $key->mon == 12){
	            			$forthQ[] = $key->PR_No;
	            		}
	            	}            	            	
		            $dataPoints1 = array(
						array("label"=> "January", "y"  => count($jan)),
						array("label"=> "February", "y" => count($feb)),
						array("label"=> "March", "y"    => count($mar)),
						array("label"=> "April", "y"    => count($apr)),
						array("label"=> "May", "y"      => count($may)),		
						array("label"=> "June", "y"     => count($jun)),
						array("label"=> "July", "y"	    => count($jul)),		
						array("label"=> "August", "y"   => count($aug)),
						array("label"=> "September", "y"=> count($sep)),
						array("label"=> "October", "y"  => count($oct)),
						array("label"=> "November", "y" => count($nov)),
						array("label"=> "December", "y" => count($dec))
					);
					$dataPoints2 = array(
						array("label"=> "First Quarter", "y"  => count($firstQ)),
						array("label"=> "Second Quarter", "y" => count($secondQ)),
						array("label"=> "Third Quarte", "y"    => count($thirdQ)),
						array("label"=> "Forth Quarter", "y"    => count($forthQ))
					);
	            }
	            $dept1 = $dept2 = $dept3 = $dept4 = $dept5 = $dept6 = $dept7 = $dept8 = $dept9 = $dept10 = $dept11 = $dept12 = $dept13 = array();
	            $dept14 = $dept15 = $dept16 = $dept17 = $dept18 = $dept19 = $dept20 = $dept21 = $dept22 = $dept23 = $dept24 = $dept25 = $dept26 = array();
	            $col1 = $col2 = $col3 = $col4 = $col5 = $col6 = array(); 
	            $keyname = array();
	            //PER DEPARTMENT AND PER COLLEGE
	            if($deptcol != NULL){
            	foreach($deptcol as $key){
            		if($key->department_ID == 1){
            			$dept1[] = $key->PR_No;
            		}
            		if($key->department_ID == 2){
            			$dept2[] = $key->PR_No;
            		}
            		if($key->department_ID == 3){
            			$dept3[] = $key->PR_No;
            		}
            		if($key->department_ID == 4){
            			$dept4[] = $key->PR_No;
            		}
            		if($key->department_ID == 5){
            			$dept5[] = $key->PR_No;
            		}
            		if($key->department_ID == 6){
            			$dept6[] = $key->PR_No;
            		}
            		if($key->department_ID == 7){
            			$dept7[] = $key->PR_No;
            		}
            		if($key->department_ID == 8){
            			$dept8[] = $key->PR_No;
            		}
            		if($key->department_ID == 9){
            			$dept9[] = $key->PR_No;
            		}
            		if($key->department_ID == 10){
            			$dept10[] = $key->PR_No;
            		}
            		if($key->department_ID == 11){
            			$dept11[] = $key->PR_No;
            		}
            		if($key->department_ID == 12){
            			$dept12[] = $key->PR_No;
            		}
            		if($key->department_ID == 13){
            			$dept13[] = $key->PR_No;
            		}
            		if($key->department_ID == 14){
            			$dept14[] = $key->PR_No;
            		}
            		if($key->department_ID == 15){
            			$dept15[] = $key->PR_No;
            		}
            		if($key->department_ID == 16){
            			$dept16[] = $key->PR_No;
            		}
            		if($key->department_ID == 17){
            			$dept17[] = $key->PR_No;
            		}
            		if($key->department_ID == 18){
            			$dept18[] = $key->PR_No;
            		}
            		if($key->department_ID == 19){
            			$dept19[] = $key->PR_No;
            		}
            		if($key->department_ID == 20){
            			$dept20[] = $key->PR_No;
            		}
            		if($key->department_ID == 21){
            			$dept21[] = $key->PR_No;
            		}
            		if($key->department_ID == 22){
            			$dept22[] = $key->PR_No;
            		}
            		if($key->department_ID == 23){
            			$dept23[] = $key->PR_No;
            		}
            		if($key->department_ID == 24){
            			$dept24[] = $key->PR_No;
            		}
            		if($key->department_ID == 25){
            			$dept25[] = $key->PR_No;
            		}
            		if($key->department_ID == 26){
            			$dept26[] = $key->PR_No;
            		}
            		if($key->college_ID == 1){
            			$col1[] =  $key->PR_No;
            		}
            		if($key->college_ID == 2){
            			$col2[] =  $key->PR_No;
            		}
            		if($key->college_ID == 3){
            			$col3[] =  $key->PR_No;
            		}
            		if($key->college_ID == 4){
            			$col4[] =  $key->PR_No;
            		}
            		if($key->college_ID == 5){
            			$col5[] =  $key->PR_No;
            		}
            		if($key->college_ID == 6){
            			$col6[] =  $key->PR_No;
            		}
            	}
            	            	
            	$dataPoints3 = array(
					array("label"=> $deptname[0]->department_name, "y"   => count($dept1)),
					array("label"=> $deptname[1]->department_name, "y"   => count($dept2)),
					array("label"=> $deptname[2]->department_name, "y"   => count($dept3)),
					array("label"=> $deptname[3]->department_name, "y"   => count($dept4)),
					array("label"=> $deptname[4]->department_name, "y"   => count($dept5)),
					array("label"=> $deptname[5]->department_name, "y"   => count($dept6)),
					array("label"=> $deptname[6]->department_name, "y"   => count($dept7)),
					array("label"=> $deptname[7]->department_name, "y"   => count($dept8)),
					array("label"=> $deptname[8]->department_name, "y"   => count($dept9)),
					array("label"=> $deptname[9]->department_name, "y"   => count($dept10)),
					array("label"=> $deptname[10]->department_name, "y"  => count($dept11)),
					array("label"=> $deptname[11]->department_name, "y"  => count($dept12)),
					array("label"=> $deptname[12]->department_name, "y"  => count($dept13)),
					array("label"=> $deptname[13]->department_name, "y"  => count($dept14)),
					array("label"=> $deptname[14]->department_name, "y"  => count($dept15)),
					array("label"=> $deptname[15]->department_name, "y"  => count($dept16)),
					array("label"=> $deptname[16]->department_name, "y"  => count($dept17)),
					array("label"=> $deptname[17]->department_name, "y"  => count($dept18)),
					array("label"=> $deptname[18]->department_name, "y"  => count($dept19)),
					array("label"=> $deptname[19]->department_name, "y"  => count($dept20)),
					array("label"=> $deptname[20]->department_name, "y"  => count($dept21)),
					array("label"=> $deptname[21]->department_name, "y"  => count($dept22)),
					array("label"=> $deptname[22]->department_name, "y"  => count($dept23)),
					array("label"=> $deptname[23]->department_name, "y"  => count($dept24)),
					array("label"=> $deptname[24]->department_name, "y"  => count($dept25)),
					array("label"=> $deptname[25]->department_name, "y"  => count($dept26)),
				);
				$dataPoints4 = array(
					array("label"=> $colname[0]->college_name, "y"   => count($col1)),
					array("label"=> $colname[1]->college_name, "y"   => count($col2)),
					array("label"=> $colname[2]->college_name, "y"   => count($col3)),
					array("label"=> $colname[3]->college_name, "y"   => count($col4)),
					array("label"=> $colname[4]->college_name, "y"   => count($col5)),
					array("label"=> $colname[5]->college_name, "y"   => count($col6))
				); 		
            }
            ?>
            <!-- ALL PER DEPARTMENT 7 PER COLLEGE -->
            <?php
	            $mon1col1=$mon2col1=$mon3col1=$mon4col1=$mon5col1=$mon6col1=$mon7col1 = $mon8col1 = $mon9col1 = $mon10col1 = $mon11col1 = $mon12col1 = array();
	            $mon1col2=$mon2col2=$mon3col2=$mon4col2=$mon5col2=$mon6col2=$mon7col2 = $mon8col2 = $mon9col2 = $mon10col2 = $mon11col2 = $mon12col2 = array();
	            $mon1col3=$mon2col3=$mon3col3=$mon4col3=$mon5col3=$mon6col3=$mon7col3 = $mon8col3 = $mon9col3 = $mon10col3 = $mon11col3 = $mon12col3 = array();
	            $mon1col4=$mon2col4=$mon3col4=$mon4col4=$mon5col4=$mon6col4=$mon7col4 = $mon8col4 = $mon9col4 = $mon10col4 = $mon11col4 = $mon12col4 = array();
	            $mon1col5=$mon2col5=$mon3col5=$mon4col5=$mon5col5=$mon6col5=$mon7col5 = $mon8col5 = $mon9col5 = $mon10col5 = $mon11col5 = $mon12col5 = array();
	            $mon1col6=$mon2col6=$mon3col6=$mon4col6=$mon5col6=$mon6col6=$mon7col6 = $mon8col6 = $mon9col6 = $mon10col6 = $mon11col6 = $mon12col6 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		if($dc->college_ID == 1){
		            		if($dc->mon == 1){
		            			$mon1col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col1[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->college_ID == 2){
		            		if($dc->mon == 1){
		            			$mon1col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col2[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->college_ID == 3){
		            		if($dc->mon == 1){
		            			$mon1col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col3[] = $dc->PR_No;
		            		}	            		
		            	}
		            	if($dc->college_ID == 4){
		            		if($dc->mon == 1){
		            			$mon1col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col4[] = $dc->PR_No;
		            		}	            		
		            	}
		            	if($dc->college_ID == 5){
		            		if($dc->mon == 1){
		            			$mon1col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col5[] = $dc->PR_No;
		            		}	            		
		            	}
		            	if($dc->college_ID == 6){
		            		if($dc->mon == 1){
		            			$mon1col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11col6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12col6[] = $dc->PR_No;
		            		}	            		
		            	}
	            	}
	            	$moncol1 = array(
						array("label"=> "January", "y"  => count($mon1col1)),
						array("label"=> "February", "y" => count($mon2col1)),
						array("label"=> "March", "y"    => count($mon3col1)),
						array("label"=> "April", "y"    => count($mon4col1)),
						array("label"=> "May", "y"      => count($mon5col1)),		
						array("label"=> "June", "y"     => count($mon6col1)),
						array("label"=> "July", "y"	    => count($mon7col1)),		
						array("label"=> "August", "y"   => count($mon8col1)),
						array("label"=> "September", "y"=> count($mon9col1)),
						array("label"=> "October", "y"  => count($mon10col1)),
						array("label"=> "November", "y" => count($mon11col1)),
						array("label"=> "December", "y" => count($mon12col1))
					);
					$moncol2 = array(
						array("label"=> "January", "y"  => count($mon1col2)),
						array("label"=> "February", "y" => count($mon2col2)),
						array("label"=> "March", "y"    => count($mon3col2)),
						array("label"=> "April", "y"    => count($mon4col2)),
						array("label"=> "May", "y"      => count($mon5col2)),		
						array("label"=> "June", "y"     => count($mon6col2)),
						array("label"=> "July", "y"	    => count($mon7col2)),		
						array("label"=> "August", "y"   => count($mon8col2)),
						array("label"=> "September", "y"=> count($mon9col2)),
						array("label"=> "October", "y"  => count($mon10col2)),
						array("label"=> "November", "y" => count($mon11col2)),
						array("label"=> "December", "y" => count($mon12col2))
					);
					$moncol3 = array(
						array("label"=> "January", "y"  => count($mon1col3)),
						array("label"=> "February", "y" => count($mon2col3)),
						array("label"=> "March", "y"    => count($mon3col3)),
						array("label"=> "April", "y"    => count($mon4col3)),
						array("label"=> "May", "y"      => count($mon5col3)),		
						array("label"=> "June", "y"     => count($mon6col3)),
						array("label"=> "July", "y"	    => count($mon7col3)),		
						array("label"=> "August", "y"   => count($mon8col3)),
						array("label"=> "September", "y"=> count($mon9col3)),
						array("label"=> "October", "y"  => count($mon10col3)),
						array("label"=> "November", "y" => count($mon11col3)),
						array("label"=> "December", "y" => count($mon12col3))
					);
					$moncol4 = array(
						array("label"=> "January", "y"  => count($mon1col4)),
						array("label"=> "February", "y" => count($mon2col4)),
						array("label"=> "March", "y"    => count($mon3col4)),
						array("label"=> "April", "y"    => count($mon4col4)),
						array("label"=> "May", "y"      => count($mon5col4)),		
						array("label"=> "June", "y"     => count($mon6col4)),
						array("label"=> "July", "y"	    => count($mon7col4)),		
						array("label"=> "August", "y"   => count($mon8col4)),
						array("label"=> "September", "y"=> count($mon9col4)),
						array("label"=> "October", "y"  => count($mon10col4)),
						array("label"=> "November", "y" => count($mon11col4)),
						array("label"=> "December", "y" => count($mon12col4))
					);
					$moncol5 = array(
						array("label"=> "January", "y"  => count($mon1col5)),
						array("label"=> "February", "y" => count($mon2col5)),
						array("label"=> "March", "y"    => count($mon3col5)),
						array("label"=> "April", "y"    => count($mon4col5)),
						array("label"=> "May", "y"      => count($mon5col5)),		
						array("label"=> "June", "y"     => count($mon6col5)),
						array("label"=> "July", "y"	    => count($mon7col5)),		
						array("label"=> "August", "y"   => count($mon8col5)),
						array("label"=> "September", "y"=> count($mon9col5)),
						array("label"=> "October", "y"  => count($mon10col5)),
						array("label"=> "November", "y" => count($mon11col5)),
						array("label"=> "December", "y" => count($mon12col5))
					);
					$moncol6 = array(
						array("label"=> "January", "y"  => count($mon1col6)),
						array("label"=> "February", "y" => count($mon2col6)),
						array("label"=> "March", "y"    => count($mon3col6)),
						array("label"=> "April", "y"    => count($mon4col6)),
						array("label"=> "May", "y"      => count($mon5col6)),		
						array("label"=> "June", "y"     => count($mon6col6)),
						array("label"=> "July", "y"	    => count($mon7col6)),		
						array("label"=> "August", "y"   => count($mon8col6)),
						array("label"=> "September", "y"=> count($mon9col6)),
						array("label"=> "October", "y"  => count($mon10col6)),
						array("label"=> "November", "y" => count($mon11col6)),
						array("label"=> "December", "y" => count($mon12col6))
					);
            }
            ?>
            <!-- COS DEPARTMNETS -->
            <?php
	            $mon1dept1=$mon2dept1=$mon3dept1=$mon4dept1=$mon5dept1=$mon6dept1=$mon7dept1=$mon8dept1=$mon9dept1=$mon10dept1=$mon11dept1=$mon12dept1 = array();
	            $mon1dept2=$mon2dept2=$mon3dept2=$mon4dept2=$mon5dept2=$mon6dept2=$mon7dept2=$mon8dept2=$mon9dept2=$mon10dept2=$mon11dept2=$mon12dept2 = array();
	            $mon1dept3=$mon2dept3=$mon3dept3=$mon4dept3=$mon5dept3=$mon6dept3=$mon7dept3=$mon8dept3=$mon9dept3=$mon10dept3=$mon11dept3=$mon12dept3 = array();
	            $firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 1
	            		if($dc->department_ID == 1){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 2
	            		if($dc->department_ID == 2){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 3
	            		if($dc->department_ID == 3){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		if($dc->department_ID == 1){
		            		if($dc->mon == 1){
		            			$mon1dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept1[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept1[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 2){
		            		if($dc->mon == 1){
		            			$mon1dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept2[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept2[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 3){
		            		if($dc->mon == 1){
		            			$mon1dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept3[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept3[] = $dc->PR_No;
		            		}	            		
		            	}
		            }
		            $qdept1 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept2 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept3 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
		            $mondept1 = array(
						array("label"=> "January", "y"  => count($mon1dept1)),
						array("label"=> "February", "y" => count($mon2dept1)),
						array("label"=> "March", "y"    => count($mon3dept1)),
						array("label"=> "April", "y"    => count($mon4dept1)),
						array("label"=> "May", "y"      => count($mon5dept1)),		
						array("label"=> "June", "y"     => count($mon6dept1)),
						array("label"=> "July", "y"	    => count($mon7dept1)),		
						array("label"=> "August", "y"   => count($mon8dept1)),
						array("label"=> "September", "y"=> count($mon9dept1)),
						array("label"=> "October", "y"  => count($mon10dept1)),
						array("label"=> "November", "y" => count($mon11dept1)),
						array("label"=> "December", "y" => count($mon12dept1))
					);
					$mondept2 = array(
						array("label"=> "January", "y"  => count($mon1dept2)),
						array("label"=> "February", "y" => count($mon2dept2)),
						array("label"=> "March", "y"    => count($mon3dept2)),
						array("label"=> "April", "y"    => count($mon4dept2)),
						array("label"=> "May", "y"      => count($mon5dept2)),		
						array("label"=> "June", "y"     => count($mon6dept2)),
						array("label"=> "July", "y"	    => count($mon7dept2)),		
						array("label"=> "August", "y"   => count($mon8dept2)),
						array("label"=> "September", "y"=> count($mon9dept2)),
						array("label"=> "October", "y"  => count($mon10dept2)),
						array("label"=> "November", "y" => count($mon11dept2)),
						array("label"=> "December", "y" => count($mon12dept2))
					);
					$mondept3 = array(
						array("label"=> "January", "y"  => count($mon1dept3)),
						array("label"=> "February", "y" => count($mon2dept3)),
						array("label"=> "March", "y"    => count($mon3dept3)),
						array("label"=> "April", "y"    => count($mon4dept3)),
						array("label"=> "May", "y"      => count($mon5dept3)),		
						array("label"=> "June", "y"     => count($mon6dept3)),
						array("label"=> "July", "y"	    => count($mon7dept3)),		
						array("label"=> "August", "y"   => count($mon8dept3)),
						array("label"=> "September", "y"=> count($mon9dept3)),
						array("label"=> "October", "y"  => count($mon10dept3)),
						array("label"=> "November", "y" => count($mon11dept3)),
						array("label"=> "December", "y" => count($mon12dept3))
					);
		    	}
		    ?>
		    <!-- CAFA DEPARTMENT -->
		    <?php
		    	$mon1dept24=$mon2dept24=$mon3dept24=$mon4dept24=$mon5dept24=$mon6dept24=$mon7dept24=$mon8dept24=$mon9dept24=$mon10dept24=$mon11dept24=$mon12dept24=array();
	            $mon1dept25=$mon2dept25=$mon3dept25=$mon4dept25=$mon5dept25=$mon6dept25=$mon7dept25=$mon8dept25=$mon9dept25=$mon10dept25=$mon11dept25=$mon12dept25= array();
	            $mon1dept26=$mon2dept26=$mon3dept26=$mon4dept26=$mon5dept26=$mon6dept26=$mon7dept26=$mon8dept26=$mon9dept26=$mon10dept26=$mon11dept26=$mon12dept26= array();
	            $firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 24
	            		if($dc->department_ID == 24){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 25
	            		if($dc->department_ID == 25){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 26
	            		if($dc->department_ID == 26){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		if($dc->department_ID == 24){
		            		if($dc->mon == 1){
		            			$mon1dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept24[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept24[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 25){
		            		if($dc->mon == 1){
		            			$mon1dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept25[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept25[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 26){
		            		if($dc->mon == 1){
		            			$mon1dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept26[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept26[] = $dc->PR_No;
		            		}	            		
		            	}
		            }
		            $qdept24 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept25 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept26 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
		            $mondept24 = array(
						array("label"=> "January", "y"  => count($mon1dept24)),
						array("label"=> "February", "y" => count($mon2dept24)),
						array("label"=> "March", "y"    => count($mon3dept24)),
						array("label"=> "April", "y"    => count($mon4dept24)),
						array("label"=> "May", "y"      => count($mon5dept24)),		
						array("label"=> "June", "y"     => count($mon6dept24)),
						array("label"=> "July", "y"	    => count($mon7dept24)),		
						array("label"=> "August", "y"   => count($mon8dept24)),
						array("label"=> "September", "y"=> count($mon9dept24)),
						array("label"=> "October", "y"  => count($mon10dept24)),
						array("label"=> "November", "y" => count($mon11dept24)),
						array("label"=> "December", "y" => count($mon12dept24))
					);
					$mondept25 = array(
						array("label"=> "January", "y"  => count($mon1dept25)),
						array("label"=> "February", "y" => count($mon2dept25)),
						array("label"=> "March", "y"    => count($mon3dept25)),
						array("label"=> "April", "y"    => count($mon4dept25)),
						array("label"=> "May", "y"      => count($mon5dept25)),		
						array("label"=> "June", "y"     => count($mon6dept25)),
						array("label"=> "July", "y"	    => count($mon7dept25)),		
						array("label"=> "August", "y"   => count($mon8dept25)),
						array("label"=> "September", "y"=> count($mon9dept25)),
						array("label"=> "October", "y"  => count($mon10dept25)),
						array("label"=> "November", "y" => count($mon11dept25)),
						array("label"=> "December", "y" => count($mon12dept25))
					);
					$mondept26 = array(
						array("label"=> "January", "y"  => count($mon1dept26)),
						array("label"=> "February", "y" => count($mon2dept26)),
						array("label"=> "March", "y"    => count($mon3dept26)),
						array("label"=> "April", "y"    => count($mon4dept26)),
						array("label"=> "May", "y"      => count($mon5dept26)),		
						array("label"=> "June", "y"     => count($mon6dept26)),
						array("label"=> "July", "y"	    => count($mon7dept26)),		
						array("label"=> "August", "y"   => count($mon8dept26)),
						array("label"=> "September", "y"=> count($mon9dept26)),
						array("label"=> "October", "y"  => count($mon10dept26)),
						array("label"=> "November", "y" => count($mon11dept26)),
						array("label"=> "December", "y" => count($mon12dept26))
					);
		    	}
		    ?>
		    <!-- CIE DEPARTMENT -->
		    <?php
		    	$mon1dept20=$mon2dept20=$mon3dept20=$mon4dept20=$mon5dept20=$mon6dept20=$mon7dept20=$mon8dept20=$mon9dept20=$mon10dept20=$mon11dept20=$mon12dept20= array();
				$mon1dept21=$mon2dept21=$mon3dept21=$mon4dept21=$mon5dept21=$mon6dept21=$mon7dept21=$mon8dept21=$mon9dept21=$mon10dept21=$mon11dept21=$mon12dept21= array();
	            $mon1dept22=$mon2dept22=$mon3dept22=$mon4dept22=$mon5dept22=$mon6dept22=$mon7dept22=$mon8dept22=$mon9dept22=$mon10dept22=$mon11dept22=$mon12dept22= array();
	            $mon1dept23=$mon2dept23=$mon3dept23=$mon4dept23=$mon5dept23=$mon6dept23=$mon7dept23=$mon8dept23=$mon9dept23=$mon10dept23=$mon11dept23=$mon12dept23= array();
	            $firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
				$firstQ3 = $secondQ3 = $thirdQ3 = $forthQ3 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 20
	            		if($dc->department_ID == 20){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 21
	            		if($dc->department_ID == 21){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 22
	            		if($dc->department_ID == 22){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 23
	            		if($dc->department_ID == 23){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ3[] = $dc->PR_No;
	            			}
	            		}
	            		if($dc->department_ID == 20){
		            		if($dc->mon == 1){
		            			$mon1dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept20[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept20[] = $dc->PR_No;
		            		}
		            	}
	            		if($dc->department_ID == 21){
		            		if($dc->mon == 1){
		            			$mon1dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept21[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept21[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 22){
		            		if($dc->mon == 1){
		            			$mon1dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept22[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept22[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 23){
		            		if($dc->mon == 1){
		            			$mon1dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept23[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept23[] = $dc->PR_No;
		            		}	            		
		            	}
		            }
		            $qdept20 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept21 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept22 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
					$qdept23 = array(
						array("label"=> "1st Q", "y"  => count($firstQ3)),
						array("label"=> "2nd Q", "y"  => count($secondQ3)),
						array("label"=> "3rd Q", "y"  => count($thirdQ3)),
						array("label"=> "4th Q", "y"  => count($forthQ3))
					);
		            $mondept20 = array(
						array("label"=> "January", "y"  => count($mon1dept20)),
						array("label"=> "February", "y" => count($mon2dept20)),
						array("label"=> "March", "y"    => count($mon3dept20)),
						array("label"=> "April", "y"    => count($mon4dept20)),
						array("label"=> "May", "y"      => count($mon5dept20)),		
						array("label"=> "June", "y"     => count($mon6dept20)),
						array("label"=> "July", "y"	    => count($mon7dept20)),		
						array("label"=> "August", "y"   => count($mon8dept20)),
						array("label"=> "September", "y"=> count($mon9dept20)),
						array("label"=> "October", "y"  => count($mon10dept20)),
						array("label"=> "November", "y" => count($mon11dept20)),
						array("label"=> "December", "y" => count($mon12dept20))
					);
		            $mondept21 = array(
						array("label"=> "January", "y"  => count($mon1dept21)),
						array("label"=> "February", "y" => count($mon2dept21)),
						array("label"=> "March", "y"    => count($mon3dept21)),
						array("label"=> "April", "y"    => count($mon4dept21)),
						array("label"=> "May", "y"      => count($mon5dept21)),		
						array("label"=> "June", "y"     => count($mon6dept21)),
						array("label"=> "July", "y"	    => count($mon7dept21)),		
						array("label"=> "August", "y"   => count($mon8dept21)),
						array("label"=> "September", "y"=> count($mon9dept21)),
						array("label"=> "October", "y"  => count($mon10dept21)),
						array("label"=> "November", "y" => count($mon11dept21)),
						array("label"=> "December", "y" => count($mon12dept21))
					);
					$mondept22 = array(
						array("label"=> "January", "y"  => count($mon1dept22)),
						array("label"=> "February", "y" => count($mon2dept22)),
						array("label"=> "March", "y"    => count($mon3dept22)),
						array("label"=> "April", "y"    => count($mon4dept22)),
						array("label"=> "May", "y"      => count($mon5dept22)),		
						array("label"=> "June", "y"     => count($mon6dept22)),
						array("label"=> "July", "y"	    => count($mon7dept22)),		
						array("label"=> "August", "y"   => count($mon8dept22)),
						array("label"=> "September", "y"=> count($mon9dept22)),
						array("label"=> "October", "y"  => count($mon10dept22)),
						array("label"=> "November", "y" => count($mon11dept22)),
						array("label"=> "December", "y" => count($mon12dept22))
					);
					$mondept23 = array(
						array("label"=> "January", "y"  => count($mon1dept23)),
						array("label"=> "February", "y" => count($mon2dept23)),
						array("label"=> "March", "y"    => count($mon3dept23)),
						array("label"=> "April", "y"    => count($mon4dept23)),
						array("label"=> "May", "y"      => count($mon5dept23)),		
						array("label"=> "June", "y"     => count($mon6dept23)),
						array("label"=> "July", "y"	    => count($mon7dept23)),		
						array("label"=> "August", "y"   => count($mon8dept23)),
						array("label"=> "September", "y"=> count($mon9dept23)),
						array("label"=> "October", "y"  => count($mon10dept23)),
						array("label"=> "November", "y" => count($mon11dept23)),
						array("label"=> "December", "y" => count($mon12dept23))
					);
		    	} 
		    ?>
		    <!-- COE DEPARTMENT -->
		    <?php
		    	$mon1dept8=$mon2dept8=$mon3dept8=$mon4dept8=$mon5dept8=$mon6dept8=$mon7dept8=$mon8dept8=$mon9dept8=$mon10dept8=$mon11dept8=$mon12dept8= array();
				$mon1dept9=$mon2dept9=$mon3dept9=$mon4dept9=$mon5dept9=$mon6dept9=$mon7dept9=$mon8dept9=$mon9dept9=$mon10dept9=$mon11dept9=$mon12dept9= array();
	            $mon1dept10=$mon2dept10=$mon3dept10=$mon4dept10=$mon5dept10=$mon6dept10=$mon7dept10=$mon8dept10=$mon9dept10=$mon10dept10=$mon11dept10=$mon12dept10= array();
	            $mon1dept11=$mon2dept11=$mon3dept11=$mon4dept11=$mon5dept11=$mon6dept11=$mon7dept11=$mon8dept11=$mon9dept11=$mon10dept11=$mon11dept11=$mon12dept11= array();
	           	$firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
				$firstQ3 = $secondQ3 = $thirdQ3 = $forthQ3 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 8
	            		if($dc->department_ID == 8){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 9
	            		if($dc->department_ID == 9){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 10
	            		if($dc->department_ID == 10){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 11
	            		if($dc->department_ID == 11){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ3[] = $dc->PR_No;
	            			}
	            		}
	            		if($dc->department_ID == 8){
		            		if($dc->mon == 1){
		            			$mon1dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept8[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept8[] = $dc->PR_No;
		            		}
		            	}
	            		if($dc->department_ID == 9){
		            		if($dc->mon == 1){
		            			$mon1dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept9[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept9[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 10){
		            		if($dc->mon == 1){
		            			$mon1dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept10[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept10[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 11){
		            		if($dc->mon == 1){
		            			$mon1dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept11[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept11[] = $dc->PR_No;
		            		}	            		
		            	}
		            }
		            $qdept8 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept9 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept10 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
					$qdept11 = array(
						array("label"=> "1st Q", "y"  => count($firstQ3)),
						array("label"=> "2nd Q", "y"  => count($secondQ3)),
						array("label"=> "3rd Q", "y"  => count($thirdQ3)),
						array("label"=> "4th Q", "y"  => count($forthQ3))
					);
		            $mondept8 = array(
						array("label"=> "January", "y"  => count($mon1dept8)),
						array("label"=> "February", "y" => count($mon2dept8)),
						array("label"=> "March", "y"    => count($mon3dept8)),
						array("label"=> "April", "y"    => count($mon4dept8)),
						array("label"=> "May", "y"      => count($mon5dept8)),		
						array("label"=> "June", "y"     => count($mon6dept8)),
						array("label"=> "July", "y"	    => count($mon7dept8)),		
						array("label"=> "August", "y"   => count($mon8dept8)),
						array("label"=> "September", "y"=> count($mon9dept8)),
						array("label"=> "October", "y"  => count($mon10dept8)),
						array("label"=> "November", "y" => count($mon11dept8)),
						array("label"=> "December", "y" => count($mon12dept8))
					);
		            $mondept9 = array(
						array("label"=> "January", "y"  => count($mon1dept9)),
						array("label"=> "February", "y" => count($mon2dept9)),
						array("label"=> "March", "y"    => count($mon3dept9)),
						array("label"=> "April", "y"    => count($mon4dept9)),
						array("label"=> "May", "y"      => count($mon5dept9)),		
						array("label"=> "June", "y"     => count($mon6dept9)),
						array("label"=> "July", "y"	    => count($mon7dept9)),		
						array("label"=> "August", "y"   => count($mon8dept9)),
						array("label"=> "September", "y"=> count($mon9dept9)),
						array("label"=> "October", "y"  => count($mon10dept9)),
						array("label"=> "November", "y" => count($mon11dept9)),
						array("label"=> "December", "y" => count($mon12dept9))
					);
					$mondept10 = array(
						array("label"=> "January", "y"  => count($mon1dept10)),
						array("label"=> "February", "y" => count($mon2dept10)),
						array("label"=> "March", "y"    => count($mon3dept10)),
						array("label"=> "April", "y"    => count($mon4dept10)),
						array("label"=> "May", "y"      => count($mon5dept10)),		
						array("label"=> "June", "y"     => count($mon6dept10)),
						array("label"=> "July", "y"	    => count($mon7dept10)),		
						array("label"=> "August", "y"   => count($mon8dept10)),
						array("label"=> "September", "y"=> count($mon9dept10)),
						array("label"=> "October", "y"  => count($mon10dept10)),
						array("label"=> "November", "y" => count($mon11dept10)),
						array("label"=> "December", "y" => count($mon12dept10))
					);
					$mondept11 = array(
						array("label"=> "January", "y"  => count($mon1dept11)),
						array("label"=> "February", "y" => count($mon2dept11)),
						array("label"=> "March", "y"    => count($mon3dept11)),
						array("label"=> "April", "y"    => count($mon4dept11)),
						array("label"=> "May", "y"      => count($mon5dept11)),		
						array("label"=> "June", "y"     => count($mon6dept11)),
						array("label"=> "July", "y"	    => count($mon7dept11)),		
						array("label"=> "August", "y"   => count($mon8dept11)),
						array("label"=> "September", "y"=> count($mon9dept11)),
						array("label"=> "October", "y"  => count($mon10dept11)),
						array("label"=> "November", "y" => count($mon11dept11)),
						array("label"=> "December", "y" => count($mon12dept11))
					);
		    	} 
		    ?>
		    <!-- CLA DEPARTMENT -->
		    <?php
		    	$mon1dept4=$mon2dept4=$mon3dept4=$mon4dept4=$mon5dept4=$mon6dept4=$mon7dept4=$mon8dept4=$mon9dept4=$mon10dept4=$mon11dept4=$mon12dept4= array();
				$mon1dept5=$mon2dept5=$mon3dept5=$mon4dept5=$mon5dept5=$mon6dept5=$mon7dept5=$mon8dept5=$mon9dept5=$mon10dept5=$mon11dept5=$mon12dept5= array();
	            $mon1dept6=$mon2dept6=$mon3dept6=$mon4dept6=$mon5dept6=$mon6dept6=$mon7dept6=$mon8dept6=$mon9dept6=$mon10dept6=$mon11dept6=$mon12dept6= array();
	            $mon1dept7=$mon2dept7=$mon3dept7=$mon4dept7=$mon5dept7=$mon6dept7=$mon7dept7=$mon8dept7=$mon9dept7=$mon10dept7=$mon11dept7=$mon12dept7= array();
	            $firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
				$firstQ3 = $secondQ3 = $thirdQ3 = $forthQ3 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 4
	            		if($dc->department_ID == 4){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 5
	            		if($dc->department_ID == 5){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 6
	            		if($dc->department_ID == 6){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 7
	            		if($dc->department_ID == 7){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ3[] = $dc->PR_No;
	            			}
	            		}
	            		if($dc->department_ID == 4){
		            		if($dc->mon == 1){
		            			$mon1dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept4[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept4[] = $dc->PR_No;
		            		}
		            	}
	            		if($dc->department_ID == 5){
		            		if($dc->mon == 1){
		            			$mon1dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept5[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept5[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 6){
		            		if($dc->mon == 1){
		            			$mon1dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept6[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept6[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 7){
		            		if($dc->mon == 1){
		            			$mon1dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept7[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept7[] = $dc->PR_No;
		            		}	            		
		            	}
		            }
		            $qdept4 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept5 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept6 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
					$qdept7 = array(
						array("label"=> "1st Q", "y"  => count($firstQ3)),
						array("label"=> "2nd Q", "y"  => count($secondQ3)),
						array("label"=> "3rd Q", "y"  => count($thirdQ3)),
						array("label"=> "4th Q", "y"  => count($forthQ3))
					);
		            $mondept4 = array(
						array("label"=> "January", "y"  => count($mon1dept4)),
						array("label"=> "February", "y" => count($mon2dept4)),
						array("label"=> "March", "y"    => count($mon3dept4)),
						array("label"=> "April", "y"    => count($mon4dept4)),
						array("label"=> "May", "y"      => count($mon5dept4)),		
						array("label"=> "June", "y"     => count($mon6dept4)),
						array("label"=> "July", "y"	    => count($mon7dept4)),		
						array("label"=> "August", "y"   => count($mon8dept4)),
						array("label"=> "September", "y"=> count($mon9dept4)),
						array("label"=> "October", "y"  => count($mon10dept4)),
						array("label"=> "November", "y" => count($mon11dept4)),
						array("label"=> "December", "y" => count($mon12dept4))
					);
		            $mondept5 = array(
						array("label"=> "January", "y"  => count($mon1dept5)),
						array("label"=> "February", "y" => count($mon2dept5)),
						array("label"=> "March", "y"    => count($mon3dept5)),
						array("label"=> "April", "y"    => count($mon4dept5)),
						array("label"=> "May", "y"      => count($mon5dept5)),		
						array("label"=> "June", "y"     => count($mon6dept5)),
						array("label"=> "July", "y"	    => count($mon7dept5)),		
						array("label"=> "August", "y"   => count($mon8dept5)),
						array("label"=> "September", "y"=> count($mon9dept5)),
						array("label"=> "October", "y"  => count($mon10dept5)),
						array("label"=> "November", "y" => count($mon11dept5)),
						array("label"=> "December", "y" => count($mon12dept5))
					);
					$mondept6 = array(
						array("label"=> "January", "y"  => count($mon1dept6)),
						array("label"=> "February", "y" => count($mon2dept6)),
						array("label"=> "March", "y"    => count($mon3dept6)),
						array("label"=> "April", "y"    => count($mon4dept6)),
						array("label"=> "May", "y"      => count($mon5dept6)),		
						array("label"=> "June", "y"     => count($mon6dept6)),
						array("label"=> "July", "y"	    => count($mon7dept6)),		
						array("label"=> "August", "y"   => count($mon8dept6)),
						array("label"=> "September", "y"=> count($mon9dept6)),
						array("label"=> "October", "y"  => count($mon10dept6)),
						array("label"=> "November", "y" => count($mon11dept6)),
						array("label"=> "December", "y" => count($mon12dept6))
					);
					$mondept7 = array(
						array("label"=> "January", "y"  => count($mon1dept7)),
						array("label"=> "February", "y" => count($mon2dept7)),
						array("label"=> "March", "y"    => count($mon3dept7)),
						array("label"=> "April", "y"    => count($mon4dept7)),
						array("label"=> "May", "y"      => count($mon5dept7)),		
						array("label"=> "June", "y"     => count($mon6dept7)),
						array("label"=> "July", "y"	    => count($mon7dept7)),		
						array("label"=> "August", "y"   => count($mon8dept7)),
						array("label"=> "September", "y"=> count($mon9dept7)),
						array("label"=> "October", "y"  => count($mon10dept7)),
						array("label"=> "November", "y" => count($mon11dept7)),
						array("label"=> "December", "y" => count($mon12dept7))
					);
		    	} 
		    ?>
		    <!-- CIT DEPARTMENT -->
		    <?php
		    	$mon1dept12=$mon2dept12=$mon3dept12=$mon4dept12=$mon5dept12=$mon6dept12=$mon7dept12=$mon8dept12=$mon9dept12=$mon10dept12=$mon11dept12=$mon12dept12= array();
				$mon1dept13=$mon2dept13=$mon3dept13=$mon4dept13=$mon5dept13=$mon6dept13=$mon7dept13=$mon8dept13=$mon9dept13=$mon10dept13=$mon11dept13=$mon12dept13= array();
	            $mon1dept14=$mon2dept14=$mon3dept14=$mon4dept14=$mon5dept14=$mon6dept14=$mon7dept14=$mon8dept14=$mon9dept14=$mon10dept14=$mon11dept14=$mon12dept14= array();
	            $mon1dept15=$mon2dept15=$mon3dept15=$mon4dept15=$mon5dept15=$mon6dept15=$mon7dept15=$mon8dept15=$mon9dept15=$mon10dept15=$mon11dept15=$mon12dept15= array();
	            $mon1dept16=$mon2dept16=$mon3dept16=$mon4dept16=$mon5dept16=$mon6dept16=$mon7dept16=$mon8dept16=$mon9dept16=$mon10dept16=$mon11dept16=$mon12dept16= array();
				$mon1dept17=$mon2dept17=$mon3dept17=$mon4dept17=$mon5dept17=$mon6dept17=$mon7dept17=$mon8dept17=$mon9dept17=$mon10dept17=$mon11dept17=$mon12dept17= array();
	            $mon1dept18=$mon2dept18=$mon3dept18=$mon4dept18=$mon5dept18=$mon6dept18=$mon7dept18=$mon8dept18=$mon9dept18=$mon10dept18=$mon11dept18=$mon12dept18= array();
	            $mon1dept19=$mon2dept19=$mon3dept19=$mon4dept19=$mon5dept19=$mon6dept19=$mon7dept19=$mon8dept19=$mon9dept19=$mon10dept19=$mon11dept19=$mon12dept19= array();
				$firstQ = $secondQ = $thirdQ = $forthQ = array();
				$firstQ1 = $secondQ1 = $thirdQ1 = $forthQ1 = array();
				$firstQ2 = $secondQ2 = $thirdQ2 = $forthQ2 = array();
				$firstQ3 = $secondQ3 = $thirdQ3 = $forthQ3 = array();
				$firstQ4 = $secondQ4 = $thirdQ4 = $forthQ4 = array();
				$firstQ5 = $secondQ5 = $thirdQ5 = $forthQ5 = array();
				$firstQ6 = $secondQ6 = $thirdQ6 = $forthQ6 = array();
				$firstQ7 = $secondQ7 = $thirdQ7 = $forthQ7 = array();
	            if($deptcol != NULL){
	            	foreach($deptcol as $dc){
	            		// QUARTERLY OF DEPT 12
	            		if($dc->department_ID == 12){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 13
	            		if($dc->department_ID == 13){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ1[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ1[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 14
	            		if($dc->department_ID == 14){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ2[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ2[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 15
	            		if($dc->department_ID == 15){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ3[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ3[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 16
	            		if($dc->department_ID == 16){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ4[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ4[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ4[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ4[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 17
	            		if($dc->department_ID == 17){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ5[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ5[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ5[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ5[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 18
	            		if($dc->department_ID == 18){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ6[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ6[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ6[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ6[] = $dc->PR_No;
	            			}
	            		}
	            		// QUARTERLY OF DEPT 19
	            		if($dc->department_ID == 19){
	            			if($dc->mon == 1 OR $dc->mon == 2 OR $dc->mon == 3){
	            					$firstQ7[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 4 OR $dc->mon == 5 OR $dc->mon == 6){
	            					$secondQ7[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 7 OR $dc->mon == 8 OR $dc->mon == 9){
	            					$thirdQ7[] = $dc->PR_No;
	            			}
	            			if($dc->mon == 10 OR $dc->mon == 11 OR $dc->mon == 12){
	            					$forthQ7[] = $dc->PR_No;
	            			}
	            		}

	            		if($dc->department_ID == 12){
		            		if($dc->mon == 1){
		            			$mon1dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept12[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept12[] = $dc->PR_No;
		            		}
		            	}
	            		if($dc->department_ID == 13){
		            		if($dc->mon == 1){
		            			$mon1dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept13[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept13[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 14){
		            		if($dc->mon == 1){
		            			$mon1dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept14[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept14[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 15){
		            		if($dc->mon == 1){
		            			$mon1dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept15[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept15[] = $dc->PR_No;
		            		}	            		
		            	}
						if($dc->department_ID == 16){
		            		if($dc->mon == 1){
		            			$mon1dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept16[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept16[] = $dc->PR_No;
		            		}
		            	}
	            		if($dc->department_ID == 17){
		            		if($dc->mon == 1){
		            			$mon1dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept17[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept17[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 18){
		            		if($dc->mon == 1){
		            			$mon1dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept18[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept18[] = $dc->PR_No;
		            		}
		            	}
		            	if($dc->department_ID == 19){
		            		if($dc->mon == 1){
		            			$mon1dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 2){
		            			$mon2dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 3){
		            			$mon3dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 4){
		            			$mon4dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 5){
		            			$mon5dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 6){
		            			$mon6dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 7){
		            			$mon7dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 8){
		            			$mon8dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 9){
		            			$mon9dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 10){
		            			$mon10dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 11){
		            			$mon11dept19[] = $dc->PR_No;
		            		}
		            		if($dc->mon == 12){
		            			$mon12dept19[] = $dc->PR_No;
		            		}	            		
		            	}
		            }

		            $qdept16 = array(
						array("label"=> "1st Q", "y"  => count($firstQ4)),
						array("label"=> "2nd Q", "y"  => count($secondQ4)),
						array("label"=> "3rd Q", "y"  => count($thirdQ4)),
						array("label"=> "4th Q", "y"  => count($forthQ4))
					);
					$qdept17 = array(
						array("label"=> "1st Q", "y"  => count($firstQ5)),
						array("label"=> "2nd Q", "y"  => count($secondQ5)),
						array("label"=> "3rd Q", "y"  => count($thirdQ5)),
						array("label"=> "4th Q", "y"  => count($forthQ5))
					);
					$qdept18 = array(
						array("label"=> "1st Q", "y"  => count($firstQ6)),
						array("label"=> "2nd Q", "y"  => count($secondQ6)),
						array("label"=> "3rd Q", "y"  => count($thirdQ6)),
						array("label"=> "4th Q", "y"  => count($forthQ6))
					);
					$qdept19 = array(
						array("label"=> "1st Q", "y"  => count($firstQ7)),
						array("label"=> "2nd Q", "y"  => count($secondQ7)),
						array("label"=> "3rd Q", "y"  => count($thirdQ7)),
						array("label"=> "4th Q", "y"  => count($forthQ7))
					);
					$qdept12 = array(
						array("label"=> "1st Q", "y"  => count($firstQ)),
						array("label"=> "2nd Q", "y"  => count($secondQ)),
						array("label"=> "3rd Q", "y"  => count($thirdQ)),
						array("label"=> "4th Q", "y"  => count($forthQ))
					);
					$qdept13 = array(
						array("label"=> "1st Q", "y"  => count($firstQ1)),
						array("label"=> "2nd Q", "y"  => count($secondQ1)),
						array("label"=> "3rd Q", "y"  => count($thirdQ1)),
						array("label"=> "4th Q", "y"  => count($forthQ1))
					);
					$qdept14 = array(
						array("label"=> "1st Q", "y"  => count($firstQ2)),
						array("label"=> "2nd Q", "y"  => count($secondQ2)),
						array("label"=> "3rd Q", "y"  => count($thirdQ2)),
						array("label"=> "4th Q", "y"  => count($forthQ2))
					);
					$qdept15 = array(
						array("label"=> "1st Q", "y"  => count($firstQ3)),
						array("label"=> "2nd Q", "y"  => count($secondQ3)),
						array("label"=> "3rd Q", "y"  => count($thirdQ3)),
						array("label"=> "4th Q", "y"  => count($forthQ3))
					);
		            ###############################################################################################################
		            $mondept16 = array(
						array("label"=> "January", "y"  => count($mon1dept16)),
						array("label"=> "February", "y" => count($mon2dept16)),
						array("label"=> "March", "y"    => count($mon3dept16)),
						array("label"=> "April", "y"    => count($mon4dept16)),
						array("label"=> "May", "y"      => count($mon5dept16)),		
						array("label"=> "June", "y"     => count($mon6dept16)),
						array("label"=> "July", "y"	    => count($mon7dept16)),		
						array("label"=> "August", "y"   => count($mon8dept16)),
						array("label"=> "September", "y"=> count($mon9dept16)),
						array("label"=> "October", "y"  => count($mon10dept16)),
						array("label"=> "November", "y" => count($mon11dept16)),
						array("label"=> "December", "y" => count($mon12dept16))
					);
		            $mondept17 = array(
						array("label"=> "January", "y"  => count($mon1dept17)),
						array("label"=> "February", "y" => count($mon2dept17)),
						array("label"=> "March", "y"    => count($mon3dept17)),
						array("label"=> "April", "y"    => count($mon4dept17)),
						array("label"=> "May", "y"      => count($mon5dept17)),		
						array("label"=> "June", "y"     => count($mon6dept17)),
						array("label"=> "July", "y"	    => count($mon7dept17)),		
						array("label"=> "August", "y"   => count($mon8dept17)),
						array("label"=> "September", "y"=> count($mon9dept17)),
						array("label"=> "October", "y"  => count($mon10dept17)),
						array("label"=> "November", "y" => count($mon11dept17)),
						array("label"=> "December", "y" => count($mon12dept17))
					);
					$mondept18 = array(
						array("label"=> "January", "y"  => count($mon1dept18)),
						array("label"=> "February", "y" => count($mon2dept18)),
						array("label"=> "March", "y"    => count($mon3dept18)),
						array("label"=> "April", "y"    => count($mon4dept18)),
						array("label"=> "May", "y"      => count($mon5dept18)),		
						array("label"=> "June", "y"     => count($mon6dept18)),
						array("label"=> "July", "y"	    => count($mon7dept18)),		
						array("label"=> "August", "y"   => count($mon8dept18)),
						array("label"=> "September", "y"=> count($mon9dept18)),
						array("label"=> "October", "y"  => count($mon10dept18)),
						array("label"=> "November", "y" => count($mon11dept18)),
						array("label"=> "December", "y" => count($mon12dept18))
					);
					$mondept19 = array(
						array("label"=> "January", "y"  => count($mon1dept19)),
						array("label"=> "February", "y" => count($mon2dept19)),
						array("label"=> "March", "y"    => count($mon3dept19)),
						array("label"=> "April", "y"    => count($mon4dept19)),
						array("label"=> "May", "y"      => count($mon5dept19)),		
						array("label"=> "June", "y"     => count($mon6dept19)),
						array("label"=> "July", "y"	    => count($mon7dept19)),		
						array("label"=> "August", "y"   => count($mon8dept19)),
						array("label"=> "September", "y"=> count($mon9dept19)),
						array("label"=> "October", "y"  => count($mon10dept19)),
						array("label"=> "November", "y" => count($mon11dept19)),
						array("label"=> "December", "y" => count($mon12dept19))
					);
					 $mondept12 = array(
						array("label"=> "January", "y"  => count($mon1dept12)),
						array("label"=> "February", "y" => count($mon2dept12)),
						array("label"=> "March", "y"    => count($mon3dept12)),
						array("label"=> "April", "y"    => count($mon4dept12)),
						array("label"=> "May", "y"      => count($mon5dept12)),		
						array("label"=> "June", "y"     => count($mon6dept12)),
						array("label"=> "July", "y"	    => count($mon7dept12)),		
						array("label"=> "August", "y"   => count($mon8dept12)),
						array("label"=> "September", "y"=> count($mon9dept12)),
						array("label"=> "October", "y"  => count($mon10dept12)),
						array("label"=> "November", "y" => count($mon11dept12)),
						array("label"=> "December", "y" => count($mon12dept12))
					);
		            $mondept13 = array(
						array("label"=> "January", "y"  => count($mon1dept13)),
						array("label"=> "February", "y" => count($mon2dept13)),
						array("label"=> "March", "y"    => count($mon3dept13)),
						array("label"=> "April", "y"    => count($mon4dept13)),
						array("label"=> "May", "y"      => count($mon5dept13)),		
						array("label"=> "June", "y"     => count($mon6dept13)),
						array("label"=> "July", "y"	    => count($mon7dept13)),		
						array("label"=> "August", "y"   => count($mon8dept13)),
						array("label"=> "September", "y"=> count($mon9dept13)),
						array("label"=> "October", "y"  => count($mon10dept13)),
						array("label"=> "November", "y" => count($mon11dept13)),
						array("label"=> "December", "y" => count($mon12dept13))
					);
					$mondept14 = array(
						array("label"=> "January", "y"  => count($mon1dept14)),
						array("label"=> "February", "y" => count($mon2dept14)),
						array("label"=> "March", "y"    => count($mon3dept14)),
						array("label"=> "April", "y"    => count($mon4dept14)),
						array("label"=> "May", "y"      => count($mon5dept14)),		
						array("label"=> "June", "y"     => count($mon6dept14)),
						array("label"=> "July", "y"	    => count($mon7dept14)),		
						array("label"=> "August", "y"   => count($mon8dept14)),
						array("label"=> "September", "y"=> count($mon9dept14)),
						array("label"=> "October", "y"  => count($mon10dept14)),
						array("label"=> "November", "y" => count($mon11dept14)),
						array("label"=> "December", "y" => count($mon12dept14))
					);
					$mondept15 = array(
						array("label"=> "January", "y"  => count($mon1dept15)),
						array("label"=> "February", "y" => count($mon2dept15)),
						array("label"=> "March", "y"    => count($mon3dept15)),
						array("label"=> "April", "y"    => count($mon4dept15)),
						array("label"=> "May", "y"      => count($mon5dept15)),		
						array("label"=> "June", "y"     => count($mon6dept15)),
						array("label"=> "July", "y"	    => count($mon7dept15)),		
						array("label"=> "August", "y"   => count($mon8dept15)),
						array("label"=> "September", "y"=> count($mon9dept15)),
						array("label"=> "October", "y"  => count($mon10dept15)),
						array("label"=> "November", "y" => count($mon11dept15)),
						array("label"=> "December", "y" => count($mon12dept15))
					);
		    	} 
		    ?>

<script type="text/javascript">
	window.onload = function () {	 
		var chart = new CanvasJS.Chart("chartContainer", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR Report"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var chart2 = new CanvasJS.Chart("chartContainer2", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR Report"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
			}]
		});
		var chart3 = new CanvasJS.Chart("chartContainer3", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Per department"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var chart4 = new CanvasJS.Chart("chartContainer4", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Per college"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
			}]
		});
		// montly report of all colleges
		var chart5 = new CanvasJS.Chart("MCollege", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of COLLEGES(6)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "COS",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol1, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "CLA",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol2, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "CIE",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol3, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "CIE",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol4, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "CIE",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol5, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "CIE",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($moncol6, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// monthly report of all department in COS
		var COSdept = new CanvasJS.Chart("MCOS", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of COS DEPARTMENTS(3)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Math",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept1, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Physics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept2, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Chemistry",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept3, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// monthly report of all department in CAFA
		var CAFAdept = new CanvasJS.Chart("MCAFA", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of CAFA DEPARTMENTS(3)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Fine Arts",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept24, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Graphics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept25, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Architecture",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept26, JSON_NUMERIC_CHECK); ?>
			}]
		});
		// monthly report of all department in CIE
		var CIEdept = new CanvasJS.Chart("MCIE", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of CIE DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Technical Arts",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept20, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Home Economics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept21, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Prof Industrial Educ",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept22, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Student Teaching",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept24, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// monthly report of all department in COE
		var COEdept = new CanvasJS.Chart("MCOE", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of COE DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Mechanical Eng.",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept8, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electrical Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept9, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Civil Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept10, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electronics Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept11, JSON_NUMERIC_CHECK); ?>
			}]
		});
		// monthly report of all department in CLA
		var CLAdept = new CanvasJS.Chart("MCLA", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of CLA DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Social Science",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept4, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "English",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept5, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Filipino",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept6, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Physical Ed",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept7, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// monthly report of all department in CIT
		var CITdept = new CanvasJS.Chart("MCIT", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly PR of CIT DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Civil Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept12, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electrical Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept13, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electronics Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept14, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Food & Apparel Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept15, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Graphic Arts & Printing Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept16, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Mechanical Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept17, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Power Plant Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept18, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Basic Industrial Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($mondept19, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in CLA
		var CLAdeptQ = new CanvasJS.Chart("QCLA", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of CLA DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Social Science",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept4, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "English",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept5, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Filipino",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept6, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Physical Ed",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept7, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in CIT
		var CITdeptQ = new CanvasJS.Chart("QCIT", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of CIT DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Civil Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept12, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electrical Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept13, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electronics Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept14, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Food & Apparel Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept15, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Graphic Arts & Printing Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept16, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Mechanical Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept17, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Power Plant Eng Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept18, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Basic Industrial Tech",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept19, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in COE
		var COEdeptQ = new CanvasJS.Chart("QCOE", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of COE DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Mechanical Eng.",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept8, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electrical Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept9, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Civil Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept10, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Electronics Eng",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept11, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in CIE
		var CIEdeptQ = new CanvasJS.Chart("QCIE", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of CIE DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Technical Arts",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept20, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Home Economics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept21, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Prof Industrial Educ",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept22, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Student Teaching",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept24, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in CAFA
		var CAFAdeptQ = new CanvasJS.Chart("QCAFA", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of CAFA DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Fine Arts",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept24, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Graphics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept25, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Architecture",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept26, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		// quarterly report of all department in COS
		var COSdeptQ = new CanvasJS.Chart("QCOS", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly PR of COS DEPARTMENTS(4)"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Math",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept1, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Physics",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept2, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Chemistry",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($qdept3, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var allMode = new CanvasJS.Chart("allmode", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "FOR NP AND SVP"
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "Small Value Procurement",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($svpcount, JSON_NUMERIC_CHECK); ?>
			},{
				type: "column",
				name: "Negotiated Procurement",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($npcount, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var svpmon = new CanvasJS.Chart("svpM", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly Small Value procurement PR Report "
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($svpmon, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var svpQ = new CanvasJS.Chart("svpQ", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly Small Value procurement PR Report "
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($svpQ, JSON_NUMERIC_CHECK); ?>
			}]
		});
		var npmon = new CanvasJS.Chart("npM", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Monthly Negotiated procurement PR Report "
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($npmon, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		var npQ = new CanvasJS.Chart("npQ", {
			animationEnabled: true,
			theme: "light2",
			title:{
				text: "Quarterly Negotiated procurement PR Report "
			},
			legend:{
				cursor: "pointer",
				verticalAlign: "center",
				horizontalAlign: "right",
				itemclick: toggleDataSeries
			},
			data: [{
				type: "column",
				name: "All Submitted PR",
				indexLabel: "{y}",
				yValueFormatString: "#",
				showInLegend: true,
				dataPoints: <?php echo json_encode($npQ, JSON_NUMERIC_CHECK); ?>
			}]
		});	
		chart.render();	 
		chart2.render();	 
		chart3.render();	 
		chart4.render();	 
		chart5.render();	 
		COSdept.render();	 
		CAFAdept.render();	 
		CIEdept.render();	 
		COEdept.render();	 
		CLAdept.render();	 
		CITdept.render();	 
		COSdeptQ.render();	 
		CAFAdeptQ.render();	 
		CIEdeptQ.render();	 
		COEdeptQ.render();	 
		CLAdeptQ.render();	 
		CITdeptQ.render();	 
		svpmon.render();	
		svpQ.render();	 
		npmon.render();	 
		npQ.render();	 
		allMode.render();
		var canvas = $("#npQ .canvasjs-chart-canvas").get(0);
		var dataURL = canvas.toDataURL();
		//console.log(dataURL);

		$("#exportButton").click(function(){
		    var pdf = new jsPDF();
		    pdf.addImage(dataURL, 'JPEG', 0, 0);
		    pdf.save("download.pdf");
		});	 
		function toggleDataSeries(e){
			if (typeof(e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
				e.dataSeries.visible = false;
			}
			else{
				e.dataSeries.visible = true;
			}
			chart.render();
		}	 
	}
</script>
<div class = "row">
	<div class="col-lg-6">
		<div id="chartContainer" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="chartContainer2" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="chartContainer3" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="chartContainer4" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-12">
		<div id="MCollege" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="MCOS" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="QCOS" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="MCAFA" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="QCAFA" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="MCOE" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="QCOE" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="MCLA" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="QCLA" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="MCIE" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="QCIE" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-12">
		<div id="MCIT" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-12">
		<div id="QCIT" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="allmode" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="svpM" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="svpQ" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<br>
<div class = "row">
	<div class="col-lg-6">
		<div id="npM" style="height: 370px; width: 100%;"></div>
	</div>
	<div class="col-lg-6">
		<div id="npQ" style="height: 370px; width: 100%;"></div>
	</div>
</div>
<div class="icon-button-demo m-t-15 m-b-25 align-center noprint">
    <button type="button" class="btn bg-red btn-circle-lg waves-effect waves-circle waves-float" onclick="window.print();">
      	<i class="material-icons">print</i>
    </button>
</div>
</body>
<script src="<?php echo base_url('assets/js/chart.js');?>"></script>
<script src="<?php echo base_url('assets/js/jspdf.min.js');?>"></script>