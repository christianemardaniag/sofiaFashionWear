<?php
require('./config.php');
include("include.php");
session_start();

if (!isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
  header("location: order.php");
}

//cart variable holder
$userquery = "";
if (isset($_SESSION["userid"])) {
  $userquery = $_SESSION["userid"];
} else if (isset($_COOKIE["userid"])) {
  $userquery = $_COOKIE["userid"];
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

$leader = "SELECT `user_table`.`ID` AS 'ID', `user_table`.`name` AS 'name', SUM(`order_data`.`qty`) AS 'total' FROM `user_table` INNER JOIN `order_data` ON `user_table`.`ID` = `order_data`.`customer_id` WHERE `order_data`.`order_status` = 'CLAIMED' GROUP BY `user_table`.`name` ORDER BY SUM(`order_data`.`qty`) DESC LIMIT 20";
$sqlead = mysqli_query($sqlcon,$leader);

$countlead = 0;
$isLead = false;
while($rowlead = mysqli_fetch_array($sqlead, MYSQLI_ASSOC)){
  if($rowlead['ID'] == $userquery){
    $isLead = true;
    setcookie("ranking", "true", time() + (10 * 365 * 24 * 60 * 60));
    break;
  }
  $countlead++;
}

//end
?>

<style>
</style>
<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" type="text/css" href="order.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <style>
    th,
    td {
      text-align: center !important;
      vertical-align: middle;
    }
  </style>
</head>

<body>

  <!--NAVBAR-->
  <nav class="navbar navbar-expand-lg  navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img src="sofiaimages/sofia.png" alt="" style="height: 3vh;" class="d-inline-block align-text-top">
        Sofia Fashionwear</a>
      <?php
      if (isset($_COOKIE['username'])) {
        echo 'Welcome, ' . $_COOKIE['username'];
      } else if (isset($_SESSION['username'])) {
        echo 'Welcome, ' . $_SESSION['username'];
      } else {
        echo "Guest Account";
      }
      ?>
      <button class="navbar-toggler" type="button" style="width: 100%" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="order.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="myorder.php">My Order</a>
          </li>
        </ul>
        <ul class="navbar-nav mb-2 mb-lg-0">
          <div class="input-group">
            <!-- LEADERBOARD -->
            <!-- <li class="nav-item" title="Leaderboards of active users">
              <a class="nav-link mx-2 me-2" href="leaderboard.php" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bar-chart-line-fill" viewBox="0 0 16 16">
                  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1V2z" />
                </svg>
              </a>
            </li> -->

            <!-- CART -->
            <li class="nav-item" title="Cart">
              <a class="nav-link me-2 active" href="mycart.php" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
                  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  <span class="badge rounded-pill badge-notification bg-danger"><?php echo $cartCount ?></span>
                </svg>
              </a>
            </li>

            <!-- LOGOUT -->
            <li class="nav-item" title="Logout">
              <a class="nav-link" href="logout.php" role="button">
                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                </svg>
              </a>
            </li>
        </ul>
      </div>
    </div>
    </div>
  </nav>
  <!--END-->
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-12 mb-3">
        <h1>My Cart</h1>
      </div>
      <!-- <div class="col-12">
        <form action="mycart.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search Product Name" aria-label="Search Products" aria-describedby="button-addon2">
            <button class="btn btn-danger" style="width: 15vh;" type="submit" id="button-addon2">Search</button>
          </div>
        </form>
      </div> -->
      <div>
        <?php
        if ($isLead) {
          echo '<div class="alert alert-warning" role="alert">
          <i class="bi bi-stars"></i> You are belong to our <b>Top 20 Leaderboards,</b> enjoy additional one week expiration of your reserved items!
        </div>';
        }
        ?>
      </div>
      <div class="col-12 overflow-auto">
        <table class="table table-striped bg-white" id="myTable">
          <thead class="table-dark" style="position: sticky; top: 0; z-index: 1;">
            <tr>
              <th>Cart ID</th>
              <th>Product Name</th>
              <th>Image</th>
              <th>Size</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Total</th>
              <th title="Duration of the reserved item.">Duration</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "";
            $customerid = 0;

            if (isset($_SESSION["userid"])) {
              $customerid = $_SESSION["userid"];
            } else if (isset($_COOKIE["userid"])) {
              $customerid = $_COOKIE["userid"];
            }

            if (isset($_POST['search'])) {
              $search = $_POST['search'];

              if ($search == "") {
                $query = "SELECT cart.cart_id as 'cartid', cart.expiration as 'expiry', cart.product_id as 'prodid', product_data.price as 'price', product_data.small as 'small', product_data.medium as 'medium', product_data.large as 'large', cart.size as size,  product_data.product_name as 'prodname', cart.qty as 'qty', cart.total as 'total', product_data.image_path as 'imgpath' 
                        FROM product_data
                        INNER JOIN cart ON product_data.product_id = cart.product_id WHERE user_id = '$customerid'";
              } else {
                $query = "SELECT cart.cart_id as 'cartid', cart.expiration as 'expiry', cart.product_id as 'prodid', product_data.price as 'price', product_data.small as 'small', product_data.medium as 'medium', product_data.large as 'large', cart.size as size,  product_data.product_name as 'prodname', cart.qty as 'qty', cart.total as 'total', product_data.image_path as 'imgpath' 
                        FROM product_data
                        INNER JOIN cart ON product_data.product_id = cart.product_id WHERE `product_name` LIKE '%$search%' AND user_id = '$customerid'";
              }
            } else {
              $query = "SELECT cart.cart_id as 'cartid', cart.expiration as 'expiry', cart.product_id as 'prodid', product_data.price as 'price', product_data.small as 'small', product_data.medium as 'medium', product_data.large as 'large', cart.size as size, product_data.product_name as 'prodname', cart.qty as 'qty', cart.total as 'total', product_data.image_path as 'imgpath' 
                    FROM product_data
                    INNER JOIN cart ON product_data.product_id = cart.product_id WHERE user_id = '$customerid'";
            }

            $sql = mysqli_query($sqlcon, $query);
            $counter = 0;
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
              $id = $row["cartid"];
              $prodid = $row["prodid"];
              $pname = $row["prodname"];
              $price = $row["price"];
              $qty = $row["qty"];
              $exp = $row["expiry"];
              $total = $row["total"];
              $imgpath = $row["imgpath"];
              $sizess = $row['size'];
              $small = $row["small"];
              $medium = $row["medium"];
              $large = $row["large"];
              $counter += 1; ?>
              <tr>
                <td><?php echo "$id" ?></td>
                <td><?php echo "$pname" ?></td>
                <td>
                  <img style="width: 100px;" src="<?php echo "$imgpath" ?>">
                </td>
                <td><?php echo "$sizess" ?></td>
                <td><?php echo "$price" ?></td>
                <td><?php echo "$qty" ?></td>
                <td><?php echo "$total" ?>
                  <input type="hidden" value="<?php
                                              if ($sizess == "Large") {
                                                echo $large;
                                              } else if ($sizess == "Medium") {
                                                echo $medium;
                                              } else {
                                                echo $small;
                                              }
                                              ?>" id="size<?php echo $id ?>">
                  <input type="hidden" value="<?php echo $prodid ?>" id="prodid<?php echo $id ?>">
                </td>
                <td style="width: 40vh; text-align:center; vertical-align:middle">
                  <?php
                  $date = date('Y-m-d');
                  echo round((strtotime($exp) - strtotime($date)) / (60 * 60 * 24)) . " day(s) left"; ?>
                </td>
                <td style="width: 40vh; text-align:center;vertical-align:middle">
                  <button style="vertical-align:middle; width: 125px; margin-top: 5px;" type="button" class="openupModal btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button>
                  <a href="executionFile/removecart.php?id=<?php echo $id ?>&prodid=<?php echo $prodid ?>&size=<?php echo $sizess ?>&qty=<?php echo $qty ?>"><button style="vertical-align:middle; width: 125px; margin-top: 5px;" type="button" class="opendelModal btn btn-Danger" data-bs-toggle="modal" data-bs-target="#deleteModal">Remove</button></a>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <div class="d-flex flex-column-reverse">
        <div class="align-self-end">
          <?php
          if ($counter > 0) {
            echo '<button style="vertical-align:middle; margin-top: 10px; margin-bottom: 10px; width: 30vh;" type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#checkOut">Checkout</button>';
          }
          ?>
        </div>
      </div>
    </div>

  </div>
  </div>
</body>

</html>

<!-- Modal Checkout-->
<div class="modal fade" id="checkOut" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Confirm Order</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p for="exampleInputEmail1">Total Price: </p>
        <div class="input-group mb-3">
          <span class="input-group-text">₱</span>
          <?php
          $userquery = "";
          if (isset($_SESSION["userid"])) {
            $userquery = $_SESSION["userid"];
          } else if (isset($_COOKIE["userid"])) {
            $userquery = $_COOKIE["userid"];
          }

          $query = "SELECT SUM(total) as total FROM cart WHERE `user_id` = '$userquery'";
          $sql = mysqli_query($sqlcon, $query);
          $row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
          $num = $row["total"];
          ?>
          <input type="text" class="form-control" id="totalpricee" value="<?php echo $num ?>" name="totalprice" aria-label="Amount (to the nearest dollar)" readonly>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" data-bs-toggle='modal' onclick="generate();" data-bs-target='#receiptModal' data-bs-dismiss="modal" class="btn btn-danger">Confirm</button>
      </div>
    </div>
  </div>
</div>


<!-- RECEIPT V2 -->
<div class="modal bg-secondary py-5" tabindex="-1" role="dialog" id="receiptModal" data-bs-backdrop="static">
  <div class="modal-dialog" role="document">
    <div class="modal-content rounded-4 shadow">
      <div class="p-5 pb-4 border-bottom-0">
        <div class="d-flex justify-content-between">
          <h6 class="text-secondary">Unofficial Receipt</h6>
          <div class="text-muted" style="font-size: 12px;" id="dateTimeDisp">December 7, 2022 08:55 PM</div>
        </div>
        <div class="text-center">

          <h1 class="fw-bold mb-0 fs-2">Sofia Fashionwear Store</h1>
          <p class="mb-0 text-muted small">RRV7, F9J, Lucero St. Malolos, Bulacan</p>
          <p class="mb-0 text-muted small">+639 050 446 098</p>
        </div>
      </div>

      <div class="modal-body p5 pb-2 pt-0">
        <h6 id="orderno" class="text-center">ORDER NO: 123041</h6>
        <table class="table table-border">
          <thead>
            <tr>
              <th>Item Name</th>
              <th>Size</th>
              <th>Qty</th>
              <th>Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT cart.size as size, product_data.product_name as 'prodname', cart.qty as 'qty', cart.total as 'total' 
                    FROM product_data
                    INNER JOIN cart ON product_data.product_id = cart.product_id WHERE user_id = '$userquery'";
            $sql = mysqli_query($sqlcon, $query);
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
              $prnames = $row["prodname"];
              $size = $row['size'];
              $pqtys = $row["qty"];
              $total = $row["total"];
              echo "<tr>
                <td class='text-capitalize' style='font-size: 12px;'>$prnames</td>
                <td class='text-capitalize'>$size</td>
                <td>$pqtys</td>
                <td>₱ $total</td>
              </tr>";
            }
            ?>
            <tr>
            <tr class="table-secondary">
              <td colspan="3" class="fw-bold text-end">Total:</td>
              <td class="fw-bold h5">₱ <?php echo $num ?></td>
            </tr>
          </tbody>
        </table>

        <div class="mt-3 text-center text-muted" style="font-size: 12px;">
          <div><i>This serves as an unofficial receipt of Sofia Fashionwear Store.</i></div>
          <i>For questions concerning to this receipt, please contact</i>
          <div>Ms. Mary May Ramos | +639 050 446 098</div>
          <p>Thank you and come again!</p>
        </div>
      </div>
      <div class="modal-footer d-print-none">
        <button type="button" class="btn btn-secondary" onclick="window.print()">Print</button>
        <form action="executionFile/buyitem.php" method="POST">
          <input type="hidden" id="ordernos" name="orderno" value="">
          <input type="hidden" id="dateTime" name="dateTime" value="">
          <button type="submit" class="btn btn-dark px-3">Proceed</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Update-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="productname">Update Item</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="executionFile/updatecart.php" method="POST" enctype='multipart/form-data'>
          <div class="form-group">
            <label for="price" class="col-form-label">Quantity:</label>
            <div class="input-group mb-3">
              <span class="input-group-text">QTY</span>
              <input type="number" min="1" max="100" class="form-control" id="qty" name="qty" required>
            </div>
          </div>
          <input type="hidden" value="" id="oldqty" name="oldqty">
          <input type="hidden" value="" id="sizez" name="sizez">
          <input type="hidden" value="" id="prodidz" name="prodidz">
          <input type="hidden" id="idcarts" name="idcarts" value="">
          <input type="hidden" id="prices" name="prices" value="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-warning">Update Item</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });

  // $(".openupModal").click(function(e) {
  //   e.preventDefault();
  //   var qty = $(this).data("qty");

  // });
</script>

<script>
  $("#myTable").on('click', '.openupModal', function() {
    var currentRow = $(this).closest("tr");
    var id = currentRow.find("td:eq(0)").text();
    var size = currentRow.find("td:eq(3)").text();
    var price = currentRow.find("td:eq(4)").text();
    var qty = currentRow.find("td:eq(5)").text();
    var max = document.getElementById("size" + id).value;
    var proid = document.getElementById("prodid" + id).value;

    document.getElementById("prices").value = price;
    document.getElementById("qty").value = qty;
    document.getElementById("oldqty").value = qty;
    document.getElementById("sizez").value = size;
    document.getElementById("idcarts").value = id;
    document.getElementById("prodidz").value = proid;

    document.getElementById("qty").max = parseInt(qty) + parseInt(max);
  });

  function generate() {

    //GENERATE ORDER NO.
    var orderno = Math.floor(Math.random() * 1000000) + 1;
    document.getElementById("ordernos").value = orderno;
    document.getElementById("orderno").innerHTML = "ORDER NO: ".concat(orderno);
    var date = new Date();
    var current_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate();
    var current_time = date.getHours() + ":" + date.getMinutes() + ":" + date.getSeconds();
    var date_time = current_date + " " + current_time;
    document.getElementById("dateTime").value = date_time;

    $(document).ready(function() {
      $("#dateTimeDisp").html(moment().format("LLL"));
      $("#receiptModal").modal('show');
    });
  }
</script>
