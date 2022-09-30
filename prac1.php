<?php
include('header.php');
?>
<html>
    <head>
        <title>Search</title>
        <link rel="stylesheet" href="style1.css"> 
</head>
<body>
<div class="box">
    
<form action="prac.php" method="POST">
    <input type="text" name="search" placeholder="Type...">
    <button type="submit" name="submit-search">Search</button> 
</form>
<B>Front Page</B>
<h2>All Articles:</h2>
<div class="article-container">
    <?php
    
    $server="localhost";
    $username="root";
    $password="";
    $sm="sm";
    $conn=mysqli_connect($server,$username,$password,$sm);

    $sql="SELECT * from article";
    $result=mysqli_query($conn,$sql);
    $queryResults=mysqli_num_rows($result);

    if($queryResults > 0)
    {
      while($row=mysqli_fetch_assoc($result))
      {
          echo "<div class='article-box'>
          <h3>".$row['a_title']."</h3>
          <p>".$row['a_text']."</p>
          
          <p>".$row['a_author']."</p>
          </div>";
      }
    }
    ?>
    </div>
</div>
</body>
</html>
