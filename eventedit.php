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

<div class="section13">
    <br>
	<form action='include/marks.inc.php' method="post">	
        <input class="k1" type="text" name="head" placeholder="Add heading"><br><br>
        
        <input class="k2" type="text" name="content" placeholder="Add Content"><br><br>
        
        <input type="file" name="file" placeholder="delete student"><br>
        <button name="add">Add Event</button>
</form>
</div>


<?php 

include_once 'include/db.inc.php';
$i = 0;
$sql = "SELECT * FROM event";
$result = mysqli_query($con,$sql);




while($result1 = mysqli_fetch_assoc($result)){
    
    echo "<div class=\"section13\"><form class=\"ged\" action=\"eventedit.php\" method=\"post\">
    <h4>".$result1['head']."</h4>
    <p style=\"float: left;\"><img src=\"".$result1['img']."\" height=\"200px\" width=\"200px\" border=\"1px\"></p>
    <p><br><br>".$result1['content']."</p><button type=\"submit\" name=\"delete$i\">Delete</button>
</div>";
    
     if(isset($_POST['delete'.$i.''])){
        $sql = "DELETE FROM event WHERE head='".$result1['head']."'";
            //echo $sql;
        mysqli_query($con,$sql);
        
        
     }
    $i++;
    
}
    


?>




<?php include_once 'footer.php'; ?>