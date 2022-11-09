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
</style>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
</head>

<body style="background-color: #b7e1e8;">
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
            <a class="nav-link" aria-current="page" href="transactionadmin.php">Transactions</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="usersadmin.php">Users</a>
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
  <div class="container-fluid mt-4">
    <div class="row">
      <div class="col-12 mb-3">
        <h1>SOFIA Users</h1>
      </div>
      <!-- <div class="col-12">
        <form action="usersadmin.php" method="POST">
          <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search Username" aria-label="Search Products" aria-describedby="button-addon2">
            <button class="btn btn-danger" style="width: 15vh;" type="submit" id="button-addon2">Search</button>
          </div>
        </form>
      </div> -->
      <div class="col-12">
        <table class="table table-striped bg-white" id="myTable">
          <thead class="table-dark">
            <tr>
              <th class="text-center">User ID</th>
              <th>Name</th>
              <th>Address</th>
              <th>Email Address</th>
              <th>Phone No</th>
              <th class="text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "";

            if (isset($_POST['search'])) {
              $search = $_POST['search'];

              if ($search == "") {
                $query = "SELECT * FROM user_table";
              } else {
                $query = "SELECT * FROM user_table WHERE (`name` LIKE '%$search%' OR `username` LIKE '%$search%') OR `ID` = '$search'";
              }
            } else {
              $query = "SELECT * FROM user_table";
            }

            $sql = mysqli_query($sqlcon, $query);
            $counter = 0;
            while ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
              $id = $row["ID"];
              $name = $row["name"];
              // $uname = $row["username"];
              $password = $row["password"];
              $address = $row["address"];
              $email = $row["email_add"];
              $phoneno = $row["phoneno"];
              $counter += 1; ?>
              <tr>
                <td class="text-center"><?php echo "$id" ?></td>
                <td class="text-capitalize"><?php echo "$name" ?></td>
                <td class="text-capitalize"><?php echo "$address" ?></td>
                <td><?php echo "$email" ?></td>
                <td><?php echo "$phoneno" ?></td>
                <td class="text-center">
                  <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="openupModal btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal" ; data-bs-dismiss="modal" ;>UPDATE</button>
                    <button type="button" class="openupModal btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#removeModal" ; data-bs-dismiss="modal" ;>REMOVE</button>
                  </div>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
  </div>
</body>

</html>

<!-- Modal REMOVE-->
<div class="modal fade" id="removeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="username"></h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <form action="executionFile/deleteuser.php" method="POST">
          <input type="hidden" id="usersid" name="userid" value="" />
          <button type="submit" class="btn btn-danger">Remove</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal UPDATE-->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update User</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="executionFile/updateuser.php" method="POST">
        <div class="modal-body">
          <div class="form-group">
            <label for="category" class="col-form-label">User ID:</label>
            <input type="text" class="form-control" id="uid" name="uid" readonly>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Name:</label>
            <input type="text" class="form-control" id="uname" name="uname" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Address:</label>
            <input type="text" class="form-control" id="uad" name="uad" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Email Address:</label>
            <input type="text" class="form-control" id="uem" name="uem" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Phone No:</label>
            <input type="text" class="form-control" id="upn" name="upn" required>
          </div>
          <!-- <div class="form-group">
            <label for="category" class="col-form-label">Username:</label>
            <input type="text" class="form-control" id="usname" name="usname" required>
          </div>
          <div class="form-group">
            <label for="category" class="col-form-label">Password:</label>
            <input type="text" class="form-control" id="upass" name="upass" placeholder="New Password (Leave empty if not required to edit)">
          </div> -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-warning">Update User</button>
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
</script>

<script>
  $("#myTable").on('click', '.openupModal', function() {
    var currentRow = $(this).closest("tr");
    var id = currentRow.find("td:eq(0)").text();
    var name = currentRow.find("td:eq(1)").text();
    var address = currentRow.find("td:eq(2)").text();
    var email = currentRow.find("td:eq(3)").text();
    var phone = currentRow.find("td:eq(4)").text();
    // var username = currentRow.find("td:eq(4)").text();

    //DELETE
    document.getElementById("username").innerHTML = name;
    document.getElementById("usersid").value = id;

    //UPDATE
    document.getElementById("uid").value = id;
    document.getElementById("uname").value = name;
    document.getElementById("uad").value = address;
    document.getElementById("uem").value = email;
    document.getElementById("upn").value = phone;
    // document.getElementById("usname").value = username;
  });
</script>
