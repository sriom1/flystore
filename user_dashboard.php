
<?php  
 //entry.php  
 session_start();  

//  if(!isset($_SESSION["username"]))  
//  {  
//       // header("location:index.html?action=login");  
//  }  
 ?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - FLYSTORE</title>
  <!-- <link rel="icon" href="files/Images/icon2.png"> -->
  <!-- <link rel="stylesheet" href="kachra.css"> -->
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


  <link href="assets/css/dashboard_css.css" rel="stylesheet">
  <!-- <link href="only_navbar.css" rel="stylesheet"> -->

  <style>
    body {
  background-image: url(assets/img/bg.jpg);
  height: 100%;
  /* background-repeat: repeat; */
  background-size:cover;
  font-family: "Open Sans", sans-serif;
  color: #444444;

}
  </style>
</head>

<body>
  <header id="header" class="fixed-top d-flex align-items-center bg-dark">
    <div class="container d-flex align-items-center justify-content-between">

        <h1 class="logo"><a href="index.html">FLYSTORE</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href=index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>

              <li><a class="nav-link scrollto active" href="user_dashboard.php"><?php echo $_SESSION['username']?></a></li>
                
                <li class="dropdown"><a href="#"><span>Categories</span></a>
                    <ul>
                        <li><a href="product_per_cat.php?cat=1">Clothing</a></li>
                        <li><a href="product_per_cat.php?cat=2">Food</a></li>
                        <li><a href="product_per_cat.php?cat=3">Footwear</a></li>
                        <li><a href="product_per_cat.php?cat=4">Electronics</a></li>
                        <li><a href="product_per_cat.php?cat=5">Home appliances</a></li>
                        <li><a href="product_per_cat.php?cat=6">Mobiles</a></li>
                        <li><a href="product_per_cat.php?cat=7">Grocery</a></li>
                        <li><a href="product_per_cat.php?cat=8">Cosmetics</a></li>
                    </ul>
                </li>
                <li><a class="nav-link scrollto" href="cart.php">Cart</a></li>
                <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
  <div style="display:flex; flex-wrap: wrap; justify-content: space-around;">
    <div class="container1 " style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Clothing
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=1" class="btn btn-white"><img src="assets/img/clothing/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>

    <div class="container1 " style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Food
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=2" class="btn btn-white"><img src="assets/img/food/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
    
    <div class="container1 " style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Footwear
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=3" class="btn btn-white"><img src="assets/img/footwear/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>

    <div class="container1 " style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Electronics
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=4" class="btn btn-white"><img src="assets/img/electronics/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>

    <div class="container1" style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark  text-center">
          Home appliances
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=5" class="btn btn-white"><img src="assets/img/home appliances/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
    <div class="container1" style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Mobiles
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=6" class="btn btn-white"><img src="assets/img/mobiles/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
    <div class="container1" style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Grocery
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=7" class="btn btn-white"><img src="assets/img/grocery/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
    <div class="container1" style="width: 18rem;">
      <div class="card">
        <div class="card-header text-dark text-center">
          Cosmetics
        </div>
        <div class="card-body">
          <a href="product_per_cat.php?cat=8" class="btn btn-white"><img src="assets/img/cosmetics/pin.jpg" class="img-fluid"></a>
        </div>
      </div>
    </div>
  </div>




  <!-- <div class="container my-5">
        <div class="row">
          <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card border-0 shadow rounded-3 my-5">
              <div class="card-body p-4 p-sm-5">
                <h5 class="display-6 fw-normal mb-2">Join or Create Meeting</h5>
                <form>
                  <div class="d-grid my-2">
                      <button class="btn btn-dark col-12 alred" type="button"><a href="/eventsdashboard.html">Join Meeting</a></button>
                      <button class="btn btn-dark col-12 alred" type="button"> <a href="/host_meet.html">Create Meeting</a></button>
                  
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
     -->

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
    crossorigin="anonymous"></script>
  <script>
    const name = localStorage.getItem("USERNAME");
    document.getElementById('username1').innerHTML = "Welcome " + name + " !";
    document.getElementById('username2').innerHTML = name;
  </script>

</body>

</html>