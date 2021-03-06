<?php
	session_start();
	if(!isset($_COOKIE["PHPSESSID"]))
	{
		header("Location: login.php");
	}
	include 'includes/connect.php';
	
	$errors = array();
	if (isset($_POST['submit'])) {
        $title = mysqli_real_escape_string($conn, $_POST['title']);
		$content = mysqli_real_escape_string($conn, $_POST['content']);
		$categories = $_POST['categories'];

        if(empty($title)){
			array_push($errors, "Title must not be empty!" );
        }    
        if(empty($content)){
			array_push($errors, "Content must not be empty!" );
        }
        if (!empty($_FILES['file']['error'])) {
			array_push($errors, "Please choose an image!");

		} 
		else {
			$dir = './img/posts/';
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_tmp =$_FILES['file']['tmp_name'];
			$file_ext = explode('.', $file_name);
			$real_file_ext = strtolower(end($file_ext));
			
			$extensions= array("jpeg","jpg","png","mp4", "mov", "wav");
			
			$name = uniqid().'.'.$real_file_ext;

			if(!in_array($real_file_ext, $extensions)){
				array_push($errors, "File type not supported!" );
			}
			
			if($file_size > 5242880){
				array_push($errors, "File is too large! (Max 5mb)!" );
			}
			if (empty($errors)) {
				$filepath = $dir.$name;
				move_uploaded_file($file_tmp, $filepath);
				$sql = "INSERT INTO article (Title, Content, Filepath, Category, FileExt, Author) VALUES ('$title', '$content', '$filepath', '$categories', '$real_file_ext', '".$_SESSION['username']."')";
				$result = mysqli_query($conn, $sql);
			}
		}
	}
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>NASA</title>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/admin.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
		<link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
	</head>
	<body>
		<div id="main">
			<div id="header">
			    <div id="logo-container">
			        <a href="index.php" id="logo" ></a>
			    </div>
				
			</div>
			<div id="Content">
				<div id="CreateSlider">
					<form id="Form4" method="post" enctype="multipart/form-data">
						<div id="categorydiv">
							<h3>Select a category</h3>
							<p>This will be the top text</p>
							<select id="Select-Box" name="categories">
								<option value="Satellite">Satellite</option>
								<option value="See Inside">See Inside</option>
								<option value="Mars">Mars</option>
								<option value="Rockets">Rockets</option>  
							</select>
						</div>
						
						<div id="titlediv">
							<h3>Choose a title</h3>
							<p>This will be the bottom text</p>
							<input id="Title-Input" type="text" placeholder="Title" name="title">
						</div>
						<div id="contentdiv">
							<h3>Write the content</h3>
							<p>This will be displayed on the page for the article</p
							><textarea id="Content-Input" name="content" placeholder="Content"></textarea>
						</div>
						<input id="file" name="file" type="file">
						<input class="button" type="submit" value="submit" name="submit">    
					</form>
				</div>
            </div>
		</div>		
	</body>
</html>