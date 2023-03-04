<?php
  
  $name = $_POST['fullname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $password = $_POST['password'];
  $confirmpass = $_POST['confirmpass'];

  //database connection

  /* $conn = new mysqli('localhost','root','','test');
  if($conn->connect_error){
    die('Connection failed :'.$conn->connect_error);
  }
  else{
    $succ = $conn->prepare('insert into user(fullname,email,phone,password,confirmpass) values(?,?,?,?,?)');
    $succ->bind_param("ssiss",$name,$email,$phone,$password,$confirmpass);
    $succ->close();
    $conn->close();
    header("location: login");
  }
 */

  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'root');
  define('DB_PASSWORD', '');
  define('DB_NAME', 'jobs');
 
   //Attempt to connect to MySQL database 
   $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
   // Check connection  $link === false
   if(mysqli_connect_error()){
      echo "connection error";
   }
   else{
    $succ = $link->prepare('insert into user(fullname,email,phone,password,confirmpass) values(?,?,?,?,?)');
    $succ->bind_param("ssiss",$name,$email,$phone,$password,$confirmpass);
    $succ->close();
    $link->close();
    header("location: login.php"); 
    // echo "connection success";
   }

?>