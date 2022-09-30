<?php
include('header.php');
?>
<h1>Search Page</h1>
<div class="article-container">
<?php
if(isset($_POST['submit-search']))
{
    
    $search=$_REQUEST['search'];
    //echo $search;
    $k=strpos($search,"-");
    echo $k;
    if($k)
    {
        echo "hello";
        $input=explode('-',$search);
       
        $input0=$input['0'];
        echo $input0;
        $input1=$input['1'];
       echo $input1;
       $query="select * from article where(a_title like '%$input0%' OR a_text like '%$input0%' OR a_author Like '%$input0%' ) AND (a_title  NOT like
    '%$input1%' OR a_author not  Like '%$input1%')";
        
        $query = mysqli_query($conn, $query);
        
        $result_count = mysqli_num_rows($query);

        echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
       

        $result_count=mysqli_num_rows($query);
  
        echo "
        <div class='found'>$result_count Results found";
       
        if($result_count != 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
              echo "<div class='article-box'>
              <h3>".$row['a_title']."</h3>
              <p>".$row['a_text']."</p>
              <p>".$row['a_date']."</p>
              <p>".$row['a_author']."</p>
              </div>";
            }
        }
    }    
else{
        $search_string = "SELECT * FROM article WHERE ";
        $display_words = "";
			
        $key = explode(' ', $search);			
        foreach ($key as $word)
        {
        	$search_string .= "a_title LIKE '%".$word."%' OR a_text LIKE '%".$word."%' OR  ";
	        $display_words .= $word.' ';
        }
        $search_string = substr($search_string, 0, strlen($search_string)-4);
        $display_words = substr($display_words, 0, strlen($display_words)-1);
        //echo $search_string;
        $query = mysqli_query($conn, $search_string);
        $result_count = mysqli_num_rows($query);

        echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
        echo 'Your search for <i>"'.$display_words.'"</i><hr />';
    

        $result_count=mysqli_num_rows($query);
  
        echo "
        <div class='found'>$result_count Results found";
       
        if($result_count != 0)
        {
            while($row = mysqli_fetch_assoc($query))
            {
              echo "<div class='article-box'>
              <h3>".$row['a_title']."</h3>
              <p>".$row['a_text']."</p>
              <p>".$row['a_date']."</p>
              <p>".$row['a_author']."</p>
              </div>";
            }
        }
    }
}
    ?>