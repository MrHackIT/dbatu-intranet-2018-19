<?php 
	require 'db.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM info_doc WHERE discipline='PETROCHEMICAL' ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'id' => $rowList['id'],
                                'roll_no' => $rowList['roll_no'],
 	 		 	 				'cet_score'=> $rowList['cet_score'],
	 		 	 				'cet_composite'=> $rowList['cet_composite'],
                                'jee_score'=> $rowList['jee_score'],
                                'jee_compo_score'=> $rowList['jee_compo_score'],
                                'state_rank'=> $rowList['state_rank'],
                                'discipline'=> $rowList['discipline'],
                                'year'=> $rowList['year'],
                                'score_10'=> $rowList['score_10'],
                                'score_12'=> $rowList['score_12'],
                                'first_y_marks'=> $rowList['first_y_marks'],
                                'sec_y_marks'=> $rowList['sec_y_marks'],
                                'thi_y_marks'=> $rowList['thi_y_marks'],
                                'fi_y_mark'=> $rowList['fi_y_mark'],
                                'passing_10'=> $rowList['passing_10'],
                                'passing_12'=> $rowList['passing_12'],
                                'passing_first'=> $rowList['passing_first'],
                                'passing_sec'=> $rowList['passing_sec'],
                                'passing_third'=> $rowList['passing_third'],
                                'passing_fourth'=> $rowList['passing_fourth'],
                                'pass_university_10'=> $rowList['pass_university_10'],
                                'pass_university_12'=> $rowList['pass_university_12'],
                            
                                'pass_university_fy'=> $rowList['pass_university_fy'],
                                'pass_university_sec'=> $rowList['pass_university_sec'],
                                'pass_university_thi'=> $rowList['pass_university_thi'],
                                'pass_university_for'=> $rowList['pass_university_for'],
                            
                                'prof_skills'=> $rowList['prof_skills'],
                                'extra_cu_skills'=> $rowList['extra_cu_skills'],
                                'work_intern'=> $rowList['work_intern'],
                                'other_acti'=> $rowList['other_acti']
                             
 	 		 	 			);


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 