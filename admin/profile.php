


<?php
include "includes/admin_header.php";
if(isset($_SESSION['username']))
{
      $username=$_SESSION['username'];
      $query ="SELECT * from  users where username='{$username}' ";
     $select_user_profile_query=mysqli_query($connection,$query);

     while($row = mysqli_fetch_array($select_user_profile_query)){
        $user_id=$row['user_id'];
        $username=$row['username'];
        $user_password=$row['user_password'];
        $user_firstname=$row['user_firstname'];
        $user_lastname=$row['user_lastname']; 
        $user_email=$row['user_email'];
        // $user_image=$row['user_image'];
        $user_role=$row['user_role'];
 
     }
}

?>






<?php 

if(isset($_POST["edit_user"]))
{ 

    //  $user_id=$_POST['user_id'];
   $user_firstname=$_POST['user_firstname'];
    $user_lastname=$_POST['user_lastname'];
    $user_role=$_POST['user_role'];
    // $post_image=$_FILES['image']['name'];
    // $post_image_temp=$_FILES['image']['tmp_name'];
    $username=$_POST['username'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];


    // $post_date=date('d-m-y');    
    


    // move_uploaded_file($post_image_temp,"../images/$post_image");


    $query =  "UPDATE users SET  ";
    $query .="user_firstname = '{$user_firstname}', ";
    $query .="user_lastname = '{$user_lastname}', ";
    $query .="user_role = '{$user_role}', ";
    $query .="username = '{$username}', ";
    $query .="user_email= '{$user_email}', ";
    $query .="user_password = '{$user_password}' ";
    $query .="WHERE username = '{$username}' "; 
    $update_user_query=mysqli_query($connection,$query);
    queryConfirmationcheck($update_user_query);
    if($update_user_query)
    {
        
        
         echo '<script>alert("Update user Done ")</script>';
  
    }










}





?>
    <div id="wrapper">

        <!-- Navigation -->
        <?php
include "includes/admin_navigation.php";

?>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                    <h1 class="page-header">
                            Welcome to user
                            <small><?php  echo $username ; ?></small>
                        </h1>




  <form action="" method="post" enctype="multipart/form-data">

       <div class="form-group">
        <lebel for="post_author" >Firstname</lebel>
              <input type="text" class ="form-control" name="user_firstname" value=<?php echo $user_firstname;?> >

    </div>

    <div class="form-group">
        <lebel for="post_status" >Lastname</lebel>
              <input type="text" class ="form-control" name="user_lastname" value=<?php echo $user_lastname;?>>

    </div>
   

    <div class="form-group">
       <select name="user_role" id="">

       <!-- <option value="subscriber"><?php echo $user_role; ?> </option> -->


       
       
       if($user_role =='Admin')
       {
        echo "<option value="subscriber">Subscriber</option>";
       }

       else{
        echo "" <option value="admin">Admin</option>";
       }

    

       
  
  

       </select>

    </div>



    <!-- <div class="form-group">
        <lebel for="post_image" >Post Image</lebel>
              <input type="file" class ="form-control" name="image">

    </div> -->



    <div class="form-group">
        <lebel for="post_tags" >Username</lebel>
              <input type="text" class ="form-control" name="username" value=<?php echo $username;?>>

    </div>

    <div class="form-group">
        <lebel for="post_tags" >Email</lebel>
              <input type="email" class ="form-control" name="user_email" value=<?php echo $user_email;?>>

    </div>
    <div class="form-group">
        <lebel for="post_tags" >Password</lebel>
              <input type="password" class ="form-control" name="user_password" value=<?php echo $user_password;?>>

    </div>

    <div class="form-group">
    <input  class="btn btn-primary" type="submit" name="edit_user" value="Update Profile">


    </div>


</form>

                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

        <?php
include "includes/admin_footer.php";

?>
