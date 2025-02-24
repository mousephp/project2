<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>

  <?php 
  require_once 'models/ProductModel.php';
  require_once 'models/CateModel.php';
  $category=new CateModel();
  $categories=$category->index();
  ?>


  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <a class="navbar-brand" href="index.php">Home</a>
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0">

        <?php foreach ($categories as $key => $value): ?>
         <li class="nav-item active">
          <a class="nav-link" href="#"><?php echo $value['name']; ?></a>
        </li>
      <?php endforeach ?>


        <!-- <li class="nav-item active">
          <a class="nav-link" href="#">Laptop <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Mobile</a>
        </li> -->

        <li class="nav-item">
          <a class="nav-link disabled" href="#">Contact</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        <a href="index.php?controllers=User&action=login" class="form-control">login</a>
      </form>
    </div>
  </nav>

