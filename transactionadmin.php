<?php
include "config.php";
include("include.php");
session_start();
if (!isset($_SESSION['loggedin'])) {
  echo header('Location: ./adminlogin.php');
}
?>

<style>
  body {
    background: rgb(131, 199, 210);
    background: linear-gradient(7deg, rgba(131, 199, 210, 1) 0%, rgba(183, 225, 232, 1) 49%);
  }

  .navbar {
    background: rgb(180, 226, 233);
    background: linear-gradient(7deg, rgba(180, 226, 233, 1) 0%, rgba(217, 243, 247, 1) 60%);
  }

  th,
  td {
    text-align: center !important;
  }
</style>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
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
            <a class="nav-link" aria-current="page" href="leaderboardAdmin.php">Leaderboard</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="productsadmin.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="ordersadmin.php">Orders</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="transactionadmin.php">Transactions</a>
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

  <!--PRODUCTS-->
  <div class="container-fluid my-4">

    <h1>SOFIA Transactions</h1>

    <div class="d-flex justify-content-between align-items-center mb-3">
      <div class="d-flex justify-content-end align-items-center">
        <div class="me-3">Date Range:</div>
        <div id="reportrange" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: auto; border-radius:4px;">
          <i class="fa fa-calendar"></i>&nbsp;
          <span></span> <i class="fa fa-caret-down"></i>
        </div>
      </div>
      <div class="d-flex justify-content-end align-items-center">
        <div class="align-middle">Order Status :</div>
        <div class="mx-3">
          <select class="form-select" id="orderStatus" style="width: 250px;">
            <option disabled>Order Status</option>
            <option selected value="ALL">ALL</option>
            <option value="CLAIMED">CLAIMED</option>
            <option value="CANCELLED">CANCELLED</option>
          </select>
        </div>
        <button class="btn btn-dark px-5 d-print-none" onclick="window.print()">Print</button>
      </div>
    </div>

    <table class="table table-striped table-sm display compact" id="myTable" style="background-color: #f2f2f2;">
      <thead class="table-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Transaction No</th>
          <th scope="col">Customer Name</th>
          <th scope="col">Product Name</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
          <th scope="col">Date</th>
          <th scope="col">Order Status</th>
          <!-- <th scope="col">Action</th> -->
        </tr>
      </thead>
      <tbody id="transactionContent">

      </tbody>
    </table>


  </div>
</body>

</html>

<!-- Modal SUCCESS-->
<div class=" modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="com-name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Orders Complete?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="executionFile/orderstat.php" method="POST">
          <input type="hidden" id="com-id" name="com-id" value="" />
          <input type="hidden" id="com-cusid" name="cusid" value="" />
          <input type="hidden" id="can-oid" name="oid" value="" />
          <input type="hidden" id="stats" name="stats" value="CLAIMED" />
          <button type="submit" class="btn btn-success">Complete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal CANCEL-->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="can-name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Do you really want to cancel this order?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <form action="executionFile/orderstat.php" method="POST">
          <input type="hidden" id="can-id" name="can-id" value="" />
          <input type="hidden" id="can-cusid" name="cusid" value="" />
          <input type="hidden" id="can-oid" name="oid" value="" />
          <input type="hidden" id="stats" name="stats" value="CANCELLED" />
          <button type="submit" class="btn btn-danger">Cancel Order</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
  $(document).ready(function() {


    $("#orderStatus").change(function(e) {
      e.preventDefault();
      let status = $(this).val();
      displayTransaction(status);
    });

    $('#reportrange').on('apply.daterangepicker', function(ev, picker) {
      let range = $('#reportrange span').html();
      displayTransaction(range, true);
    });

    function displayTransaction(query = "ALL", isRange = false) {
      $.ajax({
        type: "POST",
        url: "executionFile/process.php",
        data: {
          "transaction": true
        },
        dataType: "json",
        success: function(response) {
          let content = ``;
          var filtered = response.filter(function(x) {
            if (isRange) {
              let start = query.split(' - ')[0];
              let end = query.split(' - ')[1];
              return dateCheck(start, end, x.dateTime);
            } else {
              if (query == "ALL") {
                return true;
              } else {
                return x.orderStatus == query;
              }
            }
          });

          $.each(filtered, function(indexInArray, val) {
            let orderStatusColor = "";
            switch (val.orderStatus) {
              case "CLAIMED":
                orderStatusColor = "text-success";
                break;
              case "CANCELLED":
                orderStatusColor = "text-danger";
                break;
              default:
                break;
            }

            content += `
              <tr>
                <td>${val.orderID}</td>
                <td>${val.transactionNo}</td>
                <td class="text-capitalize">${val.customerName}</td>
                <td>${val.productName}</td>
                <td>${val.quantity}</td>
                <td>${val.total}</td>
                <td>${val.dateTime}</td>
                <td class="${orderStatusColor}">${val.orderStatus}</td>
              </tr>
             `;
          });

          if ($.fn.DataTable.isDataTable("#myTable")) {
            $('#myTable').DataTable().clear().destroy();
          }
          $("#transactionContent").html(content);
          $('#myTable').DataTable({
            order: [
              [0, 'desc']
            ]
          });
          $("#myTable").removeClass("display compact");
          $("#myTable").addClass("display compact");
        },
        error: function(response) {
          console.error(response);
        }
      });

      function dateCheck(from, to, check) {
        var fDate, lDate, cDate;
        fDate = Date.parse(from);
        lDate = Date.parse(to);
        cDate = Date.parse(check);
        if ((cDate <= lDate && cDate >= fDate)) {
          return true;
        }
        return false;
      }
    }

    var start = moment().subtract(29, 'days');
    var end = moment();

    function cb(start, end) {
      $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
      let range = $('#reportrange span').html();
      displayTransaction(range, true);
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

    cb(start, end);
  });
  $("#myTable").on('click', '.openupModal', function() {
    var currentRow = $(this).closest("tr");
    var id = currentRow.find("th:eq(0)").text();
    var custid = currentRow.find("td:eq(0)").text();
    var ono = currentRow.find("td:eq(5)").text();
    var name = currentRow.find("td:eq(2)").text();

    //FOR STOCKS
    document.getElementById("can-name").innerHTML = name + " (ORDER NO. " + ono + ")";
    document.getElementById("can-id").value = id;

    document.getElementById("com-name").innerHTML = name + " (ORDER NO. " + ono + ")";
    document.getElementById("com-id").value = id;

    document.getElementById("can-cusid").value = custid;
    document.getElementById("com-cusid").value = custid;

    document.getElementById("can-oid").value = ono;
    document.getElementById("com-oid").value = ono;
  });
</script>
