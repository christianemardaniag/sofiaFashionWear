<?php
require('./config.php');
include("include.php");
session_start();
$notice = "This is restricted area, if you're not our employee please proceed to <a href='./index.php'> our main page!</a>";

if (isset($_SESSION['loggedin'])) {
    echo header('Location: ./adminindex.php');
}

if (isset($_POST['username'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin_db WHERE username = '$username' and password = '$password'";
    $sql = mysqli_query($sqlcon, $query);
    if ($row = mysqli_fetch_array($sql, MYSQLI_ASSOC)) {
        $_SESSION['loggedin'] = "Yes";
        $_SESSION['usernameAdmin'] = "$username";
        echo header('Location: ./adminindex.php');
    } else {
        $notice = "Invalid Username/Password <br><br> This is restricted area, if you're not our employee please proceed to <a href='./index.php'> our main page!</a>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            font: 14px sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 60vh;
            background-color: #b7e1e8;

        }

        .wrapper {
            width: 500px;
            padding: 20px;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <img src="sofiaimages/sofia.png" class="mb-5" style="width: 20vh">
        <h2>SOFIA Admin Login</h2>
        <p>Please fill in your credentials to login.</p>

        <?php
        if (!empty($login_err)) {
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }
        ?>

        <form action="adminlogin.php" method="POST">
            <div class="form-group">
             <!--   <label>Username</label> -->
                <input type="text" name="username" placeholder="Username" class="form-control" value="" required>
            </div>
            <div class="form-group">
            <!--    <label>Password</label> -->
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                <button type="button" class="btn btn-link text-decoration-none p-0" data-bs-toggle="modal" data-bs-target="#forgotPasswordModal">
                Forgot Password?
              </button>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </form>
        <div class="alert alert-danger" role="alert">
            <?php echo "$notice"; ?>
        </div>
    </div>
    <!-- Forgot Password Modal -->
  <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Forgot Password</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="forgotPasswordForm">
          <div class="modal-body">
            <p>Enter your <span class="text-primary fw-bold">REGISTERED EMAIL</span></p>
            <p>We will send to your new password to your email.</p>
            <input type="email" name="fpEmail" id="fpEmail" class="form-control" placeholder="Registered Email" required>
            <div class="alert alert-danger my-1" role="alert" id="errorAlertFP">
              You have entered unregistered email address!
            </div>
            <div class="alert alert-success my-1" role="alert" id="successAlertFP">
              Your new password has been sent to your email address
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="forgotbtn">
              Send Email
              <div id="fPSpinner" class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
              </div>
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#fPSpinner").hide();
            $("#errorAlert").hide();
            $("#errorAlertFP").hide();
            $("#successAlertFP").hide();
            $("#forgotPasswordForm").submit(function(event) {
                event.preventDefault();
                $.ajax({
                    url: "forgotPassword.php",
                    type: "post",
                    data: {
                        forgotPassword: "admin_db",
                        email: $("#fpEmail").val()
                    },
                    beforeSend: function() {
                        $("#fPSpinner").show();
                        $("#forgotbtn").attr("disabled", "disabled");
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == "Success") {
                            $("#successAlertFP").html(data.msg);
                            $("#successAlertFP").show();
                            $("#errorAlertFP").hide();
                            $("#forgotPasswordForm").trigger("reset");
                        } else {
                            $("#errorAlertFP").html(data.msg);
                            $("#errorAlertFP").show();
                            $("#successAlertFP").hide();
                        }
                        $("#fPSpinner").hide();
                        $("#forgotbtn").removeAttr("disabled");
                    },
                    error: function(response) {
                        console.error(response);
                        $("#errorAlertFP").html(response.msg);
                        $("#errorAlertFP").show();
                    }
                });
            });
        });
    </script>
</body>

</html>
