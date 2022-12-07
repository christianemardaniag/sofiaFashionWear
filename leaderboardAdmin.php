<?php
require('./config.php');
include("include.php");
session_start();

$error = 0;
$id = 0;
if (!isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
   echo '<script type="text/javascript">
    $(document).ready(function(){
      $("#exampleModalCenter").modal("show");
    });
    </script>';
}
//for login
if (isset($_POST['username'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   $query = "SELECT count(id) as userID, id FROM user_table WHERE `username` = '$username' && `password` = '$password'";
   $sql = mysqli_query($sqlcon, $query);
   $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
   if ($row['userID'] > 0) {
      $error = 0;
      $id = $row['id'];
      if (isset($_POST['keeplogin'])) {
         setcookie("username", "$username", time() + (10 * 365 * 24 * 60 * 60));
         setcookie("userid", "$id", time() + (10 * 365 * 24 * 60 * 60));
      } else {
         $_SESSION["username"] = "$username";
         $_SESSION["userid"] = "$id";
      }
      header("location: order.php");
   } else {
      $error = 1;
   }
}

$userquery = "";
if (isset($_SESSION["userid"])) {
   $userquery = $_SESSION["userid"];
} else if (isset($_COOKIE["userid"])) {
   $userquery = $_COOKIE["userid"];
}

//deleting expired carts
$expDate = date("Y-m-d");
$expiredCart = "DELETE FROM cart WHERE `expiration` < '$expDate'";
$sqlExp = mysqli_query($sqlcon, $expiredCart);

//for change
$leader = "SELECT `user_table`.`ID` AS 'ID', `user_table`.`name` AS 'name', SUM(`order_data`.`qty`) AS 'total' FROM `user_table` INNER JOIN `order_data` ON `user_table`.`ID` = `order_data`.`customer_id` WHERE `order_data`.`order_status` = 'CLAIMED' GROUP BY `user_table`.`name` ORDER BY SUM(`order_data`.`qty`) DESC LIMIT 20";
$sqlead = mysqli_query($sqlcon, $leader);

$countlead = 0;
while ($rowlead = mysqli_fetch_array($sqlead, MYSQLI_ASSOC)) {
   if ($rowlead['ID'] == $userquery) {
      setcookie("ranking", "true", time() + (10 * 365 * 24 * 60 * 60));
      break;
   }
   $countlead++;
}


//for cart count
$query = "SELECT count(cart_id) as userCart FROM cart WHERE `user_id` = '$userquery'";
$sql = mysqli_query($sqlcon, $query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$cartCount = 0;
if ($row > 0) {
   $cartCount = $row['userCart'];
} else {
   $cartCount = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
   <link rel="stylesheet" type="text/css" href="order.css">
</head>

<body>
   <!--NAVBAR-->
   <nav class="navbar navbar-expand-lg  navbar-light bg-light">
      <div class="container-fluid">
         <a class="navbar-brand" href="index.php">
            <img src="sofiaimages/sofia.png" alt="" style="height: 3vh;" class="d-inline-block align-text-top">
            Sofia Fashionwear</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="adminindex.php">Dashboard</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="leaderboardAdmin.php">Leaderboard</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="productsadmin.php">Products</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="ordersadmin.php">Orders</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="transactionadmin.php">Transactions</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="usersadmin.php">Users</a>
               </li>
               <!-- LOGOUT -->
               <li class="nav-item" title="Logout">
                  <a class="nav-link" href="executionFile/logoutadmin.php" ; role="button">
                     <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                     </svg>
                  </a>
               </li>
            </ul>
         </div>
      </div>
   </nav>
   <!--END-->
   <style>
      th,
      td {
         font-size: 20px;
      }

      table {
         text-align: center;
         overflow: scroll;
         height: 50px;
      }
   </style>
   <div class="p-5 pt-2 text-center mx-auto my-5 rounded-4 shadow" style="width: 650px; background-color: white;">
      <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
      <lottie-player class="mx-auto" src="https://assets8.lottiefiles.com/packages/lf20_UZCdW2/04_trophy.json" background="transparent" speed="1" style="width: 100px; height: 100px;" loop autoplay></lottie-player>
      <h1 class="mb-3">LEADERBOARDS</h1>
      <table class="table table-striped table-light shadow-sm">
         <thead class="table-secondary">
            <th>Rank No.</th>
            <th>Name</th>
         </thead>
         <tbody class="table-group-divider">
            <?php
            $query = "SELECT user_table.`ID` AS 'ID', user_table.`name` AS 'name', SUM(order_data.`qty`) AS 'total' FROM user_table INNER JOIN order_data ON user_table.`ID` = order_data.`customer_id` WHERE order_data.`order_status` = 'CLAIMED' AND order_data.`qty` >= 1 GROUP BY user_table.`name` ORDER BY SUM(order_data.`qty`) DESC LIMIT 20;";
            $sql = mysqli_query($sqlcon, $query);
            $counter = 0;
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
               $name = $row['name'];
               $total = $row['total'];
               $id = $row['ID'];
               $counter++;
            ?>
               <tr>
                  <td><?php echo $counter ?></td>
                  <td class="text-capitalize"><?php echo $name ?></td>
               </tr>
            <?php
            }
            ?>
         </tbody>
      </table>
   </div>


</body>

</html>
