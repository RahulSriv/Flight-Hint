<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}


$con=mysqli_connect('127.0.0.1:3307','root');
if($con){
    // echo "connection done";
}else{
    echo "no connection";
}

mysqli_select_db($con,'flightrecords');



$f=$_POST['flightid'];


$q=" select * from flight where id='$f' ";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />

    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
      crossorigin="anonymous"
    />

    <!-- Google Fonts -->
    <link
      href="https://fonts.googleapis.com/css?family=Candal|Lora"
      rel="stylesheet"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap"
      rel="stylesheet"
    />

    <!-- Custom Styling -->
    <link rel="stylesheet" href="css/style.css" />

    <!-- Admin Styling -->
    <link rel="stylesheet" href="css/admin.css" />

    <title>Customer-Home</title>
  </head>

  <body>
    <header>
      <div class="logo">
        <h1 class="logo-text">Flight Hint</h1>
      </div>
      <i class="fa fa-bars menu-toggle"></i>
      <ul class="nav">
        <li>
          <a href="#">
            <i class="fa fa-user"></i>
            <?php
            echo $_SESSION['username'];

          ?>
          </a>
        </li>
      </ul>
    </header>

    <!-- Customer Page Wrapper -->
    <div class="admin-wrapper">
      <!-- Left Sidebar -->
      <div class="left-sidebar">
      <ul>
          <li><a href="dashboard.php">Home</a></li>
          <li><a href="profile.php">Profile</a></li>
          <li><a href="settings.php">Settings</a></li>
          <li><a href="http://127.0.0.1:5000/">Predict Prices</a></li>
          <li><a href="purchase.php">Book Tickets</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
      </div>
      <!-- // Left Sidebar -->

        <style>
            .usertext-input{
                width: 300px;
            }
            .getBox{
                float: left;
                padding-right:47px;
                
            }
            /* label{
                font-size:20px;
            } */
            table{
                /* margin-top:50px; */
            }
        </style>

      <!-- Customer Content -->
      <div class="admin-content">
        <div class="content">
          <h2 class="page-title">Purchase Ticket</h2>                
            <table>
            <?php while ($row = $result->fetch_assoc()) { ?> 
                <tr>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                <th>Id</th>
                <td><?php echo $row['id'];?></td>
                </tr>
                <tr>
                <th>Name</th>
                <td><?php echo $row['name'];?></td>
                </tr>
                <tr>
                <th>Date of Journey</th>
                <td><?php echo $row['doj'];?></td>
                </tr>
                <tr>
                <th>Source</th>
                <td><?php echo $row['sourcea'];?></td>
                </tr>
                <tr>
                <th>Destination</th>
                <td><?php echo $row['destination'];?></td>
                </tr>
                <tr>
                <th>Departure Time</th>
                <td><?php echo $row['dtime'];?></td>
                </tr>
                <tr>
                <th>Arrival Time</th>
                <td><?php echo $row['atime'];?></td>
                </tr>
                <tr>
                <th>Duration</th>
                <td><?php echo $row['duration'];?></td>
                </tr>
                <tr>
                <th>Stoppages</th>
                <td><?php echo $row['stops'];?></td>
                </tr>
                <?php } ?>
            </table>
            <br>
            <br>
            <br>
            <br>
            <a href="purchase.php" class="btn btn-big">Go Back</a>
            <a href="#" class="btn btn-big" onclick=' alert("Payment Gateway"); ' >Make Payment</a>
        </div>
        <br>
        <br>
        

      </div>
      <!-- // Customer Content -->

      <img src="" alt="" />
    </div>
    <!-- // Page Wrapper -->

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Custom Script -->
    <script src="js/scripts.js"></script>
  </body>
</html>


