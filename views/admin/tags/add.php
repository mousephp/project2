<?php 
include 'views/admin/layout/header.php';
?>

<div id="wrapper">
	<!-- Sidebar -->
	<?php 
	include 'views/admin/layout/sidebar.php';
	?>
	<!--end Sidebar -->

	<!--start content-wrapper -->
	<div id="content-wrapper">

		<div class="container">

			<div class="col-sm-12">
				<h2 class="">THÊM TAGS</h2>
				<hr>
				<h4 class="text-center" style="color: red;"><?php echo $error; ?></h4>

				<form method="post" class="form-horizontal">
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Tên thể loại</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" id="example-text-input" name="name" placeholder="Nhập Tgas">
						</div>
					</div>	
					<div class="form-group text-center">
						<div class="col-sm-8">
							<input type="submit" name="submit" value="Thêm" class="btn btn-primary">
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


