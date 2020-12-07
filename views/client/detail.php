<?php 
include 'views/client/layout/header.php';
?>


<br>
<div class="container">
  <hr>
  <h2 class="text-center" style="color: #28a745;">Product Detail</h2>
  <hr>
  <div class="row">

    <div class="col-md-12 ">
      <div class="row">

        <div class="col-md-4 offset-md-2">
          <img class="card-img-top img-responsive" src="<?php echo $isPro['image']; ?>" alt="Card image cap">
        </div>
        <div class="col-md-4">
          <h3 style="color: #0cd048e0;"><?php echo $isPro['title']; ?></h3>
          <hr>
          <div class="pro-rating">
            <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
            <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
            <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
            <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
            <a href="#" tabindex="0"><i class="fa fa-star" aria-hidden="true"></i></a>
          </div>
          <hr>
          <label>Price </label>
          <strong>$ <?php echo $isPro['price']; ?></strong>
          <hr>
          <label>QTY</label>
          <input type="number" value="1" name=""  class="w-25 p-1">
          <a href="index.php?client=client&action=cart&id=<?php echo $isPro['id']; ?>" class="btn btn-primary btn-lg"><i class="fas fa-shopping-cart"></i></a>
          <hr>
          <label>Summary</label>
          <summary><?php echo $isPro['desciption']; ?></summary>  

          <br>  
          <b>Tags:
            <?php foreach($tags as $value){
              if ($value['id'] == $isPro['tag_id']) {  
                ?>
                <a href=""><?php echo $value['name'] ?></a>
              <?php } } ?>
            </option>
          </b>     

        </div>
      </div>
    </div>
  </div>






  <br><br><hr><hr>
  <div class="row">   

    <div class="col-md-8 offset-md-2 ">
     <h3 class="text-center">YOUR COMMENTS</h3>
     <form action="" method="">
      <div class="mb-3">
        <label for="username">Username</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">@</span>
          </div>
          <input type="text" class="form-control" id="username" placeholder="Username" required>
          <div class="invalid-feedback" style="width: 100%;">
            Your username is required.
          </div>
        </div>
      </div>

      <div class="mb-3">
        <label for="email">Email <span class="text-muted">(Optional)</span></label>
        <input type="email" class="form-control" id="email" placeholder="you@example.com">
        <div class="invalid-feedback">
          Please enter a valid email address for shipping updates.
        </div>
      </div>
      <div class="form-group">
        <label for="comment">Comment:</label>
        <textarea class="form-control" rows="5" id="comment"></textarea>
      </div>
      <button class="btn btn-primary btn-lg" type="submit">Submit</button>
    </form>
  </div>


  <div class="col-md-8 offset-md-2">
    <br><hr>
  </div>

  <div class="col-md-8 offset-md-2">
    <div class="comment-list">
      <ul>
        <p class="com-title">
          <img class="rounded-circle" width="30px" src="https://ss-images.catscdn.vn/wp700/2020/06/16/7648848/quynhanhshyn__20200616_1.jpg"> 
          <span class="com-details">
            abc ayz
          </span>
        </p>
        <span>08:18</span> 
      </ul>
    </div>
  </div>
</div>

<?php 
include 'views/client/layout/footer.php';
?>
