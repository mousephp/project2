<?php 
require_once 'models/CateModel.php';
require_once 'Helpers/Helper.php';

class CateController
{

	function index(){
		$cate = new CateModel();
		$cates=$cate->index();
		include 'views/admin/category/list.php';
	}

	function to_slug($str) {
		$hel=new Helper();
		$slug =$hel->to_slug($str);
		return $slug;
	}

	public function create() {
		$error = '';
        //xử lý submit form
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];

			if (empty($name)) {
				$error = "<span class='' style='color:red;text-center'>Name không được để trống</span>";
			}else {
				$cate = new CateModel();
				$cateArr = [
					':name' => $name,
					':slug'	=>self::to_slug($name)				
				];

				$isInsert = $cate->store($cateArr);
				if ($isInsert) {
					$_SESSION['success'] = "Thêm mới thành công";
				}
				else {
					$_SESSION['error'] = "Thêm mới thất bại";
				}
				header("Location: index.php?controllers=Cate&action=index");
				exit();
			}
		}
        //gọi view
		require_once 'views/admin/Category/add.php';
	}


	public function edit() {
		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "Tham số không hợp lệ";
			header("Location: index.php?controllers=Cate&action=index");
			exit();
		}
		if (!is_numeric($_GET['id'])) {
			$_SESSION['error'] = "Id phải là số";
			header("Location: index.php?controllers=Cate&action=index");
			exit();
		}

		$id = $_GET['id'];
		$cateModel = new CateModel();
		$cate = $cateModel->getCateById($id);
		$error = '';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
            //check validate dữ liệu
			if (empty($name)) {
				$error = "<span class='' style='color:red;'>Name không được để trống</span>";
			}else {
                //xử lý update dữ liệu vào hệ thống
				$cateModel = new CateModel();
				$cateArr = [
					'id' => $id,
					'name' => $name,
					':slug'	=>self::to_slug($name),
					'updated_at'=> date("Y-m-d h:i:s", time()),//sử dụng h:i:s=>true, h:i:sa=>false
				];
				//print_r($cateArr);
				$isUpdate = $cateModel->update($cateArr);
				if ($isUpdate) {
					$_SESSION['success'] = "<h4 class='text-center'>Update bản ghi #$id thành công</h4>";
				}
				else {
					$_SESSION['error'] = "<h4 class='text-center'>Update bản ghi #$id thất bại</h4>";
				}
				header("Location: index.php?controllers=Cate&action=index");
				exit();
			}
		}
        //truyền ra view
		require_once 'views/admin/Category/edit.php';
	}


	public function delete() {
		$id = $_GET['id'];
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = "ID phải là số";
			header("Location: index.php?controllers=Cate&action=index");
			exit();
		}

		$cate = new CateModel();
		$isDelete = $cate->destroy($id);

		if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
            //báo lỗi
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controllers=Cate&action=index");
		exit();
	}

}



?>