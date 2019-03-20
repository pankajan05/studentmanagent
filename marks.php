
<?php include_once 'header.php'; ?>


<div class="main-wrapper">
	<h1>Marks</h1>
</div>




  <?php
    $i=0;
include_once 'include/db.inc.php';
    
//create a table and insert the default value -1
if(isset($_POST['tbname'])){
	$tname = mysqli_real_escape_string($con,$_POST['tname']);

	if(empty($tname)){
		header("Location:enter.php?tablename=empty");
		exit();
	}else{
		$query_select = "SHOW TABLES LIKE '$tname'";
		$run_query = mysqli_query($con, $query_select);
		$resultcheck = mysqli_num_rows($run_query);

				if($resultcheck > 0){
					
				}else{
					$sql = "CREATE TABLE $tname ( student_id VARCHAR(11) NOT NULL , science INT NOT NULL DEFAULT -1 , maths INT NOT NULL DEFAULT -1 , tamil INT NOT NULL DEFAULT -1 , english INT NOT NULL DEFAULT -1 , history INT NOT NULL DEFAULT -1 , religion INT NOT NULL DEFAULT -1 , group1 INT NOT NULL DEFAULT -1 , group2 INT NOT NULL DEFAULT -1 , group3 INT NOT NULL DEFAULT -1,foreign key(student_id) references student_detail on delete cascade on update cascade)";
					mysqli_query($con,$sql);
                    
                    $sql1="SELECT * FROM student_detail";
                    $re=mysqli_query($con,$sql1);
                    
                    while($res = mysqli_fetch_assoc($re) ){
                    $sql = "INSERT INTO $tname(student_id) VALUES ('$res[student_id]')";
                    mysqli_query($con,$sql);
                    
                }
                    
                
            }
		}

	

}else
    //show a editable table 
if(isset($_POST['stbname'])){
	$stname = mysqli_real_escape_string($con,$_POST['stname']);
   $_SESSION['table']=$stname ;
	if(empty($stname)){
		header("Location:enter.php?tablename=empty");
		exit();
	}else{
		$query_select = "SHOW TABLES LIKE '$stname'";
		$run_query = mysqli_query($con, $query_select);
		$resultcheck = mysqli_num_rows($run_query);

				if($resultcheck <= 0){
					header("Location:enter.php?tablenamenotexist");
					exit();
				}else{
					

					echo"<div class=\"tab\"><h6>Student marks from ".$stname." Table</h6>
                    <form class=\"ged\" action=\"marks.php\" method=\"post\">
					<table class="."stutable".">
		<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
                    
        $sql = "SELECT * FROM $stname";       
        $result1 = mysqli_query($con,$sql);
                    
        $big = array(
                array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0)
                );
        $small = array(
                array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100)
                    );
        $total= array(0,0,0,0,0,0,0,0,0);
                  
        while($result = mysqli_fetch_assoc($result1)) {
			
		 echo"<tr>
                    <td><input type=\"text\"  name=\"student_id$i\" value=\"";
            echo $result['student_id'];
            
            echo "\"></td>
                    
                    
					<td><input type=\"text\"  name=\"science$i\" value=\"";
            echo $result['science'];
                    if($result['science'] > $big[0][1]){
                            $big[0][1] = $result['science'];
                            $big[0][0] = $result['student_id'];
                        }
                    if($result['science'] < $small[0][1]){
                            $small[0][1] = $result['science'];
                            $small[0][0] = $result['student_id'];
                        }
                    $total[0] += $result['science'];
            echo"\"></td>
            
            
					<td><input type=\"text\" name=\"maths$i\" value=";
            echo $result['maths'];
                    if($result['maths'] > $big[1][1]){
                            $big[1][1] = $result['maths'];
                            $big[1][0] = $result['student_id'];
                        }
                    if($result['maths'] < $small[1][1]){
                            $small[1][1] = $result['maths'];
                            $small[1][0] = $result['student_id'];
                        }
                    $total[1] += $result['maths'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"tamil$i\" value=";
            echo $result['tamil'];
                    if($result['tamil'] > $big[2][1]){
                            $big[2][1] = $result['tamil'];
                            $big[2][0] = $result['student_id'];
                        }
                    if($result['tamil'] < $small[2][1]){
                            $small[2][1] = $result['tamil'];
                            $small[2][0] = $result['student_id'];
                        }
                    $total[2] +=$result['tamil'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"english$i\" value=";
            echo $result['english'];
                    if($result['english'] > $big[3][1]){
                            $big[3][1] = $result['english'];
                            $big[3][0] = $result['student_id'];
                        }
                    if($result['english'] < $small[3][1]){
                            $small[3][1] = $result['english'];
                            $small[3][0] = $result['student_id'];
                        }
                        $total[3] +=$result['english'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"history$i\" value=";
            echo $result['history'];
                    if($result['history'] > $big[4][1]){
                            $big[4][1] = $result['history'];
                            $big[4][0] = $result['student_id'];
                        }
                    if($result['history'] < $small[4][1]){
                            $small[4][1] = $result['history'];
                            $small[4][0] = $result['student_id'];
                        }
                        $total[4] += $result['history'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"religion$i\" value=";
            echo $result['religion'];
                    if($result['religion'] > $big[5][1]){
                            $big[5][1] = $result['religion'];
                            $big[5][0] = $result['student_id'];
                        }
                    if($result['religion'] < $small[5][1]){
                            $small[5][1] = $result['religion'];
                            $small[5][0] = $result['student_id'];
                        }
                        $total[5] +=$result['religion'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"group1$i\" value=";
            echo $result['group1'];
                    if($result['group1'] > $big[6][1]){
                            $big[6][1] = $result['group1'];
                            $big[6][0] = $result['student_id'];
                        }
                    if($result['group1'] < $small[6][1]){
                            $small[6][1] = $result['group1'];
                            $small[6][0] = $result['student_id'];
                        }
                        $total[6] += $result['group1'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"group2$i\" value=";
            echo $result['group2'];
                    if($result['group2'] > $big[7][1]){
                            $big[7][1] = $result['group2'];
                            $big[7][0] = $result['student_id'];
                        }
                    if($result['group2'] < $small[7][1]){
                            $small[7][1] = $result['group2'];
                            $small[7][0] = $result['student_id'];
                        }
                        $total[7] += $result['group2'];
            echo"></td>
            
            
					<td><input type=\"text\" name=\"group3$i\" value=";
            echo $result['group3'];
                    if($result['group3'] > $big[8][1]){
                            $big[8][1] = $result['group3'];
                            $big[8][0] = $result['student_id'];
                        }
                    if($result['group3'] < $small[8][1]){
                            $small[8][1] = $result['group3'];
                            $small[8][0] = $result['student_id'];
                        }
                        $total[8] += $result['group3'];
            echo"></td>
            
            
                    <td><button type=\"submit\" name=\"update$i\">Update</button></td>
                    
				</tr>";
            
            if(isset($_POST['update'.$i.''])){
               
                $student_id=$_POST["student_id".$i.''];
                $science=(int)$_POST["science".$i.''];
                $maths=(int)$_POST["maths".$i.''];
                $tamil=(int)$_POST["tamil".$i.''];
                $english=(int)$_POST["english".$i.''];
                $history=(int)$_POST["history".$i.''];
                $religion=(int)$_POST["religion".$i.''];
                $group1=(int)$_POST["group1".$i.''];
                $group2=(int)$_POST["group2".$i.''];
                $group3=(int)$_POST["group3".$i.''];
                
                
               if(($science > 100 || $science <-1) || ($maths > 100 || $maths <-1) || ($tamil > 100 || $tamil <-1) || ($english > 100 || $english <-1) || ($history > 100 || $history <-1) ||($religion> 100 || $religion <-1)|| ($group1 > 100 || $group1 <-1) || ($group2> 100 || $group2 <-1) || ($group3 > 100 || $group3 <-1) ){
                    @header("Location:marks.php?notvalidvalues");
                    @exit();
		
                }else{

                   
                      $update = "update  $stname set  science= $science, maths = $maths, tamil =  $tamil, english = $english, history = $history, religion = $religion, group1 = $group1,  group2 = $group2,  group3 = $group3 where student_id = '$student_id'";
                      
                            $re = mysqli_query($con, $update);

                   header("Refresh:0");
                }
            }
            $i++;
		
	 }
	 
    echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Maximum</td>
                <td>".$big[0][1]."</td>
                <td>".$big[1][1]."</td>
                <td>".$big[2][1]."</td>
                <td>".$big[3][1]."</td>
                <td>".$big[4][1]."</td>
                <td>".$big[5][1]."</td>
                <td>".$big[6][1]."</td>
                <td>".$big[7][1]."</td>
                <td>".$big[8][1]."</td></tr>";
    echo "<tr><td>Studentid</td>
                <td>".$big[0][0]."</td>
                <td>".$big[1][0]."</td>
                <td>".$big[2][0]."</td>
                <td>".$big[3][0]."</td>
                <td>".$big[4][0]."</td>
                <td>".$big[5][0]."</td>
                <td>".$big[6][0]."</td>
                <td>".$big[7][0]."</td>
                <td>".$big[8][0]."</td></tr>";
   echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Minimum</td>
                <td>".$small[0][1]."</td>
                <td>".$small[1][1]."</td>
                <td>".$small[2][1]."</td>
                <td>".$small[3][1]."</td>
                <td>".$small[4][1]."</td>
                <td>".$small[5][1]."</td>
                <td>".$small[6][1]."</td>
                <td>".$small[7][1]."</td>
                <td>".$small[8][1]."</td></tr>";
    echo "<tr><td>Studentid</td>
                <td>".$small[0][0]."</td>
                <td>".$small[1][0]."</td>
                <td>".$small[2][0]."</td>
                <td>".$small[3][0]."</td>
                <td>".$small[4][0]."</td>
                <td>".$small[5][0]."</td>
                <td>".$small[6][0]."</td>
                <td>".$small[7][0]."</td>
                <td>".$small[8][0]."</td></tr>";
    echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Average</td>
                <td>".$total[0]/$i."</td>
                <td>".$total[1]/$i."</td>
                <td>".$total[2]/$i."</td>
                <td>".$total[3]/$i."</td>
                <td>".$total[4]/$i."</td>
                <td>".$total[5]/$i."</td>
                <td>".$total[6]/$i."</td>
                <td>".$total[7]/$i."</td>
                <td>".$total[8]/$i."</td></tr>";
                    
    
	echo "</table></div>";

		}

	}

}else
 
//delete the table
if(isset($_POST['dtbname'])){
	$dtname = mysqli_real_escape_string($con,$_POST['dtname']);
   
	if(empty($dtname)){
		header("Location:enter.php?tablename=empty");
		exit();
	}else{
		$query_select = "SHOW TABLES LIKE '$dtname'";
		$run_query = mysqli_query($con, $query_select);
		$resultcheck = mysqli_num_rows($run_query);

				if($resultcheck <= 0){
					header("Location:enter.php?tablenamenotexist");
					exit();
				}else{
                $sql = "DROP TABLE $dtname";
            
			     $result = mysqli_query($con,$sql);
            
                header("Location:enter.php?deletesuccess");
		      exit();
                    
                }
    }
}else{
    $stname= $_SESSION['table'];
	if(empty($stname)){
		header("Location:enter.php?tablename=empty");
		exit();
	}else{
		$query_select = "SHOW TABLES LIKE '$stname'";
		$run_query = mysqli_query($con, $query_select);
		$resultcheck = mysqli_num_rows($run_query);

				if($resultcheck <= 0){
					header("Location:enter.php?tablenamenotexist");
					exit();
				}else{
					

					echo"<div class=\"tab\"><h6>Student marks from ".$stname." Table</h6>
                    <form class=\"ged\" action=\"marks.php\" method=\"post\">
					<table class=\"stutable\">
		<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
                    
        $sql = "SELECT * FROM $stname";       
        $result1 = mysqli_query($con,$sql);
                    
        $big = array(
                array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0),array("",0)
                );
        $small = array(
                array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100),array("",100)
                    );
        $total= array(0,0,0,0,0,0,0,0,0);
                  
        while($result = mysqli_fetch_assoc($result1)) {
			
		  echo"<tr>
					<td><input type=\"text\"  name=\"student_id$i\" value=\"";
            echo $result['student_id'];
            
            echo "\"></td><td><input type=\"text\"  name=\"science$i\" value=\"";
            echo $result['science'];
                    if($result['science'] > $big[0][1]){
                            $big[0][1] = $result['science'];
                            $big[0][0] = $result['student_id'];
                        }
                    if($result['science'] < $small[0][1]){
                            $small[0][1] = $result['science'];
                            $small[0][0] = $result['student_id'];
                        }
                    $total[0] += $result['science'];
            echo"\"></td><td><input type=\"text\" name=\"maths$i\" value=\"";
            echo $result['maths'];
                    if($result['maths'] > $big[1][1]){
                            $big[1][1] = $result['maths'];
                            $big[1][0] = $result['student_id'];
                        }
                    if($result['maths'] < $small[1][1]){
                            $small[1][1] = $result['maths'];
                            $small[1][0] = $result['student_id'];
                        }
                    $total[1] += $result['maths'];
            echo"\"></td><td><input type=\"text\" name=\"tamil$i\" value=\"";
            echo $result['tamil'];
                    if($result['tamil'] > $big[2][1]){
                            $big[2][1] = $result['tamil'];
                            $big[2][0] = $result['student_id'];
                        }
                    if($result['tamil'] < $small[2][1]){
                            $small[2][1] = $result['tamil'];
                            $small[2][0] = $result['student_id'];
                        }
                    $total[2] +=$result['tamil'];
            echo"\"></td><td><input type=\"text\" name=\"english$i\" value=\"";
            echo $result['english'];
                    if($result['english'] > $big[3][1]){
                            $big[3][1] = $result['english'];
                            $big[3][0] = $result['student_id'];
                        }
                    if($result['english'] < $small[3][1]){
                            $small[3][1] = $result['english'];
                            $small[3][0] = $result['student_id'];
                        }
                        $total[3] +=$result['english'];
            echo"\"></td><td><input type=\"text\" name=\"history$i\" value=\"";
            echo $result['history'];
                    if($result['history'] > $big[4][1]){
                            $big[4][1] = $result['history'];
                            $big[4][0] = $result['student_id'];
                        }
                    if($result['history'] < $small[4][1]){
                            $small[4][1] = $result['history'];
                            $small[4][0] = $result['student_id'];
                        }
                        $total[4] += $result['history'];
            echo"\"></td><td><input type=\"text\" name=\"religion$i\" value=\"";
            echo $result['religion'];
                    if($result['religion'] > $big[5][1]){
                            $big[5][1] = $result['religion'];
                            $big[5][0] = $result['student_id'];
                        }
                    if($result['religion'] < $small[5][1]){
                            $small[5][1] = $result['religion'];
                            $small[5][0] = $result['student_id'];
                        }
                        $total[5] +=$result['religion'];
            echo"\"></td> <td><input type=\"text\" name=\"group1$i\" value=\"";
            echo $result['group1'];
                    if($result['group1'] > $big[6][1]){
                            $big[6][1] = $result['group1'];
                            $big[6][0] = $result['student_id'];
                        }
                    if($result['group1'] < $small[6][1]){
                            $small[6][1] = $result['group1'];
                            $small[6][0] = $result['student_id'];
                        }
                        $total[6] += $result['group1'];
            echo"\"></td><td><input type=\"text\" name=\"group2$i\" value=\"";
            echo $result['group2'];
                    if($result['group2'] > $big[7][1]){
                            $big[7][1] = $result['group2'];
                            $big[7][0] = $result['student_id'];
                        }
                    if($result['group2'] < $small[7][1]){
                            $small[7][1] = $result['group2'];
                            $small[7][0] = $result['student_id'];
                        }
                        $total[7] += $result['group2'];
            echo"\"></td><td><input type=\"text\" name=\"group3$i\" value=\"";
            echo $result['group3'];
                    if($result['group3'] > $big[8][1]){
                            $big[8][1] = $result['group3'];
                            $big[8][0] = $result['student_id'];
                        }
                    if($result['group3'] < $small[8][1]){
                            $small[8][1] = $result['group3'];
                            $small[8][0] = $result['student_id'];
                        }
                        $total[8] += $result['group3'];
            echo"\"></td><td><button type=\"submit\" name=\"update".$i."\">Update</button></td>
                    
				</tr>";

                
            
            if(isset($_POST['update'.$i.''])){
               
                $student_id=$_POST['student_id'.$i.''];
                $science=(int)$_POST["science".$i.''];
                $maths=(int)$_POST["maths".$i.''];
                $tamil=(int)$_POST["tamil".$i.''];
                $english=(int)$_POST["english".$i.''];
                $history=(int)$_POST["history".$i.''];
                $religion=(int)$_POST["religion".$i.''];
                $group1=(int)$_POST["group1".$i.''];
                $group2=(int)$_POST["group2".$i.''];
                $group3=(int)$_POST["group3".$i.''];
                
                
                if(($science > 100 || $science <-1) || ($maths > 100 || $maths <-1) || ($tamil > 100 || $tamil <-1) || ($english > 100 || $english <-1) || ($history > 100 || $history <-1) ||($religion> 100 || $religion <-1)|| ($group1 > 100 || $group1 <-1) || ($group2> 100 || $group2 <-1) || ($group3 > 100 || $group3 <-1) ){
                    @header("Location:marks.php?notvalidvalues");
                    @exit();
		
                }else{

                   
                      $update = "update  $stname set  science= $science, maths = $maths, tamil =  $tamil, english = $english, history = $history, religion = $religion, group1 = $group1,  group2 = $group2,  group3 = $group3 where student_id = '$student_id'";
                      
                            $re = mysqli_query($con, $update);

                   header("Refresh:0");
                }
            }
            $i++;
		
	 }
	 
    echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Maximum</td>
                <td>".$big[0][1]."</td>
                <td>".$big[1][1]."</td>
                <td>".$big[2][1]."</td>
                <td>".$big[3][1]."</td>
                <td>".$big[4][1]."</td>
                <td>".$big[5][1]."</td>
                <td>".$big[6][1]."</td>
                <td>".$big[7][1]."</td>
                <td>".$big[8][1]."</td></tr>";
    echo "<tr><td>Studentid</td>
                <td>".$big[0][0]."</td>
                <td>".$big[1][0]."</td>
                <td>".$big[2][0]."</td>
                <td>".$big[3][0]."</td>
                <td>".$big[4][0]."</td>
                <td>".$big[5][0]."</td>
                <td>".$big[6][0]."</td>
                <td>".$big[7][0]."</td>
                <td>".$big[8][0]."</td></tr>";
   echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Minimum</td>
                <td>".$small[0][1]."</td>
                <td>".$small[1][1]."</td>
                <td>".$small[2][1]."</td>
                <td>".$small[3][1]."</td>
                <td>".$small[4][1]."</td>
                <td>".$small[5][1]."</td>
                <td>".$small[6][1]."</td>
                <td>".$small[7][1]."</td>
                <td>".$small[8][1]."</td></tr>";
    echo "<tr><td>Studentid</td>
                <td>".$small[0][0]."</td>
                <td>".$small[1][0]."</td>
                <td>".$small[2][0]."</td>
                <td>".$small[3][0]."</td>
                <td>".$small[4][0]."</td>
                <td>".$small[5][0]."</td>
                <td>".$small[6][0]."</td>
                <td>".$small[7][0]."</td>
                <td>".$small[8][0]."</td></tr>";
    echo "<tr><td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td></tr>";
    echo"<thead>
			<th>Student Id</th>
			<th>Scince</th>
			<th>Maths</th>
			<th>Tamil</th>
			<th>English</th>
			<th>History</th>
			<th>Religion</th>
			<th>Group1</th>
			<th>Group2</th>
			<th>Group3</th>
		</thead>";
    echo "<tr><td>Average</td>
                <td>".$total[0]/$i."</td>
                <td>".$total[1]/$i."</td>
                <td>".$total[2]/$i."</td>
                <td>".$total[3]/$i."</td>
                <td>".$total[4]/$i."</td>
                <td>".$total[5]/$i."</td>
                <td>".$total[6]/$i."</td>
                <td>".$total[7]/$i."</td>
                <td>".$total[8]/$i."</td></tr>";
                    
    
	echo "</table>
    <br>Note:you can't change the student id
    </div>";

		}

	}

}
?>

<form action="enter.php" method="post">
    <button type="submit" name="dtbname">back</button>
		
</form>

<?php include_once 'footer.php'; ?>