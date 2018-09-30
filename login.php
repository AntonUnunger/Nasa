<?php 
    session_start();
    if(isset($_POST['submit']))
    {
        $_SESSION['username'] = $_POST['username'];
        header("Location: admin.php");
    }
?>

<!doctype html>

<html lang="en">
	<head>
		<meta charset="utf-8">
        <title>NASA</title>
        <link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/login.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	</head>
	<body>
		<div id="main">
			<div id="header">
                <a href="index.php" id="logo" ></a>
			</div>
			<div id="Content">
				<div id="login">
					<form id="Form4" method="post" enctype="multipart/form-data">
                        <input id="User-Input" type="text" name="username" placeholder="Username">
                        <input id="Pass-Input" type="text" name="password" placeholder="Password">
                        <input class="button" type="submit" value="Login" name="submit">    
					</form>
				</div>
            </div>
		</div>		
	</body>
</html>