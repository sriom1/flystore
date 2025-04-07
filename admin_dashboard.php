<?php
    $count=1;
    session_start();
    require_once "config.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/8af7ca7311.js" crossorigin="anonymous"></script>
    <title>Admin - Flystore</title>
    <style>
        body {
            background-image: url(assets/img/bg.jpg);
            height: 100%;
            background-repeat: repeat;
            font-family: "Open Sans", sans-serif;
            color: #444444;

        }
        @keyframes slideInLeft {
            0% {
                transform: translateY(100%);
            }
            100% {
                transform: translateY(0);
            }
        }
        .container1 {
            animation-duration: 1s;
            animation-timing-function: ease-in-out;
            animation-delay: 0s;
            /* animation-iteration-count: 2; */
            animation-name: slideInLeft;
            margin-top: 9%;
        }
        @import url('https://fonts.googleapis.com/css2?family=Festive&display=swap');
/* font-family: 'Festive', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');
/* font-family: 'Varela Round', sans-serif; */
@import url('https://fonts.googleapis.com/css2?family=Comfortaa:wght@300&display=swap');
/* font-family: 'Comfortaa', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Satisfy&display=swap');
/* font-family: 'Satisfy', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Cookie&display=swap');
/* font-family: 'Cookie', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Baloo+2&display=swap');
/* font-family: 'Baloo 2', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap');
/* font-family: 'Great Vibes', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Fleur+De+Leah&display=swap');
/* font-family: 'Fleur De Leah', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Sacramento&display=swap');
/* font-family: 'Sacramento', cursive; */
@import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Mono:wght@200&display=swap');
/* font-family: 'Noto Sans Mono', monospace; */

* {
  margin: 0;
  padding: 0;
}


a {
  text-decoration: none;
  color: #054a85;
}

a:hover {
  color: #054a85;
  text-decoration: none;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: "Raleway", sans-serif;
}

#header {
  background: rgba(0, 0, 0, 0.1);
  /* transition: all 0.5s; */
  z-index: 997;
  height: 70px;
  /* top: 60px; */
}

#header.header-scrolled {
  background: rgba(5, 87, 158, 0.9);
  top: 0;
}

#header .logo {
  font-size: 30px;
  margin: 0;
  padding: 0;
  line-height: 1;
  font-weight: 400;
  letter-spacing: 2px;
  text-transform: uppercase;
}

#header .logo a {
  color: #fff;
  text-decoration: none;
}

#header .logo img {
  max-height: 40px;
}


/*--------------------------------------------------------------
  # Navigation Menu
  --------------------------------------------------------------*/
/**
  * Desktop Navigation 
  */
.navbar {
  padding: 0;
}

.navbar ul {
  margin: 0;
  padding: 0;
  display: flex;
  list-style: none;
  align-items: center;
}

.navbar li {
  position: relative;
}

.navbar>ul>li {
  position: relative;
  white-space: nowrap;
  padding: 10px 0 10px 24px;
}

.navbar a,
.navbar a:focus {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 3px;
  font-size: 14px;
  color: rgba(255, 255, 255, 0.7);
  white-space: nowrap;
  transition: 0.3s;
  position: relative;
}

.navbar a i,
.navbar a:focus i {
  font-size: 12px;
  line-height: 0;
  margin-left: 5px;
}

.navbar>ul>li>a:before {
  content: "";
  position: absolute;
  width: 100%;
  height: 2px;
  bottom: -5px;
  left: 0;
  background-color: #ffffff;
  visibility: hidden;
  width: 0px;
  transition: all 0.3s ease-in-out 0s;
}

.navbar a:hover:before,
.navbar li:hover>a:before,
.navbar .active:before {
  visibility: visible;
  width: 100%;
}

.navbar a:hover,
.navbar .active,
.navbar .active:focus,
.navbar li:hover>a {
  color: #fff;
}

.navbar .dropdown ul {
  display: block;
  position: absolute;
  left: 14px;
  top: calc(100% + 30px);
  margin: 0;
  padding: 10px 0;
  z-index: 99;
  opacity: 0;
  visibility: hidden;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
  transition: 0.3s;
  border-radius: 8px;
}

.navbar .dropdown ul li {
  min-width: 200px;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 500;
  text-transform: none;
  color: #032e54;
}

.navbar .dropdown ul a i {
  font-size: 12px;
}

.navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #b44040;
}

.navbar .dropdown:hover>ul {
  opacity: 1;
  top: 100%;
  visibility: visible;
}

.navbar .dropdown .dropdown ul {
  top: 0;
  left: calc(100% - 30px);
  visibility: hidden;
}

.navbar .dropdown .dropdown:hover>ul {
  opacity: 1;
  top: 0;
  left: 100%;
  visibility: visible;
}

@media (max-width: 1366px) {
  .navbar .dropdown .dropdown ul {
    left: -90%;
  }

  .navbar .dropdown .dropdown:hover>ul {
    left: -100%;
  }
}

/**
  * Mobile Navigation 
  */
.mobile-nav-toggle {
  color: #fff;
  font-size: 28px;
  cursor: pointer;
  display: none;
  line-height: 0;
  transition: 0.5s;
}

.mobile-nav-toggle.bi-x {
  color: #fff;
}

@media (max-width: 991px) {
  .mobile-nav-toggle {
    display: block;
  }

  .navbar ul {
    display: none;
  }
}

.navbar-mobile {
  position: fixed;
  overflow: hidden;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  background: #7453538a;
  transition: 0.3s;
  z-index: 999;
}

.navbar-mobile .mobile-nav-toggle {
  position: absolute;
  top: 15px;
  right: 15px;
}

.navbar-mobile ul {
  display: block;
  position: absolute;
  top: 55px;
  right: 15px;
  bottom: 15px;
  left: 15px;
  padding: 10px 0;
  border-radius: 10px;
  background-color: #ffddddeb;
  overflow-y: auto;
  transition: 0.3s;
}

.navbar-mobile>ul>li {
  padding: 0;
}

.navbar-mobile a,
.navbar-mobile a:focus {
  padding: 10px 20px;
  font-size: 20px;
  color: #b44040;
}

.navbar-mobile a:hover:before,
.navbar-mobile li:hover>a:before,
.navbar-mobile .active:before {
  visibility: hidden;
}

.navbar-mobile a:hover,
.navbar-mobile .active,
.navbar-mobile li:hover>a {
  color: #000000;
}

.navbar-mobile .getstarted,
.navbar-mobile .getstarted:focus {
  margin: 15px;
}

.navbar-mobile .dropdown ul {
  position: static;
  display: none;
  margin: 10px 20px;
  padding: 10px 0;
  z-index: 99;
  opacity: 1;
  visibility: visible;
  background: #fff;
  box-shadow: 0px 0px 30px rgba(127, 137, 161, 0.25);
}

.navbar-mobile .dropdown ul li {
  min-width: 200px;
}

.navbar-mobile .dropdown ul a {
  padding: 10px 20px;
}

.navbar-mobile .dropdown ul a i {
  font-size: 12px;
}

.navbar-mobile .dropdown ul a:hover,
.navbar-mobile .dropdown ul .active:hover,
.navbar-mobile .dropdown ul li:hover>a {
  color: #f6b024;
}

.navbar-mobile .dropdown>.dropdown-active {
  display: block;
}

.alred a {
  text-decoration: none;
  color: #054a85;
}

.alred a :visited {
  text-decoration: none;
  color: #04294a;

}

@media (max-width: 1193px) {
    .container1{
      margin-top: 20%;
    }
  }
  @media (max-width: 1040px) {
    .container1{
      margin-top: 22%;
    }
  }
  @media (max-width: 935px) {
    .container1{
      margin-top: 24%;
    }
  }
  @media (max-width: 735px) {
    .container1{
      margin-top: 26%;
    }
  }
  @media (max-width: 525px) {
    .container1{
      margin-top: 30%;
    }
  }
  @media (max-width: 480px) {
    .container1{
      margin-top: 34%;
    }
  }

  a{
      text-decoration:none;
      font-family: "Open Sans", sans-serif;
    }
    .navbar .dropdown ul a:hover,
.navbar .dropdown ul .active:hover,
.navbar .dropdown ul li:hover>a {
  color: #b44040;
}

.navbar .dropdown ul a {
  padding: 10px 20px;
  font-size: 14px;
  font-weight: 500;
  text-transform: none;
  color: #212529;
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
                <li><a class="nav-link scrollto active"
                            href="admin_dashboard.php"><?php echo $_SESSION['username']?></a></li>
                    
                    <li class="dropdown"><a href="#"><span>Features</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="add_product.php">Add Products</a></li>
                            <li><a href="product_details.php">Product List</a></li>
                            <li><a href="order_details.php">Order Details</a></li>
                        </ul>
                    </li>
                    <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header>
    <section class="jumbotron text-center my-5 ">
        <div class="container1 boxtr">
          <h1 class="jumbotron-heading " id="username1"></h1>
          <p class="lead display-4" style="color:white">Hello Admin.</p>
          <p>
            <a href="add_product.php" class="btn btn-dark my-2" style="background-color: #b44040;">Add Products</a>
            <a href="product_details.php" class="btn btn-dark my-2" style="background-color: #b44040;">Product List</a>
            <a href="order_details.php" class="btn btn-dark my-2" style="background-color: #b44040;">Order Details</a>
          </p>
        </div>
      </section>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>