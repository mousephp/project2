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
				<h2 class="">THÊM PRODUCT</h2>
				<hr>
				<?php require_once 'views/admin/message/message.php'; ?>

				<form method="POST" class="form-horizontal" enctype="multipart/form-data">
					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Tên sản phẩm</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" value="" id="example-text-input" name="title" placeholder="Nhập tên sản phẩm">
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Ảnh sản phẩm</label>
						<div class="custom-file col-sm-10">
							<input type="file" class="custom-file-input " name="image" id="customFile">
							<label class="custom-file-label" for="customFile">Choose file</label>					
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Giá sản phẩm</label>
						<div class="col-sm-8">
							<input class="form-control" type="number" value="" id="example-text-input" name="price" placeholder="Nhập giá sản phẩm">
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Status</label>
						<div class="col-sm-8">
							<select required name="status" class="form-control">
								<option value="1" selected>Còn hàng</option>
								<option value="0">Hết hàng</option>
							</select>
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Desciption</label>
						<div class="col-sm-8">
							<textarea  class="form-control" type="text" rows="5" name="desciption" placeholder="Nhập desciption"></textarea>
						</div>
					</div>	

					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Featured</label>
						<div class="col-sm-8">							
							<input type="radio" checked name="featured" value="1">có
							<input type="radio" name="featured" value="0">Không							
						</div>
					</div>	


					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Category</label>
						<div class="col-sm-8">
							<select class="form-control input-width" name="cate_id">
								<?php foreach ($categories as $value): ?>
									<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
								<?php endforeach ?>
							</select>						
						</div>
					</div>	


					<div class="form-group ">
						<label for="example-text-input" class="col-sm-2 col-form-label">Tags</label>
						<div class="col-sm-8">
							<select class="form-control input-width" name="tags_id">
								<?php foreach ($tags as $value): ?>
									<option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>	
								<?php endforeach ?>
							</select>
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
