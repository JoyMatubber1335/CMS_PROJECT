

<?php

if(isset($_POST["create_user"]))
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


    $query="INSERT INTO users(user_firstname,user_lastname,user_role,username,user_email,user_password) ";
    $query .="VALUES ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_email}','{$user_password}') ";
    $create_user_query=mysqli_query($connection,$query);

    queryConfirmationcheck($create_user_query);

   echo "User created: ". " ". "<a href='users.php' >View Users</a> ";
}



?>
<form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                            <lebel for="post_author" >Firstname</lebel>
                                  <input type="text" class ="form-control" name="user_firstname">

                        </div>

                        <div class="form-group">
                            <lebel for="post_status" >Lastname</lebel>
                                  <input type="text" class ="form-control" name="user_lastname">

                        </div>
                       

                        <div class="form-group">
                           <select name="user_role" id="">
                           <option value="subscriber">Select Options</option>
                      <option value="admin">Admin</option>
                      <option value="subscriber">Subscriber</option>

                           </select>

                        </div>

                    

                        <!-- <div class="form-group">
                            <lebel for="post_image" >Post Image</lebel>
                                  <input type="file" class ="form-control" name="image">

                        </div> -->



                        <div class="form-group">
                            <lebel for="post_tags" >Username</lebel>
                                  <input type="text" class ="form-control" name="username">

                        </div>

                        <div class="form-group">
                            <lebel for="post_tags" >Email</lebel>
                                  <input type="email" class ="form-control" name="user_email">

                        </div>
                        <div class="form-group">
                            <lebel for="post_tags" >Password</lebel>
                                  <input type="text" class ="form-control" name="user_password">

                        </div>

                        <div class="form-group">
                        <input  class="btn btn-primary" type="submit" name="create_user" value="Add user">


                        </div>

                
            </form>