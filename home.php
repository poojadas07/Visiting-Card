<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header("Location: register.php");
    
  }
  
  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("Location: register.php");

  }

// connect to the database
$db = mysqli_connect("localhost", "root", "root", "registration");

$first_name = mysqli_real_escape_string($db , $_POST['first_name']);
$last_name = mysqli_real_escape_string($db , $_POST['last_name']);
$age = mysqli_real_escape_string($db , $_POST['age']);
$job = mysqli_real_escape_string($db , $_POST['job']);
$company = mysqli_real_escape_string($db , $_POST['company']);
$service1 = mysqli_real_escape_string($db , $_POST['service1']);
$service2 = mysqli_real_escape_string($db , $_POST['service2']);
$about = mysqli_real_escape_string($db , $_POST['about']);
$photo = mysqli_real_escape_string($db , $_POST['photo']);
$resume = mysqli_real_escape_string($db , $_POST['resume']);
$address = mysqli_real_escape_string($db , $_POST['address']);
$land_mark = mysqli_real_escape_string($db , $_POST['land_mark']);
$zip_code = mysqli_real_escape_string($db , $_POST['zip_code']);
$district = mysqli_real_escape_string($db , $_POST['district']);
$country = mysqli_real_escape_string($db , $_POST['country']);
$code = mysqli_real_escape_string($db , $_POST['code']);
$phone = mysqli_real_escape_string($db , $_POST['phone']);
$email = mysqli_real_escape_string($db , $_POST['email']);
$social_account_1 = mysqli_real_escape_string($db , $_POST['social_account_1']);
$social_account_2 = mysqli_real_escape_string($db , $_POST['social_account_2']); 
$social_account_3 = mysqli_real_escape_string($db , $_POST['social_account_3']); 
$social_account_4 = mysqli_real_escape_string($db , $_POST['social_account_4']); 

$query = "INSERT INTO form (first_name , last_name , age , job , company , service1 , service2, about , photo , resume , address , 

                            land_mark , zip_code , district , country , code , phone , email , social_account_1 , social_account_2 , social_account_3 , social_account_4) 
          VALUES('{$first_name}', '{$last_name}', '{$age}', '{$job}', '{$company}', '{$service1}', '{$service2}' , '{$about}', '{$photo}', '{$resume}', '{$address}', '{$land_mark}', '{$zip_code}', '{$district}', '{$country}', '{$code}', '{$phone}', '{$email}', '{$social_account_1}', '{$social_account_2}', '{$social_account_3}', '{$social_account_4}')";

mysqli_query($db , $query);

$query1 = "SELECT * FROM form";

if ($result = mysqli_query($db , $query1)) {

    while ($row = $result->fetch_assoc()) {
        $first_name = $row["first_name"];
        $last_name = $row["last_name"];
        $age = $row["age"];
        $job = $row["job"];
        $company = $row["company"];
        $service1 = $row["service1"];
        $service2 = $row["service2"];
        $about = $row["about"];
        $photo = $row["photo"];
        $resume = $row["resume"];
        $address = $row["address"];
        $land_mark = $row["land_mark"];
        $zip_code = $row["zip_code"];
        $district = $row["district"];
        $country = $row["country"];
        $code = $row["code"];
        $phone = $row["phone"];
        $email = $row["email"];
        $social_account_1 = $row["social_account_1"];
        $social_account_2 = $row["social_account_2"];
        $social_account_3 = $row["social_account_3"];
        $social_account_4 = $row["social_account_4"];
       
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Document</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
        
    </head>

<body>
   
    <div class="toast" data-autohide="false">

      <div class="toast-header">
        <strong class="mr-auto text-primary">
          <!-- notification message -->

          <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success">
              <h3  style="font-size: 1rem;">
                <?php 
                  echo $_SESSION['success']; 
                  unset($_SESSION['success']);
                ?>
              </h3>
            </div>
          <?php endif ?>

        </strong>
        
        <small class="text-muted">5 mins ago</small>
        <button type="button" class="ml-2 mb-1 close" data-dismiss="toast">&times;</button>
      </div>

      <div class="toast-body">
        <!-- logged in user information -->
        <?php  if (isset($_SESSION['username'])) : ?>
          <h6>Welcome <strong><?php echo $_SESSION['username']; ?></strong><br>
            <a href="register.php?logout='1'" style="color: red;">Logout</a> </h6>
        <?php endif ?>

      </div>
  </div>
  
  
    <div class="leftcol">
      <br>
      <?php echo '<img src="images/'.$photo.'" width="90%" height="50%">'; ?>
      <?php echo '<h2 class="p-3">'.$first_name.' '.$last_name.'<br />'; ?>
      <small style="font-size: 18px; color: #1B13C1;"> <?php echo $job ; ?> </small></h2>
      <p>
        <?php echo '<a href="mailto:'.$email.'" class="fa fa-envelope p-1" style="font-size: 24px; text-decoration: none; color: #000;" target="_blank"></a>'; ?>
        <?php echo '<a href="https://github.com/'.$social_account_1.'" class="fa fa-github p-1" style="font-size: 24px; text-decoration: none; color: #000;" target="_blank"></a>';?>
        <?php echo '<a href="https://www.instagram.com/'.$social_account_2.'" class="fa fa-instagram p-1" style="font-size: 24px; text-decoration: none; color: #000;" target="_blank"></a>'; ?>
        <?php echo '<a href="https://twitter.com/'.$social_account_4.'" class="fa fa-twitter p-1" style="font-size: 24px; text-decoration: none; color: #000;" target="_blank"></a>'; ?>
        <?php echo '<a href="https://www.linkedin.com/in/'.$social_account_3.'" class="fa fa-linkedin p-1" style="font-size: 24px; text-decoration: none; color: #000;" target="_blank"></a>'; ?>
      </p>
      <br>
      <hr>
      <div class="row">
          <?php echo '<a href="'.$resume.'" style="text-decoration: none; color: #000;" class="pl-5 ml-4" download>DOWNLOAD CV</a>'; ?>
          <div class="vl3">
            <?php echo '<a href="tel:'.$code.$phone.'" style="text-decoration: none; color: #000;" class="pl-5 ml-3">CONTACT ME</a>'; ?>
          </div> 
      </div>
      
    </div>
    <br>
    <div class="content second-content">

          <div class="container">
                
            <p style="font-size: 30px; font-weight: bold; margin: 35px; margin-left: 8%;">About Me</p>
            <hr>
            
            <div class="row">

              <div class="col-3 col-sm-3 col-md-5 ml-5 mr-5 mt-2 p-5">
                  
                  <?php echo '<p style="width: 300px;">'.$about.'</p>'; ?>
                  
              </div>
              
              <div class="col-12 col-sm-12 col-md-5"> 
                 
                      
                      <h6 class="right"><b style="background-color: #1B13C1; padding: 4px 8px; border-radius: 10%"> Age : </b>
                          <?php echo '<p style="float: right;">'.$age.'</p>'; ?>
                      </h6>

                      <hr>
                      <h6 class="right"><b style="background-color: #1B13C1; padding: 4px 8px; border-radius: 10%"> Country : </b>
                          <?php echo '<p style="float: right;">'.$country.'</p>'; ?>
                      </h6>

                      <hr>

                      <h6 class="right"><b style="background-color: #1B13C1; padding: 4px 8px; border-radius: 10%"> Address : </b>
                          <?php echo '<p style="float: right;">'.$district.' , '.$country.'</p>'; ?>
                      </h6>
                  
              </div>
                      
            </div>

            <hr>
            <br>
                    
            <p style="font-size: 30px; font-weight: bold; margin: 35px; margin-left: 8%;"> Experience </p>
            <hr>
            
            <div class="row">

              <div class="col-8 col-sm-4 col-md-4 ml-5 mr-5 pl-5">
                  <br>
                  <p class="p-2" style="border: 1px solid #1B13C1; color: #1B13C1; text-align: center;"> <b>Present</b> </p>
                  <h5><?php echo $job ; ?></h5>
                  <h6> <?php echo ' ---- '.$company ; ?> </h6>
                  <br>
                  <p style="width : 500px;" class="p">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
              </div>
                     
            </div>
            <hr>
            <br>

            <p style="font-size: 30px; font-weight: bold; margin: 35px; margin-left: 8%;">My Services</p>
            <hr>
            
            <div class="row">

              <div class="col-12 col-sm-12 col-md-4 ml-5 mr-5 pr-5">
                  <br>
                  <h5 style="width: 250px; text-align: center;"> <?php echo $service1 ; ?> </h5>
                  <br>
                  <p style="width: 250px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                        
              </div>

              <div class="col-12 col-sm-12 col-md-5"> 
                  
                      <h5 class="mx-5 my-3" style="width: 250px; text-align: center;"> <?php echo $service2 ; ?> </h5>
                      <br>
                      <p class="ml-5" style="width: 250px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                  
              </div>
                      
            </div>
            <hr>
              <br>

          </div>        
  </div>

        
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    
    <script>
      $(document).ready(function(){
        $('.toast').toast('show');
      });
    </script>

    
</body>
</html>
