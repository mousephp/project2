<?php 
include 'views/client/layout/header.php';
?>



<hr>
<h2 class="text-center" style="color: #0cd048e0;">Shopping cart</h2>
<hr>
<div class="container">	

	<div class="row">			
		<div class="col-md-12 col-xs-12">				
			<table class="table ">
				<thead>
					<tr class="table-primary">
						<th>Image</th>
						<th>Title Product</th>
						<th>Số lượng</th>
						<th>Price</th>
						<th>Thành tiền</th>	
						<th>xóa</th>					
					</tr>
				</thead>
				<tbody>

					<?php foreach ($_SESSION['cart'] AS $id => $product):
						if (!is_numeric($id)) {
							continue;
						} 
						//$image_path = $product_item['image'];
						?>
						<tr>
							<td sty><img style="width: 200px;height: 150px; object-fit: cover;" class="card-img-top img-responsive" src="<?php ///echo $product_item['image']; ?>" alt="Card image cap"></td>
							<td><?php echo $product['title'] ?></td>
							<td>
								<input type="number" name="" value="<?php echo $product['quality'];?>" class="w-25 p-1">		
							</td>
							<td>
								<?php   $price = $product['price'];
								$price =
								number_format($price, 0, '.', ',');
								echo $price; ?>
							</td>							
							<td><?php  $price_total = $product['quality'] * $product['price'];
							echo number_format($price_total, 0, '.', ','); ?></td>
							<td><a href="index.php?client=client&action=deleteCart&id=<?php echo $id; ?>">Xóa</a></td>
						</tr>   


					<?php endforeach; ?>   

					<tr>
						<td colspan="5" style="text-align: right">
							Tổng giá trị đơn hàng:
							<span class="product-price">
								<?php
								echo number_format($_SESSION['cart']['total'], 0, '.', ',');
								?> vnđ
							</span>
						</td>
					</tr>


				</tbody>
			</table>
		</div>
	</div>



	<hr>
	<h4 class="mb-3 text-center" style="color: #0cd048e0;">Thanh toán (Billing address)</h4>
	<hr>
	<div class="row">
		<!-- <div class="col-md-8 offset-md-2"><h2 class="text-center"></h2> -->
			<div class="col-md-8 order-md-1 offset-md-2">

				<form class="needs-validation" novalidate>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="firstName">First name</label>
							<input type="text" class="form-control" id="firstName" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid first name is required.
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="lastName">Last name</label>
							<input type="text" class="form-control" id="lastName" placeholder="" value="" required>
							<div class="invalid-feedback">
								Valid last name is required.
							</div>
						</div>
					</div>

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

					<div class="mb-3">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
						<div class="invalid-feedback">
							Please enter your shipping address.
						</div>
					</div>

					<div class="mb-3">
						<label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
						<input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
					</div>

					<div class="row">
						<div class="col-md-5 mb-3">
							<label for="country">Country</label>
							<select class="custom-select d-block w-100" id="country" required>
								<option value="">Choose...</option>
								<option>United States</option>
							</select>
							<div class="invalid-feedback">
								Please select a valid country.
							</div>
						</div>
						<div class="col-md-4 mb-3">
							<label for="state">State</label>
							<select class="custom-select d-block w-100" id="state" required>
								<option value="">Choose...</option>
								<option>California</option>
							</select>
							<div class="invalid-feedback">
								Please provide a valid state.
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="zip">Zip</label>
							<input type="text" class="form-control" id="zip" placeholder="" required>
							<div class="invalid-feedback">
								Zip code required.
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="same-address">
						<label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
					</div>
					<div class="custom-control custom-checkbox">
						<input type="checkbox" class="custom-control-input" id="save-info">
						<label class="custom-control-label" for="save-info">Save this information for next time</label>
					</div>
					<hr class="mb-4">

					<h4 class="mb-3">Payment</h4>

					<div class="d-block my-3">
						<div class="custom-control custom-radio">
							<input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked required>
							<label class="custom-control-label" for="credit">Credit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="debit">Debit card</label>
						</div>
						<div class="custom-control custom-radio">
							<input id="paypal" name="paymentMethod" type="radio" class="custom-control-input" required>
							<label class="custom-control-label" for="paypal">Paypal</label>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6 mb-3">
							<label for="cc-name">Name on card</label>
							<input type="text" class="form-control" id="cc-name" placeholder="" required>
							<small class="text-muted">Full name as displayed on card</small>
							<div class="invalid-feedback">
								Name on card is required
							</div>
						</div>
						<div class="col-md-6 mb-3">
							<label for="cc-number">Credit card number</label>
							<input type="text" class="form-control" id="cc-number" placeholder="" required>
							<div class="invalid-feedback">
								Credit card number is required
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">Expiration</label>
							<input type="text" class="form-control" id="cc-expiration" placeholder="" required>
							<div class="invalid-feedback">
								Expiration date required
							</div>
						</div>
						<div class="col-md-3 mb-3">
							<label for="cc-expiration">CVV</label>
							<input type="text" class="form-control" id="cc-cvv" placeholder="" required>
							<div class="invalid-feedback">
								Security code required
							</div>
						</div>
					</div>
					<hr class="mb-4">
					<button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>
				</form>
			</div>
		</div>

	</div>



	<?php 
	include 'views/client/layout/footer.php';
	?>
