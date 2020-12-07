<?php 
include 'views/admin/layout/header.php';
?>

<div id="wrapper">
	<!-- Sidebar -->
	<?php 
	include 'views/admin/layout/sidebar.php';
	?>
	<!--end Sidebar -->

	<!-- content-wrapper -->
	<div id="content-wrapper">

		<div class="container">

			<div class="col-sm-12">
				<h2 class="">SỬA USERS</h2>
				<hr>
				<?php
				if(isset($_COOKIE["error"])){
					?>
					<div class="alert alert-danger">
						<strong>'Có lỗi!'</strong> <?php echo $_COOKIE["error"]; ?>
					</div>
				<?php } ?>
				<form method="post" class="form-horizontal">

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="<?php echo $user['name']; ?>" id="example-text-input" name="name" placeholder="NHập Tên usres">
						</div>
					</div>	
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
						<div class="col-sm-8">
							<input class="form-control" type="email" value="<?php echo $user['email']; ?>" id="example-text-input" name="email" placeholder="NHập email">
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Nhập Password cũ</label>
						<div class="col-sm-8">
							<input class="form-control" type="Password" value="" id="example-text-input" name="password" placeholder="NHập Password">
						</div>
					</div>	
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Nhập Password mới</label>
						<div class="col-sm-8">
							<input class="form-control" type="Password" value="" id="example-text-input" name="de_password" placeholder="NHập Password">
						</div>
					</div>					
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-3 col-form-label">Nhập lại Password mới</label>
						<div class="col-sm-8">
							<input class="form-control" type="Password" value="" id="example-text-input" name="ag_password" placeholder="NHập Password">
						</div>
					</div>

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Quyền</label>
						<div class="col-sm-8">
							<select class="form-control input-width" name="level">
								<option value="0"<?php  if($user['level']=='0') echo 'selected'; ?>>0</option>
								<option value="1"<?php  if($user['level']=='1') echo 'selected'; ?>>1</option>
							</select>
						</div>
					</div>	

					<div class="form-group text-center">
						<div class="col-sm-8">
							<button type="submit" name="submit" value="" class="btn btn-primary">Sửa</button>
							<a href="#" class="btn btn-danger">Hủy bỏ</a>
						</div>
					</div>	

				</form>

			</div>

		</div>


	</div>
	<!-- /.content-wrapper -->

</div>

<!-- /#wrapper -->

<?php 
include 'views/admin/layout/footer.php';
?>










