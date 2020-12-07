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

		<div class="container-fluid">

			<!-- Breadcrumbs-->
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="#">Dashboard</a>
				</li>
				<li class="breadcrumb-item active">Tables</li>
			</ol>

			<!-- DataTables Example -->
			<div class="card mb-3">
				<div class="card-header">
					<i class="fas fa-table"></i>
				DANH SÁCH CATEGORIES</div>
				<?php require_once 'views/admin/message/message.php'; ?>
				
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
							<thead>
								<tr>
									<th>ID</th>
									<th>Tên</th>
									<th>Tùy chọn</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>ID</th>
									<th>Tên</th>
									<th>Tùy chọn</th>
								</tr>
							</tfoot>
							<tbody>

								<?php foreach ($tags as $key => $value): ?>														
									<tr>
										<td><?php echo $value['id']; ?></td>
										<td><?php echo $value['name']; ?></td>   
										<td  class="text-center">
											<a href="index?controllers=Tags&action=edit&id=<?php echo  $value['id']; ?>" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
											<a href="index?controllers=Tags&action=delete&id=<?php echo  $value['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?')"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
										</td>
									</tr>
								<?php endforeach ?>

							</tbody>
						</table>
					</div>
				</div>
				<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
			</div>

			<p class="small text-center text-muted my-5">
				<em>More table examples coming soon...</em>
			</p>

		</div>
		<!-- /.container-fluid -->


	</div>
	<!-- /.content-wrapper -->


</div>
<!-- /#wrapper -->



<?php 
include 'views/admin/layout/footer.php';
?>


