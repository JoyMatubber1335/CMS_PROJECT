<?php

session_start();

include "db.php";

if(isset($_POST['login'])){
    
     $username= $_POST['username'];
    
     $password=$_POST['password'];

  $username=mysqli_real_escape_string($connection,$username); // clean up the data so that hacker can't hack or send dumy data 
  $password=mysqli_real_escape_string($connection,$password);
  $query ="SELECT * from users where username='{$username}' ";
  $select_user_query=mysqli_query($connection,$query);
 if(!$select_user_query)
 {
    die("Error ".mysqli_error($connection));
 }

 while($row = mysqli_fetch_array($select_user_query))
 {
    
      $db_user_id=$row['user_id'];
       $db_username=$row['username'];
      
       $db_user_password=$row['user_password'];
      $db_user_firstname=$row['user_firstname'];
      $db_user_lastname=$row['user_lastname'];
      $db_user_role=$row['user_role'];
      
 }
 if($username === $db_username and $password === $db_user_password)
 {
   

      
   //   header ('Location : );
  $_SESSION['username']=$db_username;
  $_SESSION['user_firstname']=$db_user_firstname;
 $_SESSION['user_lastname']=$db_user_lastname;
 $_SESSION['user_role']=$db_user_role;




  header('Location: ../admin/index.php');


 
  

 }
 else{

    header ('Location: ../index.php');
 }
 







}







?>