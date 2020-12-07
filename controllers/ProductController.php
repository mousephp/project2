<?php 
require_once 'models/ProductModel.php';
require_once 'models/CateModel.php';
require_once 'models/TagsModel.php';
require_once 'Helpers/Helper.php';

class ProductController
{
	public $error='';
	
	function to_slug($str) {
		$hel=new Helper();
		$slug =$hel->to_slug($str);
		return $slug;
	}

	public function index()
	{
		$product = new ProductModel();
		$products=$product->index();
		include 'views/admin/product/list.php';
	}

	public function create()
	{
		if (isset($_POST['submit'])) {
			$title = $_POST['title'];
			$price = $_POST['price'];
			$featured = $_POST['featured'];
			$desciption = $_POST['desciption'];
			$status = $_POST['status'];
			$category_id = $_POST['cate_id'];
			$tag_id = $_POST['tags_id'];		
			//$image = $_FILES['image'];

			if(empty($_FILES['image']['name'])){
				$this->error = "<p style='color:red;'>bạn cần nhập file ảnh!</p>";
			}

            //check trường hợp không nhập tên sản phẩm
			if (empty($title)) {
				$this->error = "Không được để trống tên sản phẩm";
			} else {
				$target_dir = "public/admin/images/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);
				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Kiểm tra xem tập tin hình ảnh là hình ảnh thật hay hình ảnh giả
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "Tệp không phải là hình ảnh.";
					$uploadOk = 0;
				}
				// Kiểm tra xem tập tin đã tồn tại chưa
				if (file_exists($target_file)) {
					echo "Xin lỗi, tập tin đã tồn tại.";
					$uploadOk = 0;
				}
				// Kiểm tra kích thước tập tin
				if ($_FILES["image"]["size"] > 800000) {
					echo "Xin lỗi, tập tin của bạn quá lớn.";
					$uploadOk = 0;
				}
				// Cho phép các định dạng tệp nhất định
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					echo "Xin lỗi, chỉ cho phép các tệp JPG, JPEG, PNG & GIF.";
					$uploadOk = 0;
				}
				//Kiểm tra xem $ uploadOk có bị lỗi thành 0 không
				if ($uploadOk == 0) {
					echo "Xin lỗi, tập tin của bạn không được tải lên.";
				// Nếu mọi thứ đều ổn, hãy thử tải lên tập tin
				} else {
					if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["image"]["name"]). " Đã được tải lên.";
					} else {
						echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
					}
				}

				$arr_params=[
					':title' => $title, 
					':slug'	 => self::to_slug($title),
					':image' => $target_file,
					':price' => $price, 
					':featured' => $featured, 
					':desciption' => $desciption, 
					':status' => $status, 
					':cate_id' => $category_id, 
					':tag_id' => $tag_id,
				];

				var_dump($arr_params);
				$product = new ProductModel();
				$is_insert = $product->store($arr_params);

				var_dump($is_insert);
				if ($is_insert) {
					$_SESSION['success'] = 'Thêm sản phẩm thành công';
				} else {
					$_SESSION['error'] = 'Thêm sản phẩm thất bại';
				}

				header("Location: index.php?controllers=product&action=index");
				exit();
			}
			
		}
		//lấy ra tất cả danh mục-tags đang có trên hệ thống
		$cate = new CateModel();
		$categories = $cate->index();

		$tag = new TagsModel();
		$tags = $tag->index();

		//gọi view
		include 'views/admin/product/add.php';
	}


	public function edit()
	{
		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "ID không tồn tại";
			header("Location: index.php?controller=product&action=index");
			exit();
		}

		$id = $_GET['id'];
		$product_model = new ProductModel();
		$product = $product_model->getProById($id);

		if (isset($_POST['submit'])) {
			$title = $_POST['title'];
			$price = $_POST['price'];
			$featured = $_POST['featured'];
			$desciption = $_POST['desciption'];
			$status = $_POST['status'];
			$category_id = $_POST['cate_id'];
			$tag_id = $_POST['tags_id'];		
			$image = $product['image'];				

			if (empty($title)) {
				$this->error = "Không được để trống tên sản phẩm";
			} else {				
				$target_dir = "public/admin/images/";
				$target_file = $target_dir . basename($_FILES["image"]["name"]);

				$uploadOk = 1;
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				// Kiểm tra xem tập tin hình ảnh là hình ảnh thật hay hình ảnh giả
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check !== false) {
					echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "Tệp không phải là hình ảnh.";
					$uploadOk = 0;
				}
				// Kiểm tra xem tập tin đã tồn tại chưa
				if (file_exists($target_file)) {
					echo "Xin lỗi, tập tin đã tồn tại.";
					$uploadOk = 0;
				}
				// Kiểm tra kích thước tập tin
				if ($_FILES["image"]["size"] > 800000) {
					echo "Xin lỗi, tập tin của bạn quá lớn.";
					$uploadOk = 0;
				}
				// Cho phép các định dạng tệp nhất định
				if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
					echo "Xin lỗi, chỉ cho phép các tệp JPG, JPEG, PNG & GIF.";
					$uploadOk = 0;
				}
				//Kiểm tra xem $ uploadOk có bị lỗi thành 0 không
				if ($uploadOk == 0) {
					echo "Xin lỗi, tập tin của bạn không được tải lên.";
				// Nếu mọi thứ đều ổn, hãy thử tải lên tập tin
				} else {

					if (isset($_FILES['image']['name'])) {
                        //thêm @ để không hiển thị thông báo lỗi khi mà xóa 1 file không tồn tại
						@unlink($image);
					}

					if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						echo "The file ". basename( $_FILES["image"]["name"]). " Đã được tải lên.";
					} else {
						echo "Xin lỗi, đã xảy ra lỗi khi tải lên tệp của bạn.";
					}
				}

				$arr_params=[
					":id" => $id,
					':title' => $title, 
					':slug'	 => self::to_slug($title),
					':image' => $target_file,
					':price' => $price, 
					':featured' => $featured, 
					':desciption' => $desciption, 
					':status' => $status, 
					':cate_id' => $category_id, 
					':tag_id' => $tag_id,
					'updated_at'=> date("Y-m-d h:i:s", time()),
				];

				var_dump($arr_params);
				$product = new ProductModel();
				$is_insert = $product->update($arr_params);

				var_dump($is_insert);
				if ($is_insert) {
					$_SESSION['success'] = 'Sửa sản phẩm thành công';
				} else {
					$_SESSION['error'] = 'Sửa sản phẩm thất bại';
				}

				header("Location: index.php?controllers=product&action=index");
				exit();
			}
			
		}
		//lấy ra tất cả danh mục-tags đang có trên hệ thống
		$cate = new CateModel();
		$categories = $cate->index();

		$tag = new TagsModel();
		$tags = $tag->index();

		//gọi view
		include 'views/admin/product/edit.php';
	}

	public function delete()
	{
		$id = $_GET['id'];
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = "ID phải là số";
			header("Location: index.php?controllers=Cate&action=index");
			exit();
		}

		$product = new ProductModel();

		$product_unset = $product->getProById($id);
		$unset_img = $product_unset['image'];
		@unlink($unset_img);

		$isDelete = $product->destroy($id);

		if ($isDelete) {
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controllers=Product&action=index");
		exit();
	}


}




?>