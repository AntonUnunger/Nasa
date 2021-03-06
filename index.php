<?php 
	include 'includes/connect.php';
?>


<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>NASA</title>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
		<script type="text/javascript" src="./js/slider.js"></script>
		<script type="text/javascript" src="./js/hover.js"></script>
		<script src="js/jq.js"></script>
	</head>

	<body>
		<div id="main">
			<div id="header">
				<div id="logo-container">
			        <a href="index.php" id="logo" ></a>
			    </div>
				<ul id="top-menu">
					<li	class="first">Missions</li>
					<li class="horizontal">Galleries</li>
					<li class="horizontal">NASA TV</li>
					<li class="horizontal">Follow NASA</li>
					<li class="horizontal">Downloads</li>
					<li class="horizontal">About</li>
					<li class="horizontal">NASA Audiences</li>
				</ul>
				<form id="search">
					<input id="boxListener" type="text" name="boxListener" placeholder="Search" autocomplete="off">
					<div id="suggestions"></div>
					<button id="mybutton"><i class="fa fa-search"></i></button>
				</form>
				<ul id="lower-menu">
					<li class="lower-first">Humans in Space</li>
					<li class="lower-item">Moon to Mars</li>
					<li class="lower-item">Earth</li>
					<li class="lower-item">Space Tech</li>
					<li class="lower-item">Flight</li>
					<li class="lower-item">Solar System and Beyond</li>
					<li class="lower-item">Education</li>
					<li class="lower-item">History</li>
					<li class="lower-item">Benefits to You</li>
				</ul>
			<script src="./js/searchListener.js"></script>
			</div>
			<div id="Main-Content">
				<div id="Slider4">
                    <?php
                        $sqlArticleQuery = "select * from article";
						$slides = mysqli_query($conn, $sqlArticleQuery);
                        while($slide = mysqli_fetch_array($slides, MYSQLI_ASSOC))
                        {
							$file = '';
							if($slide['FileExt'] == "mp4"  || $slide['FileExt'] == "mov" || $slide['FileExt'] == "wav")
							{
								$file = "<a href='article.php?id=".$slide['Filepath']."'><video class='slidervid' muted loop>
											<source src='".$slide['Filepath']."' type='video/".$slide['FileExt']."'>
										</video></a>";
							}
							else
							{
								$file = "<a href='article.php?id=".$slide['Filepath']."'>
                                    		<img src='".$slide['Filepath']."'>
                                    	</a>";
							}
                            echo
                            "
                                <div class='SlideShow'>
                                    <div class='text'>
                                        <h2 class='top-text'>".$slide['Category']."</h2>
                                        <h1 class='bottom-text'>".$slide['Title']."</h1>
                                    </div>
                                    ".$file."
                                </div>
                            ";	
                        }
                    ?>


                <!--
					<div class="SlideShow">
						<div class="text">
							<h2 class="top-text">See inside</h2>
							<h1 class="bottom-text">The inside of the Soyuz rocket</h1>
						</div>
						<img src="./img/soyuz.jpg">
					</div>
				
					<div class="SlideShow">
						<div class="text">
							<h2 class="top-text">Mars Horizon</h2>
							<h1 class="bottom-text">Curiosity rovers latest picture from mars</h1>
						</div>
						<img src="./img/mars.jpg">
					</div>
				
					<div class="SlideShow">
						<div class="text">
							<h2 class="top-text">Satellite</h2>
							<h1 class="bottom-text">New cool satellite launched into orbit</h1>
						</div>
						<img src="./img/earth.jpg">
					</div>
                    -->
				</div>
				<div id="Card-text">
					<div id="text-card">
						<div id="relative-box">
							<div id="title-text">
								<p>NASA Events</p>
							</div>
							<div id="content-text">
								<p>Wednesday, Sept. 7: OSIRIS-REx Science and Engineering Talk (12 p.m. EDT), Asteroid Panel Discussion (1 p.m. EDT), NASA TV</p>
								<p>Thursday, Sept. 8: Launch of OSIRIS-REx, 7:05 p.m. EDT</p>
							</div>
							<div id="footer-text">
								<div id="leftT">
									<p>Calendar</p>
								</div>
								<div id="rightT">
									<p>Launches and Landings</p>
								</div>
							</div>	
						</div>
					</div>
				</div>
				<div id="News-Card1">
					<img src="./img/Spaceman.jpg">

					<div id="newsbox1">
						<h3 id="news-top">Runaway Spaceman</h2>
						<h2 onmouseenter="MyHover()" id="news-bottom">Astrounaut on untethered spacewalk</h1>
					</div>
					<div onmouseleave="MyLeave()" id="news-info1">
						<h1>Runaway Spaceman</h1>
						<p>Captain James Smith went on the first untethered spacewalk today when he tested a jetpack. He floated unassisted near the Internation Space Station for 10 minutes and then returned.</p>

					</div>
				</div>
				
				<div id="Card2-text">
					<img src="./img/Rocket.jpg">
					<div id="right-side">
						<section>
							<h1>Last space shuttle launch</h1>
							<p><a href=''>The last space shuttle</a> was launched 7 years ago on 8th of July 2011. The launch was from Cape Canaveral at 11:26 PM.</p>
							<ul id="Card-list">
								<li>Launch site</li>
								<li>Launch day</li>
								<li>Launch coolk</li>
								<li>Launch swag</li>	
							</ul>
						</section>
					</div>
				</div>
				<div class="Card">
					<video id="WaterTest" controls>
						<source src="./img/WaterTest.mp4" type="video/mp4">
					</video>
				</div>	
				<div class="Card2">
					<img src="./img/crew.jpg">
				</div>
				<!--<div class="Card2">
					<img src="./img/TestFire.jpg">
				</div>-->
				<div class="Card">
					<img src="./img/Canadarm.jpg">
				</div>		
			</div>
			<div id="footer">
				<a href="login.php">Login page</a>
				<a href="admin.php">Admin page</a>
			</div>
		</div>		
	</body>
</html>