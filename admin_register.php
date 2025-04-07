<?php
require_once "config.php";


$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST"){
  // echo '<script>alert("FFF")</script>';

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
        // echo '<script>alert("Username cannot be blank")</script>';
        header("location: admin_register.php");
        // exit;
    }
    else{
        $sql = "SELECT admin_id FROM admin WHERE adm_name = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if($stmt)
        {
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set the value of param username
            $param_username = trim($_POST['username']);

            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1)
                {
                    $username_err = "This username is already taken"; 
                    echo '<script>alert("Username already taken")</script>';
                }
                else{
                    $username = trim($_POST['username']);
                    // echo '<script>alert("Username Done")</script>';
                }
            }
            else{
                // echo "Something went wrong";
                echo '<script>alert("Something went wrong")</script>';
            }
        }
    }

    mysqli_stmt_close($stmt);


// Check for password
if(empty(trim($_POST['password']))){
    $password_err = "Password cannot be blank";
    // echo '<script>alert("Password cannot be blank")</script>';
}
elseif(strlen(trim($_POST['password'])) < 5){
    $password_err = "Password cannot be less than 5 characters";
    echo '<script>alert("Password cannot be less than 5 characters")</script>';
}
else{
    $password = trim($_POST['password']);
}

// Check for confirm password field
if(trim($_POST['password']) !=  trim($_POST['confirm_password'])){
    $password_err = "Passwords should match";
    echo '<script>alert("Passwords should match")</script>';
}


// If there were no errors, go ahead and insert into the database
if(empty($username_err) && empty($password_err) && empty($confirm_password_err))
{
    $sql = "INSERT INTO admin (adm_name, adm_pass) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    if ($stmt)
    {
        mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);

        // Set these parameters
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);

        // Try to execute the query
        if (mysqli_stmt_execute($stmt))
        {
            header("location: admin_login.php");
        }
        else{
            // echo "Something went wrong... cannot redirect!";
            echo '<script>alert("Something went wrong... cannot redirect!")</script>';
        }
    }
    mysqli_stmt_close($stmt);
}
mysqli_close($conn);
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Flystore</title>
    <!-- <link rel="icon" href="files/Images/icon2.png"> -->
    <link rel="stylesheet" href="assets/css/register_css.css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <style>
      @keyframes slideInLeft {
            0% {
                transform: translateY(100%);
                opacity: 0;
            }

            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .container1 {
            animation-duration: 2s;
            animation-timing-function: ease-in-out;
            animation-delay: 0s;
            /* animation-iteration-count: 2; */
            animation-name: slideInLeft;
        }
    </style>
</head>
<body>
<header id="header" class="fixed-top d-flex align-items-center bg-dark">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">FLYSTORE</a></h1>
            <nav id="navbar" class="navbar">
                <!-- <i class="bi bi-list mobile-nav-toggle"></i> -->
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->

    <div class="container my-5 container1">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 cntbox">
              <div class="card-body p-4 p-sm-5">
                <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5> -->
                <h5 class="display-6 fw-normal mb-2">Admin Register</h5>
                <form action="" method="post">
                  <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                    <label for="username">Username</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
                    <label for="email">Email address</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="psw" placeholder="Password" name="password">
                    <label for="psw">Password</label>
                  </div>
                  <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="cpsw" placeholder="Password" name="confirm_password">
                    <label for="cpsw">Confirm password</label>
                  </div>
    
                  <h6 class="form-floating mb-3 alred">Already have an account? <a href="admin_login.php">Login</a> </h6>
    
                  <div class="d-grid my-2">
                    <button class="btn btn-dark btn-login text-uppercase fw-bold" type="submit"
                      id="registerData">Register</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>
</html>