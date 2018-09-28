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


	if(isset($_POST['Submit']))
	{
		$title = $_POST['Title'];
		$content = $_POST['Content'];

		if(isset($_FILES['file']))
		{
			$dir = './img/';
			$file_name = $_FILES['file']['name'];
			$filepath = $dir.$file_name;






			$queryString = "INSERT INTO article(Title,Content,Filepath) VALUES ('".$title."','".$content."','".$filepath."')";
			if(mysqli_query($conn, $queryString))
			{
				echo "Event was successfully added";
			}
			else
			{
				echo "Event failed to be added...";
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
			<div id="Main-Content">
                <form id="Form4" method="post">
					<input type="text" placeholder="Title" name="Title">
					<input type="text" placeholder="Content" name="Content">
					<input id="file" name="file" type="file">
					<input type="submit" value="Submit" name="Submit">    
				</form>
                
            </div>
		</div>		
	</body>
</html>