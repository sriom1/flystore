<?php  
session_start();
require_once "config.php";
?>

<?php
$usr_id=$_SESSION['user_id'];

if(isset($_GET['id'])){
  $p_id=$_GET['id'];
 
  $sql=mysqli_query($conn,"Delete from cart where pro_id='$p_id' and user_id='$usr_id'");
if($sql){
         echo "
         <script>
         alert('Item is removed successfully');
         window.location.href='cart.php';
         
         
         
         </script>";
         
  }
  else{
    echo "
    <script>
    alert('not removed ');
   
    
    
    </script>";
  }

}

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
    <title>Cart - Flystore</title>

    <link href="assets/css/cart_css.css" rel="stylesheet">

    <style>
        body {
        background-image: url(assets/img/bg.jpg);
        height: 100%;
        background-repeat: repeat;
        font-family: "Open Sans", sans-serif;
        color: #444444;

    }
    </style>

    
</head>

<body>
<header id="header" class="fixed-top d-flex align-items-center bg-dark">
        <div class="container d-flex align-items-center justify-content-between">

            <h1 class="logo"><a href="index.html">FLYSTORE</a></h1>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active"
                            href="user_dashboard.php"><?php echo $_SESSION['username']?></a></li>
                    <li class="dropdown"><a href="#"><span>Categories</span> <i class="bi bi-chevron-down"></i></a>
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

    <div class='container23 text-light'>Shopping Cart</div>
    <section class="h-100">
        <div class="container1 h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <!-- <h3 class="fw-normal mb-0 text-dark">Shopping Cart</h3> -->
                    </div>

                    <!-- add php here -->

                    <?php

            // require_once "config.php";
            $code = $_SESSION['user_id'];
           $total=0;
             $res=mysqli_query($conn,"select * from product,cart,category where pro_id=p_id and cat_id=p_category");
             if(mysqli_num_rows($res)>0){

                    

                    while($row=mysqli_fetch_array($res)){
                             
                        $pro_name=$row['p_name'];
                        $pro_image=$row['p_image'];
                        $pro_price=$row['p_price'];
                        $p_id=$row['pro_id'];
                        $pro_cat= $row['category_name'];
                        $userid= $row['user_id'];


                      
                         if($_SESSION['user_id']==$userid){
                            $total+=$pro_price;
                            $_SESSION['totalAmt']= $total;
                        echo "
                        <div class='card rounded-3 mb-4'>
    <div class='card-body p-4'>
        <div class='row d-flex justify-content-between align-items-center'>
            <div class='col-md-2 col-lg-2 col-xl-2'>
                <img src='assets/img/$pro_cat/$pro_image'
                    class='img-fluid rounded-3' alt='$pro_name'>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-3'>
                <p class='lead fw-normal mb-2 text-center'>$pro_name</p>
            </div>
            <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                <button class='btn btn-link px-2'
                    onclick='this.parentNode.querySelector('input[type=number]').stepDown()'>
                </button>

                <input id='form1' min='0' name='quantity' value='1' type='number'
                    class='form-control form-control-sm' />

                <button class='btn btn-link px-2'
                    onclick='this.parentNode.querySelector('input[type=number]').stepUp()'>
                </button>
            </div>
            <div class='col-md-3 col-lg-2 col-xl-2 offset-lg-1'>
                <h5 class='mb-0'>&#x20B9; $pro_price</h5>
            </div>
            <div class='col-md-1 col-lg-1 col-xl-1 text-end'>
                <a href='cart.php?id=$p_id' class='text-danger'><i class='fas fa-trash fa-lg'></i></a>
            </div>
        </div>
    </div>
</div>
                       
                        
                        ";
                         } 
                    }
                   
                    echo " 
                    <div align='center'>
                            <h3 class='text-light'>Total Amount:&#x20B9; $total
              
                           </h3>
                            
                    </div>
                   
                    ";  
                  

             }
             ?>

                    <div class="card mx-auto" style="width: 15rem;">
                        <div class="card-body mx-auto">
                          <a href="payment.php"><button type="button" class="btn btn-dark btn-block btn-lg">Proceed to Pay</button></a>
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>