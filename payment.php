<?php
    $count=1;
    session_start();
    require_once "config.php";
?>
<?php


$use_id=$_SESSION['user_id'];

$totalAmt=$_SESSION['totalAmt'];

if ($_SERVER['REQUEST_METHOD'] == "POST")
{
    $Add = mysqli_real_escape_string($conn, $_POST["street_address"]);  
    $city = mysqli_real_escape_string($conn, $_POST["city"]);  
    $state = mysqli_real_escape_string($conn, $_POST["state"]);
    $country = mysqli_real_escape_string($conn, $_POST["country"]);  
    $landmark = mysqli_real_escape_string($conn, $_POST["landmark"]);  
    $postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);
    

    $first = mysqli_real_escape_string($conn, $_POST["first_name"]);
    $second = mysqli_real_escape_string($conn, $_POST["last_name"]);
    $name =$first.' '.$second;

    $_SESSION['card_holder_name']=$name;

    $cardno = mysqli_real_escape_string($conn, $_POST["credit_card_number"]);

    // $month = mysqli_real_escape_string($conn, $_POST["month"]);
    $month =trim($_POST['month']);
    $year =trim($_POST['year']);
    // $year = mysqli_real_escape_string($conn, $_POST["year"]);

    $exdate=$month.'/'.$year;
    // $cvv = mysqli_real_escape_string($conn, $_POST["csc"]);
    $cvv =trim($_POST['csc']);
    $_SESSION["Add1"]= $Add.' '.$landmark.', '.$city;
    $_SESSION["Add2"]  = ' -'.$postcode.' ('.$state.') '.$country;

    $Address=$Add.' '.$landmark.', '.$city .' -'.$postcode.' ('.$state.') '.$country;
    $_SESSION['Add']=$Address;
    $fname = mysqli_real_escape_string($conn, $_POST["first_name"]);
    
    $password=rand();
    $tran_id = password_hash($password, PASSWORD_DEFAULT);

    $or_date= gmdate(DATE_RFC822);
    
    $query=mysqli_query($conn,"INSERT INTO order_info (user_Id,total_Amt,card_holder_name,credit_card_no,exp_date,cvv,Shipping_Add,order_date) VALUES ('$use_id','$totalAmt','$name','$cardno','$exdate','$cvv','$Address','$or_date')");

    if($query)  echo "Query has been successfully inserted";

    $res="Select * from order_info ORDER BY odr_Id DESC LIMIT 1";
    $re=mysqli_query($conn,$res);
    while($row= mysqli_fetch_array($re)){
        $or_id= $row['odr_Id'] ;
    }

    $res="Select * from order_info ORDER BY odr_Id DESC LIMIT 1";
    $re=mysqli_query($conn,$res);


    while($row= mysqli_fetch_array($re)){

        $number= $row['credit_card_no'] ;
        $no=strlen($number);

        if($no>=20){
            echo "<script> alert('Invalid Card Number') </script>";
        }
        else{


            $sql="INSERT INTO `order_table` (user_id,tran_id,order_status) VALUES ('$use_id','$tran_id','Active')";

            mysqli_query($conn,$sql);
            
            $res=mysqli_query($conn,"select * from cart where user_id='$use_id'");

    
            if(mysqli_num_rows($res)>0){
                while($row=mysqli_fetch_array($res)){
                    $pro_id=$row['pro_id'];
                    $qty=$row['qty'];
                
                    $sql="INSERT INTO `ordered_products` (ordr_id,product_id,usr_id,qty) VALUES ('$or_id','$pro_id','$use_id','$qty')";
                        
                    if(!mysqli_query($conn,$sql))
                    echo "<script>alert('order is not placed')</script>";
                }
    
            }

            echo "<script> 
            alert('Your Payment successfully done');
            alert('Congrats!! Your order is placed');
            window.location.href='user_dashboard.php';
            </script>"; 
            $count++;
        }
            
    }
    mysqli_query($conn,"delete from cart where user_id='$use_id'");

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment - Flystore</title>
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
        animation-name: none;
        margin-top: -51px;
    }

    a {
        text-decoration: none;
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

    <div class="container my-5 ">
        <div class="row container1">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto ">
                <div class="card border-0 shadow rounded-3 cntbox">
                    <div class="card-body p-4 p-sm-5 ">
                        <h5 class="display-6 fw-normal mb-3">ADDRESS</h5>
                        <form action="" method="post">

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="street_address" placeholder="Username"
                                    name="street_address">
                                <label for="street_address">Street Address</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="city" placeholder="Username" name="city">
                                <label for="">City</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="state" placeholder="Username" name="state">
                                <label for="">State</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="country" placeholder="Username"
                                    name="country">
                                <label for="">Country</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="landmark" placeholder="Username"
                                    name="landmark">
                                <label for="">Landmark</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="postcode" placeholder="Username"
                                    name="postcode">
                                <label for="">Pincode</label>
                            </div>

                            <h5 class="display-6 fw-normal my-4 font-weight-bold">PAYMENT</h5>
                            <h5 class="display-8 fw-normal mb-2">Pay with Credit Card</h5>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="first_name" placeholder="Username"
                                    name="first_name">
                                <label for="first_name">First Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="last_name" placeholder="Username"
                                    name="last_name">
                                <label for="last_name">Last Name</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="credit_card_number" placeholder="Username"
                                    name="credit_card_number">
                                <label for="credit_card_number">Credit Card Number</label>
                            </div>

                            <div class="row">
                                <div class="form-floating mb-3 col">
                                    <input type="text" class="form-control" id="month" placeholder="Username"
                                        name="month">
                                    <label for="month">Expiration month</label>
                                </div>
                                <div class="form-floating mb-3 col">
                                    <input type="text" class="form-control" id="year" placeholder="Username"
                                        name="year">
                                    <label for="year">Expiration year</label>
                                </div>
                            </div>


                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="csc" placeholder="Username" name="csc">
                                <label for="csc">CVV</label>
                            </div>


                            <div class="d-grid my-4">
                                <button class="btn btn-dark btn-login text-uppercase fw-bold" type="submit"
                                    id="registerData">MAKE payment</button>
                            </div>
                            <div class="d-grid my-4">
                                <a href="cart.php" class="mx-auto"><button class="btn btn-danger btn-login text-uppercase fw-bold"
                                        type="button" id="registerData">cancel</button></a>

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