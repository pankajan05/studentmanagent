<?php include_once 'header.php'; ?>

<section class="main-container">
		
		<div id = "container">
		
		<img class= "slides" src="image/e1.jpg">
    </div>
</section>
<br><br>

<div class="main-wrapper">
	<h1>Events</h1>
</div>

<?php 

include_once 'include/db.inc.php';

$sql = "SELECT * FROM event";
$result = mysqli_query($con,$sql);



while($result1 = @mysqli_fetch_assoc($result)){
    
    echo "<div class=\"section13\"><form class=\"ged\" action=\"eventedit.php\" method=\"post\">
    <h4>".$result1['head']."</h4>
    <p style=\"float: left;\"><img src=\"".$result1['img']."\" height=\"200px\" width=\"200px\" border=\"1px\"></p>
    <p><br><br>".$result1['content']."</p>
</div>";
    
   
}



?>




<?php include_once 'footer.php'; ?>