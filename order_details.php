<?php
  session_start();
  require_once "config.php";
   
   
   ?>
 <?php


if( isset($_POST['status'])){

    $st=mysqli_real_escape_string($conn, $_POST["status"]);
    $_SESSION['st']=$st;
    echo "<script>alert('$st')</script>";
}
   
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Oreder Details - FLYSTORE</title>
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
    /* body{
        background-image:none;
    } */
    a {
        text-decoration: none;
    }

    .table-container {
        padding: 32px;
        font-family: "Roboto", sans-serif;
        margin-right: 100px;
        margin-left: 100px;
    }

    .table-container h2.table-heading {
        text-align: center;
        text-transform: uppercase;
        font-size: 24px;
        margin-bottom: 32px;
        border-bottom: 1px solid #eee;
        padding-bottom: 8px;
    }

    .table-container table {
        width: 100%;
        background: #54644;
        color: lightgrey;
        padding: 24px;
        box-shadow: 5px 8px 15px -8px rgba(0, 0, 0, 0.4);
        border-collapse: collapse;
    }

    .table-container table thead tr {
        background: #B22222;
        color: #fff;
    }

    .table-container table td,
    .table-container table th {
        padding: 16px 32px;
        text-align: center;
    }


    .table-container table tr {
        border-bottom: 1px solid #eee;
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
                    <li class="dropdown"><a href="#"><span>Features</span> </a>
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

    <div class="table-container">
<h2 align='center' style='color:lightgrey' class='table-heading'>Order</h2>
  
   
   <table>
   <thead>
   <th>Sr. no.</th>
   <th>Transaction ID</th>
   <th>Customer Name</th>
   <th>Products</th>
   
   <th> Address </th>
   <!-- <th> Status </th> -->
   <th> Action </th>
  
   
   
   
   </thead>
   
         <tbody>
   
        
           <?php
        
        
          //date
        
             $res= mysqli_query($conn,"select* from  product, order_info,order_table,ordered_products where ordr_Id=order_id and product_id=p_id  and order_id=odr_id ");

            if(mysqli_num_rows($res)>0){
           
              while($row=mysqli_fetch_array($res)){
                  
                  $srno= $row['ordered_pro_id'];
                   $tranid=$row['tran_id'];
                  //   $name=$row['card_holder_name'];
                     $name=$row['card_holder_name'];
                   
                     $Add=$row['Shipping_Add'];
                     $status=$row['order_status'];
                     $pro=$row['p_name'];
                    $order_id=$row['order_id'];
                    $o_id=$row['odr_Id'];
              
            
              echo"
        

               <tr class='cross'>
               <form method='post'>

                     <td>$srno</td>         
                     <td>   <input type='text' name='tranid' value ='$tranid'  class='form-control' style='width: 230px; height: 35px;' placeholder='Transaction Id' required/></td> 
                     <td style='color:darkpink'><b>$name</b> </td>
                     <td>$pro</td> 
                    
                     <td>$Add </td>  

                     <td>  
                           
                            <input type='submit'  name='$order_id' value ='Update'  class='btn btn-success' style='width:100%' />
                           
                     </td> 
                        
                           
            </form>  
            
                </tr>
                           
         
              
              
              ";
              }
              
          }
             ?>
   
        </tbody>
   
   
   </table>
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