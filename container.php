<?php


// initializing variables
  
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'jobs');

// REGISTER USER
if (isset($_POST['register'])) {
  session_start();
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['fullname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $phone = mysqli_real_escape_string($db, $_POST['phone']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password']);
  $password_2 = mysqli_real_escape_string($db, $_POST['confirmpass']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords doesn't matched");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE fullname='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	/* $password = md5($password_1);//encrypt the password before saving in the database*/
  	$query = "INSERT INTO user (fullname, email, phone,password,confirmpass) 
  			  VALUES('$username', '$email', '$phone','$password_1','$password_2')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "please log in";
    echo 'Successfull login';
  	header('location: login.php');
  }
}


// login
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  	$query = "SELECT * FROM user WHERE email='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: career.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  
}

//index page
if (isset($_POST['index'])) {
  $cname=mysqli_real_escape_string($db, $_POST['cname']);
  $position=mysqli_real_escape_string($db, $_POST['position']);
  $jdesc=mysqli_real_escape_string($db, $_POST['jdesc']);
  $skills=mysqli_real_escape_string($db, $_POST['skills']);
  $location=mysqli_real_escape_string($db, $_POST['location']);
  $ctc=mysqli_real_escape_string($db, $_POST['ctc']);

  $query = "INSERT INTO JOBS(cname,position,jdesc,skills,location,ctc)
              VALUES('$cname','$position','$jdesc','$skills','$location','$ctc')";
  	$results = mysqli_query($db, $query);
    if($results){
      echo "success";
    }
    else{
      echo "Failed to post";
    }
}

//career page

function CallME(){
  $db = mysqli_connect('localhost', 'root', '', 'jobs');
  $queri = "SELECT * FROM jobs";
    $result = mysqli_query($db, $queri);
    if($result){
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $row;
    }
    else{
      return "Failed to get data";
    }
}

//candidates


if (isset($_POST['candidates'])) {
  $name=mysqli_real_escape_string($db, $_POST['name']);
  $email=mysqli_real_escape_string($db, $_POST['email']);
  $position=mysqli_real_escape_string($db, $_POST['position']);
  $passout=mysqli_real_escape_string($db, $_POST['passout']);

  $query = "INSERT INTO CANDIDATES(name,email,position,passout)
              VALUES('$name','$email','$position','$passout')";
  	$results = mysqli_query($db, $query);
    if($results){
      unset($_REQUEST["name"]);
      unset($_REQUEST["email"]);
      unset($_REQUEST["position"]);
      unset($_REQUEST["passout"]);
      header('location: career.php');
    }
    else{
      echo "Failed to post";
    }
}


function CallME2(){
  $db = mysqli_connect('localhost', 'root', '', 'jobs');
  $queri = "SELECT * FROM candidates";
    $result = mysqli_query($db, $queri);
    if($result){
      $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
      return $row;
    }
    else{
      return "Failed to get data";
    }
}

?>

<!--  https://codewithawa.com/posts/complete-user-registration-system-using-php-and-mysql-database -->
