<?php
function insert_category()
{
    global $connection;
    if(isset($_POST["submit"]))
    {
     $cat_title= $_POST["cat_title"];
    if($cat_title=="" || empty($cat_title))
    {
        echo "this field should not be emopty";
    }
    else{
        $query= "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('{$cat_title}') ";
        $create_category_query=mysqli_query($connection,$query);
        if(!$create_category_query)
        {
            die("faild".mysqli_error($connection));
        }
        


    }
      


    }
}

function findallcategory()
{
    global $connection;
    
    $query="Select * from categories ";
    $select_categories=mysqli_query($connection,$query);

          while($row=mysqli_fetch_assoc($select_categories))
          {
              $cat_id=$row["cat_id"];
              $cat_title=$row["cat_title"];
              echo "<tr>";
              echo " <td>{$cat_id} </td>";
              echo " <td>{$cat_title} </td>";// variable pass korte caile double {}
              echo " <td><a href='categories.php?delete={$cat_id}'>Delete</a> </td>";
              echo " <td><a href='categories.php?edit={$cat_id}'>Edit</a> </td>";
              echo "</tr>";

          }


}

function deletecategory()
{
    global $connection;
    if(isset($_GET['delete']))
    {
       $the_cat_id=$_GET['delete'];
       $query="DELETE from categories where cat_id= {$the_cat_id} ";
       $delete_query=mysqli_query($connection,$query);
       header("Location: categories.php");  // refresinng the page 

    }   
}






?>
