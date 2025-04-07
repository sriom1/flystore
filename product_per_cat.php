<?php  
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
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <?php
     require_once "config.php";

     if(isset($_GET['cat'])){
       $cat_id=$_GET['cat'];
   
   
       $res1= mysqli_query($conn,"select category_name from category where cat_id=$cat_id"); 
       while($row1=mysqli_fetch_array($res1)){
           
           $cat_name = $row1['category_name'];
       }  
       
       echo "<title>$cat_name - Flystore</title>";

    }
    ?>

    
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- <link href="assets/img/favicon.png" rel="icon"> -->
    <!-- <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

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


    <link href="assets/css/product_per_cat_css.css" rel="stylesheet">

    <style>
    body {
        background-image: url(assets/img/bg.jpg);
        height: 100%;
        background-repeat: repeat;
        font-family: "Open Sans", sans-serif;
        color: #444444;

    }
    .container23{
        margin-top: 100px;
    text-align: center;
    text-transform: uppercase;
    color: white;
    font-size: 38px;
    }
    </style>



</head>

<body>


    <!-- ======= Header ======= -->
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
     require_once "config.php";

     if(isset($_GET['cat'])){
       $cat_id=$_GET['cat'];
   
   
       $res1= mysqli_query($conn,"select category_name from category where cat_id=$cat_id"); 
       while($row1=mysqli_fetch_array($res1)){
           
           $cat_name = $row1['category_name'];
       }  
       
       echo "<div class='container23'>$cat_name</div>";

    }
    ?>

    <div style="display:flex; flex-wrap: wrap; justify-content: space-around; margin-top: 91px;">

        <?php
      
          //date
          require_once "config.php";

          if(isset($_GET['cat'])){
            $cat_id=$_GET['cat'];
        
        
            $res1= mysqli_query($conn,"select category_name from category where cat_id=$cat_id"); 
            while($row1=mysqli_fetch_array($res1)){
                
                $cat_name = $row1['category_name'];
            }  
            
            // echo "<div>$cat_name</div>";
            $res= mysqli_query($conn,"select * from product where p_category=$cat_id"); 
          if(mysqli_num_rows($res)>0){
           
              while($row=mysqli_fetch_array($res)){
                  
                     $pid=$row['p_id'];
                     $car=$row['p_category'];
                     $name=$row['p_name'];
                     $price=$row['p_price'];
                     $img=$row['p_image'];
                     
              echo"
              <div class='setinline bg-white my-4 container1 'style='width:18rem;text-align:center;padding: 12px;'>
              <a href='one_product_details.php?p=$pid'>
                  <div class='product-img'>
                      <img src='assets/img/$cat_name/$img' style='max-height: 170px;' alt=$car>
                  </div>
              </a>
              <div style='text-align:center'>
                  <h5 class='product-name header-cart-item-name'><a href='one_product_details.php?p=$pid'> $name</a></h5>
                  <div class='rating'>
                      <i class='fa fa-star' style='color:#e2ac6c'></i>
                      <i class='fa fa-star' style='color:#e2ac6c'></i>
                      <i class='fa fa-star' style='color:#e2ac6c'></i>
                      <i class='fa fa-star' style='color:#e2ac6c'></i>
                      <i class='fa fa-star-o' style='color:#e2ac6c'></i>
                  </div>
                  <h6 class='header-cart-item-info' style='color:#e25a5e;font-size:20px;'>&#x20B9; $price</h6>
              </div>
              <div style='text-align:center;margin-top: 3px'>
                  <a href='product_per_cat.php?addtocart=$pid'>
                      <button pid=$pid id='product' class='btn btn-dark'><i class='fa fa-shopping-cart'></i>
                          Add To
                          Cart</button>
                  </a>
              </div>
            </div>
              
            
              
              ";

              }
              
          }
        }

             ?>
    </div>


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
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/8af7ca7311.js" crossorigin="anonymous"></script>


</body>

</html>