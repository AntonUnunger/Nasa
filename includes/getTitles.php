<?php
    if(!empty($_GET['input']))
    {
        include '../includes/connect.php';
        $input=$_GET['input'];
        $query="select * from article where Title like '%$input%' LIMIT 5";
        $titles=mysqli_query($conn,$query);
        while($output=mysqli_fetch_assoc($titles))
        {
            echo '<a href=article.php?id='.$output['Filepath'].'>'.$output['Title'].'</a>';
        }
    }
?>