<?php
class Data{
    //update, remove,or return data from the table.
    public function return_team_id(){
		/*
		 * Get the team ID from the database and return it
		 * 
		 **/
		$getid = mysql_query("SELECT * FROM `team` WHERE `username` = '$name'") or die (mysql_error()); //Gets user ID query
		while($getname= mysql_fetch_array($getid)){		//Picks out user ID
			$id= $getname['id'];
			$team_name=$getname['name'];		
		}	
		
    }
    public function team_options(){
        global $dbh;
        $html = '';
        $sql = "SELECT * FROM `team` ORDER BY `name` ASC";
        $query = $dbh->query($sql);
        foreach($query->fetchAll() as $row){
            $html .= '<option value='.$row['id'].'>'.$row['name'].'</option>';
        }
        return $html;
        
    }
    public function set_paid($team_id){
        $sql="UPDATE `beds` SET  `paid` =  '1' WHERE  `team_id` =?";
        
    }
    public function insert_rooming($id,$first,$last,$gender,$arrive,$depart,$linens,$occ,$disabled,$role){
    	global $dbh;
    	$sql = "INSERT INTO `beds` (`id`, `team_id`, `first`, `last`, `gender`, `arrive`, `depart`, `linens`, `occ`, `disability`, `role`, `date`)
    	 VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, CURRENT_TIMESTAMP);";
    	 $insert=$dbh->prepare($sql);
    	 $insert->execute(array($id,$first,$last,$gender,$arrive,$depart,$linens,$occ,$disabled,$role));
		
    }
    public function drop_room_reserve($id){
		/*
		 * Function to remove a row of data from the displayed table
		 * $id is the id of the table row NOT the id of the team.
		 **/
		global $dbh;
		$sql = "DELETE FROM `beds` WHERE `id`=? LIMIT 1";
		$go=$dbh->prepare($sql);
		$go->execute(array($id));
	}
	public function return_table($team_id){
			global $dbh;
			$get_beds="SELECT * FROM `beds` WHERE `team_id`=?";
			$query_beds = $dbh->prepare($get_beds);
			$query_beds->execute(array($team_id));
			$total_cost=0;
			$max_cost=0;
			$payment_type=0;
			$paid=0;
			$html='';
			foreach($query_beds->fetchAll() as $row){
				$linens=false;
				$num_nights = 0;
				$payment_type = $row['type'];
				$paid = $row['paid'];
				$rid = $row['id'];
                                
				if($paid==1){
					$paid=true;
					$to_add=false;
				}else{
					$paid=false;
					$to_add=true;
				}
                                
				if($row['linens']==0){
				    $lines='No Linens';
				}else{
                                    $lines = 'Linens';
                                    $linens=true;
			    	}
                                
				if($row['occ']==1){
                                    $occ="Single";
				}else if($row['occ']==2){
				    $occ="Double";
				}else{
				    $occ="Double";
				}
                                
				$st=$row['arrive'];
				$en=$row['depart'];
				$num_nights=$en-$st;
				$multiplier=1;
				if($row['occ']==1){ //if occupancy is recorded as single
				    $multiplier=2;
				}
				if($linens){
                                    if($to_add){
				    	$total_cost+=($num_nights*36)*$multiplier;
					$max_cost+=($num_nights*36)*$multiplier;
				    }else{
					$max_cost+=($num_nights*36)*$multiplier;
				    }
				}else{
                                    if($to_add){
					$total_cost+=($num_nights*31)*$multiplier;
				    	$max_cost+=($num_nights*36)*$multiplier;
				    }else{
					$max_cost+=($num_nights*36)*$multiplier;
				    }
				}
					
                        $html.='<tr><td class="editname" id='.$rid.'>'.$row['first'].' '.$row['last'].'</td><td class="editgender" id='.$rid.'>'.$row['gender'].'</td>
                                <td class="editarrive" id='.$rid.'>'.$row['arrive'].'</td><td class="editdepart" id='.$rid.'>'.$row['depart'].'</td>
				<td class="editlinens" id='.$rid.'>'.$lines.'</td><td class="editdis" id='.$rid.'>'.$row['disability'].'</td>
				<td class="editocc" id='.$rid.'>'.$occ.'</td><td class="editrole" id='.$rid.'>'.$row['role'].'</td>';
				
                                if(!$paid){
					$html.='<td><input type="checkbox" value="'.$row['id'].'" name="dropping[]"/></td></tr>';
				}else{
				    $html.='<td>Paid for</td></tr>';
				}	
                        }
                $html.='<input type="hidden" value="'.$id.'" name="id"/></form></table>';
		return $html;
	}
        function draw_all_data($team){
	$cost=31;		
	$team_id=$team;
	/*echo '<h2>School Information</h2>';
	$get_username="SELECT * FROM `team` WHERE `id`='$team_id'";
	$getname=mysql_query($get_username)or die(mysql_error());
	while($row = mysql_fetch_array($getname)){
		$team_num=$row['username'];
		}
	$get_school="SELECT * FROM mckeem1_NSO2014.`TeamConfirmAttendance` WHERE `TeamNumber`='$team_num'";
	$go_get_sch=mysql_query($get_school)or die(mysql_error());
	
	while($row = mysql_fetch_array($go_get_sch)){
		echo $row['SchoolName'].'<br/>';
		echo $row['Address'].'<br/>';
		echo $row['City'].' '.$row['State'].' '.$row['Zip'];
		
	}
	echo '<h2>Dorm Reservation List</h2>';*/

	
        $get_beds="SELECT * FROM `beds` WHERE `team_id`=?";
	$query_beds = $dbh->prepare($get_beds);
	$query_beds->execute(array($team_id));  
	$total_cost=0;
	$max_cost=0;
	$payment_type=0;
	$paid=0;
	foreach($query_beds->fetchAll() as $row){
	$linens=false;
	$num_nights=0;
	$payment_type=$row['type'];
	$paid=$row['paid'];
	if($payment_type==1){
		$payment_type="Invoice";
		}else{
			$payment_type="Paypal";
			}
	if($paid==1){
		$paid='Yes';
		$to_add=false;
		}else{
		$paid='No';
		$to_add=true;
		}
		if($row['linens']==0){
			$lines='No Linens';
		}else{
			$lines = 'Linens';
			$linens=true;
		}
		if($row['occ']==1){
			$occ="Single";
		}else if($row['occ']==2){
			$occ="Double";
		}else{
			$occ="Double";
		}
		$st=$row['arrive'];
		$en=$row['depart'];
		$num_nights=$en-$st;
		//set multiplier based on occupancy, cost doubles for single
		$multiplier=1;
		if($row['occ']==1){ //if occupancy is recorded as single
			$multiplier=2;
		}
		if($linens){
			$rate=36;
		}else{
			$rate=31;
		}
				$cost=($num_nights*$rate)*$multiplier;
				if($to_add){
					$total_cost+=($num_nights*$rate)*$multiplier;
					$max_cost+=($num_nights*$rate)*$multiplier;
				}else{
					$max_cost+=($num_nights*$rate)*$multiplier;
				}
		$html .= '<tr><td>'.$row['first'].' '.$row['last'].'</td><td>'.$row['gender'].'</td><td>'.$row['arrive'].'</td><td>'.$row['depart'].'</td><td>'.$lines.'</td><td>'.$row['disability'].'</td><td>'.$occ.'</td><td>'.$row['role'].'</td><td>'.$row['date'].'</td><td><input type="checkbox" value="'.$row['id'].'" name="dropping[]"/></td><td>'.$paid.'</td></tr>';
		
		
		
	}
	$html .= '<input type="hidden" value="'.$team_id.'" name="id"/><input type="submit" value="Drop" name="drop"/></form></table>';
	$html .= '<br>';
	$html .= '<table width="700px" border="0">
        <tr>
          <td align=left width="200px"><h2>Type: '.$payment_type.'</h2></td>
          
          <td align=left><h2>Total Amount Due: $'.$total_cost.'</h2></td>
          <td align=left><h2>Grand Total: $'.$max_cost.'</h2></td>
        </tr>
      </table> ';
      return $html;
        }
        
}
class Display {
    //Diplay the data on the page, using returns from the Data Class
    public function display_page($page_title){
		$final_page='templates/template_';
		$final_page.=$page_title;
		$final_page.='.php';
		include($final_page);
	}
    public function display_table($id){
		$data= new Data;
		$html= $data->return_table($id)
		echo $html;
	}
    public function call_drop($id){
    	$data = new Data;
    	$data->drop_room_reserve($id);
    }
    public function return_team_options(){
        $data= new Data;
        $html='';
        $html.=$data->team_options();
        echo $html;
        
    }
}


?>
