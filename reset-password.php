<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
<title>Reset Password | ARPSMS</title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" href="http://localhost/ARPSMS/includes/image/logo.ico". " type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style type="text/css">
  body{
    color: #fff;
    background: #63738a;
    font-family: 'Roboto', sans-serif;
  }
    .form-control{
    height: 40px;
    box-shadow: none;
    color: #969fa4;
  }
  .form-control:focus{
    border-color: #5cb85c;
  }
    .form-control, .btn{
        border-radius: 3px;
    }
  .signup-form{
    width: 400px;
    margin: 0 auto;
    padding: 30px 0;
  }
  .signup-form h2{
    color: #636363;
        margin: 0 0 15px;
    position: relative;
    text-align: center;
    }
  .signup-form h2:before, .signup-form h2:after{
    content: "";
    height: 2px;
    width: 30%;
    background: #d4d4d4;
    position: absolute;
    top: 50%;
    z-index: 2;
  }
  .signup-form h2:before{
    left: 0;
  }
  .signup-form h2:after{
    right: 0;
  }
    .signup-form .hint-text{
    color: #999;
    margin-bottom: 30px;
    text-align: center;
  }
    .signup-form form{
    color: #999;
    border-radius: 3px;
      margin-bottom: 15px;
        background: #f2f3f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
  .signup-form .form-group{
    margin-bottom: 20px;
  }
  .signup-form input[type="checkbox"]{
    margin-top: 3px;
  }
  .signup-form .btn{
        font-size: 16px;
        font-weight: bold;
    min-width: 140px;
        outline: none !important;
    }
  .signup-form .row div:first-child{
    padding-right: 10px;
  }
  .signup-form .row div:last-child{
    padding-left: 10px;
  }
    .signup-form a{
    color: #fff;
    text-decoration: underline;
  }
    .signup-form a:hover{
    text-decoration: none;
  }
  .signup-form form a{
    color: #5cb85c;
    text-decoration: none;
  }
  .signup-form form a:hover{
    text-decoration: underline;
  }
</style>
</head>
<body><br><br><br><br><br><br><br><br>
<div class="signup-form">
    <form action="includes/func.php" method="POST" enctype="multipart/form-data">
    <h2>Reset</h2>
    <p class="hint-text">Provide the email you used to register your account.</p>

    <?php
              if(isset($_GET['error']))
              {
              if ($_GET['error'] == "Empty") {
              echo '<div class="alert alert-danger" role="alert">All fields are required!</div>';
              }
              elseif ($_GET['error'] == "Exists") {
              echo '<div class="alert alert-danger" role="alert">User Already Exists!</div>';
              }
              elseif ($_GET['error'] == "Password") {
              echo '<div class="alert alert-danger" role="alert">Passwords Provided Do Not Match!</div>';
              }
              elseif ($_GET['error'] == "sent") {
              echo '<div class="alert alert-success" role="alert">Successful.Check Your Email Address!</div>';
              }
               elseif ($_GET['error'] == "Unsuccessful") {
              echo '<div class="alert alert-danger" role="alert">Unsuccessful.Please Try Again!</div>';
              }
               elseif ($_GET['error'] == "notsent") {
              echo '<div class="alert alert-danger" role="alert">Unsuccessful.Try Again!</div>';
              }

              }
              ?>
        <div class="form-group">
      <div class="row">

        <div class="form-group">
          <input type="email" class="form-control" name="email" placeholder="Email">
        </div>

    <div class="form-group">
            <button type="submit" name="submit_reset" class="btn btn-sm btn-success pull-left">Submit</button>
            <a href="login.php" class="btn btn-warning btn-sm pull-right" style="text-decoration: none; color: #ffffff;">Login</a>
        </div>
    </form>

</div>
</body>
</html>                            
