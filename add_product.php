<?php
//   echo '<script>alert("ok 1")</script>';  
  session_start();
  require_once "config.php";
//   echo '<script>alert("ok 2")</script>';  
  
if(isset($_POST["addproduct"])){
    // echo '<script>alert("ok 3")</script>';  

    $product_category = mysqli_real_escape_string($conn, $_POST["p_category"]);  
    $product_name = mysqli_real_escape_string($conn, $_POST["p_name"]);
    $product_price = mysqli_real_escape_string($conn, $_POST["p_price"]);  
    $product_image = mysqli_real_escape_string($conn, $_POST['p_image']);

   
       $query = "INSERT INTO product (p_category, p_name,  p_price, p_image) VALUES('$product_category', '$product_name', '$product_price', '$product_image')";  
       if(mysqli_query($conn, $query))  
       {  
            echo '<script>alert("Product added sucessfully")</script>';  
       } 
       else
      {
       echo '<script>alert("Product not added ")</script>';  
      }
     
}
   
   
   ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product - FLYSTORE</title>
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

    #hidebox {
        animation-duration: 2s;
        animation-timing-function: ease-in-out;
        animation-delay: 0s;
        /* animation-iteration-count: 2; */
        animation-name: slideInLeft;
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

.form-control {
    padding: 1rem 0.75rem;
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
                    <li class="dropdown"><a href="#"><span>Categories</span></a>
                        <ul>
                            <li><a href="">1. Clothing</a></li>
                            <li><a href="">2. Food</a></li>
                            <li><a href="">3. Footwear</a></li>
                            <li><a href="">4. Electronics</a></li>
                            <li><a href="">5. Home-Appliances</a></li>
                            <li><a href="">6. Mobiles</a></li>
                            <li><a href="">7. Grocery</a></li>
                            <li><a href="">8. Cosmetics</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="#"><span>Features</span></a>
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

    <div class="container my-2" id="hidebox">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card border-0 shadow rounded-3 cntbox">
                    <div class="card-body p-4 p-sm-5">
                        <!-- <h5 class="card-title text-center mb-5 fw-light fs-5">Register</h5> -->
                        <h3 class="display-4 fw-normal mb-5">Add products</h3>
                        <form method="post">

                            <div class="form-group mb-3">
                                <select id="inputState" class="form-control" name="p_category">
                                    <option selected>Category</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                    <!-- <option>8</option> -->
                                </select>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" placeholder="name"
                                    name="p_name">
                                <label for="floatingInput">Product Name</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="name" class="form-control" id="floatingInput" placeholder="price"
                                    name="p_price">
                                <label for="floatingInput">Product price</label>
                            </div>
                            <label class="upload-group">
                                <input type="file" class="upload-group my-3" name="p_image">
                            </label>
                            <div class="d-grid my-4">
                                <input type="submit" name="addproduct" value="ADD PRODUCT" class="btn btn-primary"
                                    style="    background: #212529;
    color: white;
    margin-top: -7px;
    border-color: black;" />

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>



</body>

</html>