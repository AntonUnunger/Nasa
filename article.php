<?php 
	include 'includes/connect.php'; 
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>NASA</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/content.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<script type="text/javascript" src="./js/slider.js"></script>
	</head>

	<body>
		<div id="main">
			<div id="header">
				<a href="index.php" id="logo" ></a>
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
					<input type="text" placeholder="Search">
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
            </div>
            <div id="Main-Content">
                <?php
                    $filepath = $_GET['id'];
                    $sqlArticleQuery = "select * from article where Filepath='$filepath'";
                    $slides = mysqli_query($conn, $sqlArticleQuery);
                    while($slide = mysqli_fetch_array($slides, MYSQLI_ASSOC))
                    {
						$file = '';
						if($slide['FileExt'] == "mp4"  || $slide['FileExt'] == "mov" || $slide['FileExt'] == "wav")
						{
							$file = "<video class='slidervid' autoplay>
										<source src='".$slide['Filepath']."' type='video/".$slide['FileExt']."'>
									</video>";
						}
						else
						{
							$file = "<img src='".$slide['Filepath']."'>";
						}
						echo
						"
							<div id='Slider4'>
								<div class='SlideShow'>
									<div class='text'>
										<h2 class='top-text'>".$slide['Category']."</h2>
										<h1 class='bottom-text'>".$slide['Title']."</h1>
									</div>
									".$file."
								</div>
							</div>
							<div class='content'>
								<p class='article-text'>".$slide['Content']."</p>
							</div>
						";	
                    }	
                ?>
            </div>
        </div>
    </body>
</html>
