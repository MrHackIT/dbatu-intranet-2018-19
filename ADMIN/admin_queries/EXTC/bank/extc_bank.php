<?php 
	require 'db.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM bank_info_doc WHERE discipline='EXTC'")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'id' => $rowList['id'],
                                'roll_no'=> $rowList['roll_no'],
                                'discipline'=> $rowList['discipline'],
 	 		 	 				'bank_name'=> $rowList['bank_name'],
                                'acc_no'=> $rowList['acc_no'],
	 		 	 				'branch_ifsc'=> $rowList['branch_ifsc'],
                                'branch_name'=> $rowList['branch_name'],
                                'adhar_no'=> $rowList['adhar_no'],
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 