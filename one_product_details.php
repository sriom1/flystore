<?php
    $count=1;
    session_start();
    require_once "config.php";
?>
<?php

$ip_add = getHostByName(getHostName());

if(isset($_GET['addtocart'])){

  $pid=$_GET["addtocart"];

      $use_id= $_SESSION["user_id"];
    
     $res=mysqli_query($conn,"select * from cart where pro_id='$pid' and user_id='$use_id' ");

     if(mysqli_num_rows($res)>0)
         echo "
        
         <script>
         alert('Product has already added into cart');
         window.location.href=history.back();
         </script>
         ";
     else{
       $sql="Insert into cart (pro_id,ip_address,user_id,qty) values('$pid','$ip_add','$use_id','1')";
      
      if(mysqli_query($conn,$sql)){
        echo "
      
        <script>
        alert(' Product added successfully into cart');
        window.location.href=history.back();
        </script>
        ";
       
      }
    }
   
  }
    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details - FLYSTORE</title>
    <!-- <link rel="icon" href="files/Images/icon2.png"> -->
    <link rel="stylesheet" href="assets/css/login_css.css">
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
    <script src="https://kit.fontawesome.com/8af7ca7311.js" crossorigin="anonymous"></script>
    <style>
    .setinline {
        display: inline;
        padding: 2rem;
        float: left;
        margin: 1rem;
        box-shadow: 0 0 20px 0px rgba(0, 0, 0, 0.1);
        transition: transform 0.5s;
    }

    .setinline:hover {
        transform: translateY(-10px);
    }

    .content1 {
        display: block;
        position: relative;
        white-space: nowrap;
        padding: 0px;
        margin: 0px;
        top: 0px;
    }

    .product-name a {
        text-decoration: none;
        color: black;
    }

    .rating i {
        color: #FFD700;
    }

    .container1 {
        margin-top: 100px;
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


    <link href="all_css/dashboard_css.css" rel="stylesheet">
</head>

<body>

<header id="header" class="fixed-top d-flex align-items-center bg-dark">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">FLYSTORE</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active"
                            href="user_dashboard.php"><?php echo $_SESSION['username']?></a></li>
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



    <?php 


  if(isset($_GET['p'])){
    $pid=$_GET['p'];


$res=mysqli_query($conn, "select * from product,category where p_category=cat_id and p_id='$pid' ");
if(mysqli_num_rows($res)>0){

  while($row=mysqli_fetch_array($res)){
      $pro_id    = $row['p_id'];
      $pro_cat   = $row['p_category'];
      $pro_title = $row['p_name'];
      $pro_price = $row['p_price'];
      $pro_image = $row['p_image'];

      $cat_name = $row['category_name'];
  }    
      echo "
    
      <div style='display:flex; flex-wrap: wrap; justify-content: space-around;'>
      <div class='setinline bg-white container1' style='text-align:center;'>
          <h2 class='product-price header-cart-item-info text-uppercase' style='color:red;font-size:28px;'>$cat_name</h2>
          <a href='product_details.php?p=1'></a>
          <div class='product'><a href='product_details.php?p=1'>
                  <div class='product-img'>
                      <img src='assets/img/$cat_name/$pro_image' style='max-height: 170px;' alt='$pro_title'>
                  </div>
              </a>
      
              <div class='product-body' style='text-align:center'>
      
                  <h5 class='product-name header-cart-item-name'><a href='product_details.php?p=1'>$pro_title</a>
                  </h5>
      
                  <div class='rating'>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star'></i>
                      <i class='fa fa-star-o'></i>
                  </div>
      
                  <h6 class='product-price header-cart-item-info' style='color:red;font-size:20px;'>&#x20B9; $pro_price</h6>
      
                  <div class='product-btns' style='text-align:center'>
      
      
                  </div>
              </div>
      
              <div class='add-to-cart' style='text-align:center;margin-top: 3px'>
                  <a href='one_product_details.php?addtocart=$pro_id'>
                      <button pid='$pro_id' id='product' class='btn btn-dark' href='#'><i
                              class='fa fa-shopping-cart'></i> Add To Cart</button>
                  </a>
              </div>
      
      
              <h4 class='product-price header-cart-item-info text-dark' style='margin-top:20px'>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit, <br>sed do eiusmod tempor incididunt ut
                  labore et dolore magna aliqua. Ut enim minim <br> ad veniam,quis nostrud exercitation ullamco
                  laboris nisi ut aliquip ex ea commodo consequat.
              </h4>
      
          </div>
      </div>
      
      
      </div>
      ";
  

}

  }
?>




    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>


    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

</body>

</html>