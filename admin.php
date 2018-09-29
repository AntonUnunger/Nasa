<?php 
	$hostname = "localhost";
	$username = "root";
	$password = "";
	$error = "Cannot connect to database, please try again later...";
	$dbname = "nasa";

	// Create connection
	$conn = new mysqli($hostname, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

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
			echo 'else';
			$dir = './img/posts/';
			$file_name = $_FILES['file']['name'];
			$file_size =$_FILES['file']['size'];
			$file_tmp =$_FILES['file']['tmp_name'];
			$file_type=$_FILES['file']['type'];
			$file_ext = explode('.', $file_name);
			$real_file_ext = strtolower(end($file_ext));
			
			$extensions= array("jpeg","jpg","png");
			
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
				
				$sql = "INSERT INTO article (Title, Content, Filepath, Category) VALUES ('$title', '$content', '$filepath', '$categories')";
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
	</head>
	<body>
		<div id="main">
			<div id="header">
				<img id="logo" src="./img/nasa-logo.png">
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
								<p>This will be displayed on the page for the article</p>
							<input id="Content-Input" type="text" placeholder="Content" name="content">
							
						</div>
						<input id="file" name="file" type="file">
						<input type="submit" value="submit" name="submit">    
					</form>
				</div>
            </div>
		</div>		
	</body>
</html>