<?php 
if (isset($_SESSION["loged"])) {
  header("Location: index.php?controllers=Home&action=index");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>
<!-- https://startbootstrap.com/snippets/login/ -->
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <h5 class="card-title text-center">Sign In</h5>
            
            <?php
            if(isset($_COOKIE["error"])){
              ?>
              <div class="alert alert-danger">
                <strong>'Có lỗi!'</strong> <?php echo $_COOKIE["error"]; ?>
              </div>
            <?php } ?>

            <?php
            if(isset($_SESSION["error"])){
              ?>
              <div class="alert alert-danger">
                <?php echo $_SESSION["error"]; ?>
              </div>
            <?php } ?>


            <?php //require_once 'views/message/message.php'; //error ?>


            <form class="form-signin" action="" method="post">
              <div class="form-label-group">
                <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email address"  autofocus>
                <!-- <label for="inputEmail">Email address</label> -->
              </div>
              <br>
              <div class="form-label-group">
                <input type="password" id="inputPassword" class="form-control" name="password" placeholder="Password" >
                <!-- <label for="inputPassword">Password</label> -->
              </div>

              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" name="remember" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Remember password</label>
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Sign in</button>

              <hr class="my-4">
              <button class="btn btn-lg btn-danger btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i> Sign in with Google</button>
              <button class="btn btn-lg btn-info btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Sign in with Facebook</button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </body>
  </html>