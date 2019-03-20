<?php
	include_once 'header.php';
?>

	<section class="main-container">
		
		<div id = "container">
		
		<img class= "slides" src="image/bg1.jpg">
		<img class= "slides" src="image/bg2.jpg">
		<img class= "slides" src="image/bg3.jpg">
		<img class= "slides" src="image/bg4.jpg">
		<img class= "slides" src="image/bg5.jpg">
		<button class="btn" onclick="plusIndex(-1)" id="btn1">&#10094;</button>
		<button class="btn" onclick="plusIndex(1)" id="btn2">&#10095;</button>

	</div>
<br><br>
<div class="main-wrapper">
	<h1>Home</h1>

	</div>


<script>
	var index = 1;

	function plusIndex(n) {
		index = index+n;
		showImage(index);
	}

	showImage(1);

	function showImage(n){
		var x = document.getElementsByClassName("slides");
		var i;
		if(n > x.length){
			index = 1;
		}
		if(n < 1){
			index = x.length;
		}
		for(i=0; i<x.length; i++){
			x[i].style.display = "none";
		}
		x[index-1].style.display = 'block';
	}

	autoS();
	function autoS() {
		var x = document.getElementsByClassName("slides");
		var i;

		for(i=0; i<x.length; i++){
			x[i].style.display = "none";
		}

		if(index > x.length)
			index = 1;

		x[index-1].style.display = "block";

		index++;
		setTimeout(autoS,4000);
	}
</script>
	</section>

	<div class="section">
		<h4>
			Our lives are beautiful, lovely, satisfactory and successful because we have got good schooling, and we had been provided with a golden opportunity to have our studies in good schools and those ‘Alma Mater’ has shown the path of leading to the stunning winnings and approving victories. The schools exert great influence upon us. They shape our character, mould our mental attitudes and fashion the basic principles of life. Thanks to our schools and parents!<br><br>
For many of us, the days spent in schools are the happiest and the best days of our life. The very memory of school days fills our minds with longing memories of happy days of yester years.<br><br>
School is a meeting place of students and teachers. In this temple of learning, a student learns the ‘life-skills’ of living in the in the society needed for the later part of life. Forgetting their joys and sorrows, they read together, play together and sit together, cherishing and shaping their future dreams.<br><br>
 Students take part in games and sports, drama, essay competition, song and debate competitions etc. School also gives the foundation for the budding poets, scientists, writers, doctors, engineers, painters and musicians. It is in school that the students enjoy the affection of their teachers.
In library, debate class and in competitions, students get proper scope to improve their knowledge and style. Above all, in examinations, they try to show their brilliant performance.<br><br>
School has definitely a healthy influence upon students. But some students indulge in bad company and get away from the impact of their teachers. Those students miss the charm of their school life.<br><br>
Students when they are entering into the school in the morning are crying vigorously. But they are getting out of the school enjoying. It reflects that something that is not interested to the students is happening in the school or the school does not provide the love, belongingness and safety to them as like their home.<br><br>
If the teacher is unsuccessful, then for most children, school life means
Most irritating moment – morning alarm
Most difficult task – to find socks
Most dreadful journey – way to class
Most lovely time – meeting friends and playing with friends
Most tragic moments – surprise test in the1st period
Most wonderful news – Teacher is absent
<br>
Most schools offer students variety of courses that they can choose from, but the majority of students don’t have any ideas of what they might be interested in and what they should pursue in future life. They can’t blindly predict what they would enjoy until they have enough information. Confused students can get help
 		</h4>
	</div>


	<div class="contain">

	 <div class="block">
          <h3>GOOD SCHOOLING</h3><br>
          <h6>Good Schooling is essential for every society and individual. It is life itself but not a preparation for life. Man has various qualities. School life is but a preparation to face the challenges that the bigger school called ‘world’ will offer us when we are left out on the road of life land walk on.For many of us, the days spent in schools are the happiest and the best days of our life. The very memory of school days fills our minds with longing memories of happy days of yester years.School is the right place for the fulfillment of the youthful desires.The days spent in schools are the happiest  of our life.</h6>
        </div>
        <div class="block">
          <h3>TEACHERS’ ROLE</h3><br>
          <h6>Teachers act as the guides and guardians to guide them on the right path. In school, teachers try to remove the evils from the students by sowing some seeds of good qualities in them.Teacher is the   second parent to a child and their responsibility at school is in no way lesser than the mother   at home.However, teachers try to teach their students to think critically by encouraging them to ask questions like “Why do I think that”, “What would happen if...”, or “How are these two things   different” before doing any projects or learning any new subjects. 
		</h6>
        </div>

        <div class="block">
          <h3>STUDENTS</h3><br>
          <h6>Thinking in a critical way, evaluating and understanding the relationship among the problem give a person a new perspective to look at the problem differently in order to solve it.   Learning to communicate effectively with others is another skill  which is taught to the students. Doing presentation is a very common and good example for building students’ communication skills. Almost every   subject in secondary school requires presentations, and as a result,   the students learn how   to communicate with peers through discussions and gathering information.  
</h6>
        </div></div><br><br>

<?php
	include_once 'footer.php';
?>	

