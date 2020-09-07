<?php

session_start();
// initializing variables
$username = "";
$email    = "";
$errors = array();
$errors1 = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', 'root', 'registration');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $password = md5($password_1);//encrypt the password before saving in the database

    $query = "INSERT INTO users (username, email, password) 
          VALUES('$username', '$email', '$password')";
    mysqli_query($db, $query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: details_form.php');
  }
}

if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
    array_push($errors1, "Username is required");
  }
  if (empty($password)) {
    array_push($errors1, "Password is required");
  }

  if (count($errors1) == 0) {
    $password = md5($password);
    $query1 = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $results = mysqli_query($db, $query1);
    if (mysqli_num_rows($results) == 1) {
      $_SESSION['username'] = $username;
      $_SESSION['success'] = "You are now logged in";
      header("Location: details_form.php");
    }else {
      array_push($errors1, "Wrong username/password combination");
    }
  }
}

mysqli_close($db);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Document</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
<img class='navbar-band' src="images/todo.png" height='60px' width='120px' alt="">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">

  </div>
</nav>

<div class="col-12">
    <div class="container login-container">
        <div class="row">
            <div class="col-md-6 login-form-1">
                <h3>Register Here.</h3> 
                <form method="post">
                  <?php include('errors.php'); ?>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Username *" name="username" value="" />
                    </div>

                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email *" name="email" value=""  />
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" name="password_1"/>
                    </div>

                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Confirm Password *" name="password_2" />
                    </div>

                    <div class="form-group" >
                        <input type="submit" class="btnSubmit" value="Sign Up" name="reg_user"/>

                    </div>
                </form>
            </div>
            <div class="col-md-6 login-form-2">
                <h3>Login Here.</h3>
                <form method="post">
                  <?php include('errors1.php'); ?>

                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your Username *" name="username" />   
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Your Password *" name="password"/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btnSubmit" value="Login" name="login_user"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  

</body>
</html>