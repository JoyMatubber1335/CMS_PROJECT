<?php
session_start();
include "db.php";

if(isset($_POST['login'])){
    echo "if";
    echo "<br>";
  echo   $username= $_POST['username'];
    echo "<br>";
   echo  $password=$_POST['password'];

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
    echo "<br>";
    echo "while";
    echo "<br>";
      $db_user_id=$row['user_id'];
     echo  $db_username=$row['username'];
     echo "<br>";
     echo  $db_user_password=$row['user_password'];
      $db_user_firstname=$row['user_firstname'];
      $db_user_lastname=$row['user_lastname'];
      $db_user_role=$row['user_role'];
      
 }
 if($username === $db_username or $password === $db_user_password)
 {
   

      
   //   header ('Location : );
  header('Location: ../admin/index.php');
 
  

 }
 else{

    header ('Location: ../index.php');
 }
 







}







?>