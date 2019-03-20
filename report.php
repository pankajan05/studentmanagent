<?php include_once 'header.php' ?>

<div class="main-wrapper">
	<h1>Achivements</h1>
</div>


<div class="tab1">
	<h6>Student Marks detail</h6>
	<table class="stutable1">
		<thead>
			<th>Subject</th>
			<th>Marks</th>
			
		</thead>
		
		<?php include_once 'include/db.inc.php';

			$f = $_SESSION['uid']; 

			$search = @mysqli_real_escape_string($con,$_POST['search']);
			$sql = "SELECT * FROM marks  WHERE student_id = '$f'";
			$result = mysqli_query($con,$sql);
			$resultcheck = mysqli_num_rows($result);

			$total =0;
		
			$result1 = mysqli_fetch_assoc($result)
		
		 

		?>

		
				
					<tr>
						<td>Science</td>
						<td><?php 
						$total += $result1['science'];
						echo $result1['science'];?></td></tr>
					<tr>
						<td>Maths</td>
						<td><?php 
						$total += $result1['maths'];
						echo $result1['maths'];?></td></tr>
					<tr>
						<td>Tamil</td>
						<td><?php 
						$total += $result1['tamil'];
						echo $result1['tamil'];?></td></tr>
					<tr>
						<td>English</td>
						<td><?php 
						$total += $result1['english'];
						echo $result1['english'];?></td></tr>
					<tr>
						<td>History</td>
						<td><?php 
						$total += $result1['history'];
						echo $result1['history'];?></td></tr>
					<tr>
						<td>Religion</td>
						<td><?php 
						$total += $result1['religion'];
						echo $result1['religion'];?></td></tr>
					<tr>
						<td>Group1</td>
						<td><?php 
						$total += $result1['group1'];
						echo $result1['group1'];?></td></tr>
					<tr>
						<td>Group2</td>
						<td><?php 
						$total += $result1['group2'];
						echo $result1['group2'];?></td></tr>
					<tr>
						<td>Group3</td>
						<td><?php 
						$total += $result1['group3'];
						echo $result1['group3'];?></td></tr>
				
		

	 

	</table>
	<div class="section12">
		
		<h6>Total: <?php echo $total; ?></h6>
		<h6>Average:<?php echo ($total/9); ?></h6> 
	
		
	</div>
	</div>



<?php include_once 'footer.php' ?>