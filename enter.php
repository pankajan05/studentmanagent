<?php include_once 'header.php' ?>

<div class="main-wrapper">
	<h1>Marks Enter</h1>
</div>


<div>
<div class="section13">
<h3>Available Tables<br><br></h3>
    <ul>
<?php 
			include_once 'include/db.inc.php';

			$query_select = "SHOW TABLES LIKE 'M%'";
			$run_query = mysqli_query($con, $query_select);
			
		while ($result = mysqli_fetch_assoc($run_query)) {

			$name=$result['Tables_in_student (M%)'];
			
			echo "<h5><li>".$name."</li><br></h5>";

	}
		
		?>
        </ul>
        </div>


<div class="container1">

	
		<form class="ged" action="marks.php" method="post">
			<input type="text" name="stname" placeholder="Table name">
		<button type="submit" name="stbname">Show Table</button><br><br>
			<input type="text" name="tname" placeholder="Table name">

		<button type="submit" name="tbname">Create Table</button><br><br>
			<input type="text" name="dtname" placeholder="Table name">

		<button type="submit" name="dtbname">Delete Table</button>
		
		</form> 
	
</div>
    
    
  
</div>

<?php include_once 'footer.php' ?>