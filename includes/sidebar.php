<div class="col-md-4">





<?php

if(isset($_POST['submit']))
{
 $search=  $_POST["search"]; 

$query ="select * from posts  where  post_tags like '%$search%'";

$search_query=mysqli_query($connection,$query);

if(!$search_query)
{
    die("Faild".mysqli_error($connection));
}
$count=mysqli_num_rows($search_query);
if($count==0)
{
    // echo "<h1> No result</h1>";
}
else{
    echo "<h1> Some result</h1>";
}
}
  



?>



<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">


    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="submit" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->




<div class="well">


<?php
        $query="Select * from categories ";
        $select_all_categories_query=mysqli_query($connection,$query);

?>
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-12">
            <ul class="list-unstyled">

              <?php
                while($row=mysqli_fetch_assoc($select_all_categories_query))
                {
                    $cat_title=$row["cat_title"];
                    echo "<li> <a href='#'>{$cat_title}</a></li>";// variable pass korte caile double {}


                }

             ?>
               
            </ul>
        </div>
        <!-- /.col-lg-6 -->
      
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php

 include "includes/widget.php";

?>

</div>

</div>