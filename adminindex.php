<?php
include "config.php";
include("include.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
   echo header('Location: ./adminlogin.php');
}


//sales


//users
$query = "SELECT COUNT(id) as user FROM user_table";
$sql = mysqli_query($sqlcon, $query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$users = $row['user'];

//products
$query = "SELECT COUNT(product_id) as product FROM product_data";
$sql = mysqli_query($sqlcon, $query);
$row = mysqli_fetch_array($sql, MYSQLI_ASSOC);
$products = $row['product'];

//orderstatus

$query = "SELECT (SELECT COUNT(order_id) FROM order_data WHERE order_status = 'CLAIMED') AS CLAIMED, (SELECT COUNT(order_id) FROM order_data WHERE order_status = 'PENDING') AS PENDING, (SELECT COUNT(order_id) FROM order_data WHERE order_status = 'CANCELLED') AS CANCELLED FROM `order_data` LIMIT 1;";
$sql = mysqli_query($sqlcon, $query);
$pending = 0;
$cancelled = 0;
$delivered = 0;
if ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
   $pending = $row['PENDING'];
   $cancelled = $row['CANCELLED'];
   $delivered = $row['CLAIMED'];
}
?>


<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
   <style>
      .vertical-center {
         min-height: 100%;
         min-height: 90vh;

         display: flex;
         align-items: center;
      }

      /* body {
         background: rgb(131, 199, 210);
         background: linear-gradient(7deg, rgba(131, 199, 210, 1) 0%, rgba(183, 225, 232, 1) 49%);
      } */

      .bgbody {
         background-image: url("sofiaimages/Wallpaper/thrift.png");
         background-size: cover;
      }

      .blur-effect {
         background: linear-gradient(180deg, #000000, #00000087);
         -webkit-backdrop-filter: blur(3px);
         backdrop-filter: blur(3px);
      }

      .bg-dash {
         height: 27vh;
         /* background-color: #1F487E; */
         background: linear-gradient(180deg, #1F487E, #00000087);
         color: white;
         border: 0px;
      }

      .navbar {
         background: rgb(180, 226, 233);
         background: linear-gradient(7deg, rgba(180, 226, 233, 1) 0%, rgba(217, 243, 247, 1) 60%);
      }
   </style>
   <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
</head>

<body>
   <div class="bgbody h-100">
      <div class="blur-effect h-100">


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
                        <a class="nav-link active" aria-current="page" href="adminindex.php">Dashboard</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="leaderboardAdmin.php">Leaderboard</a>
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

         <div class="vertical-center">

            <div class="container">
               <div class="row">
                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-cash-stack" style="font-size: 55px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <div id="reportrange" style="background: #1F487E; cursor: pointer; padding: 2px 5px; border: 1px solid #ccc; width: auto; border-radius:4px;">
                                    <i class="fa fa-calendar"></i>&nbsp;
                                    <span></span> <i class="fa fa-caret-down"></i>
                                 </div>
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 35px">₱ <span id="totalSales"></span></h1>
                                 <a class="card-text text-decoration-none text-white" style="font-size: 20px" href="transactionadmin.php">Total Sales</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-people-fill" style="font-size: 55px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 45px">20</h1>
                                 <a class="card-text text-decoration-none text-white stretched-link" style="font-size: 20px" href="leaderboardAdmin.php">Top 20 Miners</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-tags-fill" style="font-size: 55px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 45px"><?php echo $products ?></h1>
                                 <a class="card-text text-decoration-none text-white stretched-link" style="font-size: 20px" href="productsadmin.php">Total Products</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-clock-history" style="font-size: 65px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 45px"><?php echo $pending ?></h1>
                                 <a class="card-text text-decoration-none text-white stretched-link" style="font-size: 20px" href="ordersAdmin.php">Total Unclaimed</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-truck" style="font-size: 65px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 45px"><?php echo $delivered ?></h1>
                                 <a class="card-text text-decoration-none text-white stretched-link" style="font-size: 20px" href="transactionadmin.php?q=CLAIMED">Total Claimed</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>

                  <div class="col-12 col-sm-12 col-md-6 col-lg-4 mt-3 mb-3 text-end">
                     <div class="card bg-dash">
                        <div class="card-body">
                           <div class="row align-items-center h-100">
                              <div class="col-3">
                                 <i class="bi bi-x-circle-fill" style="font-size: 55px; color: white"></i>
                              </div>
                              <div class="col-9">
                                 <h1 class="card-title fw-bold" style="color: #faf7f7; font-size: 45px"><?php echo $cancelled ?></h1>
                                 <a class="card-text text-decoration-none text-white stretched-link" style="font-size: 20px" href="transactionadmin.php?q=CANCELLED">Total Cancelled</a>
                              </div>
                           </div>
                        </div>
                        <!-- <div class="card-footer text-muted text-center">
                        </div> -->
                     </div>
                  </div>
               </div>
            </div>

         </div>
      </div>
   </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
   $(document).ready(function() {
      var data = {};
      $.ajax({
         type: "POST",
         url: "process/dashboard.php",
         data: {
            GET_DASHBOARD_DATA: true
         },
         dataType: "JSON",
         success: function(response) {
            data = response;
            console.log(data);
            var trans = response.map(function(date) {
               var date = new Date(date.transaction_date);
               return moment(date);
            });
            var start = moment.min(trans);
            var end = moment.max(trans);
            cb(start, end);
         },
         error: function(response) {
            console.error(response);
         }
      });

      function displayDashboard(start, end) {
         var range = $("#reportrange span").html();
         var filtered = data.filter(function(sales) {
            let start = range.split(' - ')[0];
            let end = range.split(' - ')[1];
            return dateCheck(start, end, moment(sales.transaction_date).format("L")) && sales.status == "CLAIMED";
         })
         var sales = 0;
         $.each(filtered, function(indexInArray, trans) {
            sales += parseFloat(trans.total);
         });
         $("#totalSales").html(parseFloat(sales).toFixed(2));
      }

      function dateCheck(from, to, check) {
         var x = moment(check, "MM/DD/YYYY");
         var a = moment(from, "MM/DD/YYYY");
         var b = moment(to, "MM/DD/YYYY");
         return x.isBetween(a, b) || x.isSame(a) || x.isSame(b);
      }

      $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
         let range = $('#reportrange span').html();
         // displayTransaction(range, true);
      });

      var start = moment().subtract(29, 'days');
      var end = moment();

      function cb(start, end, response) {
         $('#reportrange span').html(start.format('L') + ' - ' + end.format('L'));
         let range = $('#reportrange span').html();
         displayDashboard(start, end, response);
      }

      $('#reportrange').daterangepicker({
         startDate: start,
         endDate: end,
         ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
         }
      }, cb);

   });
</script>

</html>
