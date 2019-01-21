<?php 
	require 'db.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM personal_details WHERE discipline='ELECTRICAL' ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'id' => $rowList['id'],
                                'roll_no'=> $rowList['roll_no'],
                                'discipline'=> $rowList['discipline'],
 	 		 	 				'full_name'=> $rowList['full_name'],
                                'gender'=> $rowList['gender'],
                                'dob'=> $rowList['dob'],
                                'contact_no'=> $rowList['contact_no'],
                                'email'=> $rowList['email'],
                                'blood_group'=> $rowList['blood_group'],
                                'category'=> $rowList['category'],
                                'mname'=> $rowList['mname'],
                                'fname'=> $rowList['fname'],
                                'guardian_email'=> $rowList['guardian_email'],
                                'guardian_contact'=> $rowList['guardian_contact'],
                                'address'=> $rowList['address'],
                                'time_stamp'=> $rowList['time_stamp'],
                                
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 