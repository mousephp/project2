<?php 
include 'views/client/layout/header.php';
?>



<div class="container">
  <div class="row">

<?php foreach ($products as $key => $value) { ?>

    <div class="col-md-4 col-sm-6">
      <a href="index.php?client=client&action=detail&id=<?php echo $value['id'] ?>">
        <div class="card border-success" style="width: 18rem;">
          <img class="card-img-top img-responsive" src="<?php echo $value['image'] ?>" alt="Card image cap">
          <div class="card-body text-primary">
            <h5 class="card-title"><?php echo $value['title'] ?></h5>
            <div class="pro-rating">
              <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
              <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
              <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
              <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
              <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
            </div>
            <p class="card-price">$ <?php echo $value['price'] ?></p>            
            <a href="#" class="btn btn-primary"><i class="fas fa-shopping-cart"></i></a>
          </div>
        </div>
      </a>
    </div>

<?php  } ?>


  </div>
</div>




<?php 
include 'views/client/layout/footer.php';
?>








