<?php 

require_once 'models/TagsModel.php';

class TagsController
{

	function index(){
		$tag = new TagsModel();
		$tags=$tag->index();
		include 'views/admin/tags/list.php';
	}

	function create(){
		$error = '';
        //xử lý submit form
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];

			if (empty($name)) {
				$error = "Name không được để trống";
			}else {
				$tags = new TagsModel();
				$tagsArr = [
					':name' => $name					
				];

				$isInsert = $tags->store($tagsArr);
				if ($isInsert) {
					$_SESSION['success'] = "Thêm mới thành công";
				}
				else {
					$_SESSION['error'] = "Thêm mới thất bại";
				}
				header("Location: index.php?controllers=Tags&action=index");
				exit();
			}
		}
        //gọi view
		require_once 'views/admin/tags/add.php';
	}

	function edit(){
		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "Tham số không hợp lệ";
			header("Location: index.php?controllers=Tags&action=index");
			exit();
		}
		if (!is_numeric($_GET['id'])) {
			$_SESSION['error'] = "Id phải là số";
			header("Location: index.php?controllers=Tags&action=index");
			exit();
		}

		$id = $_GET['id'];
		$tagsModel = new TagsModel();
		$tags = $tagsModel->getTagsById($id);
		$error = '';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
            //check validate dữ liệu
			if (empty($name)) {
				$error = "Name không được để trống";
			}else {
                //xử lý update dữ liệu vào hệ thống
				$tagsModel = new TagsModel();
				$tagsArr = [
					'id' => $id,
					'name' => $name,
					'updated_at'=> date("Y-m-d h:i:s", time()),
				];
				$isUpdate = $tagsModel->update($tagsArr);
				if ($isUpdate) {
					$_SESSION['success'] = "<h4 class='text-center'>Update bản ghi #$id thành công</h4>";
				}
				else {
					$_SESSION['error'] = "<h4 class='text-center'>Update bản ghi #$id thất bại</h4>";
				}
				header("Location: index.php?controllers=Tags&action=index");
				exit();
			}
		}
        //truyền ra view
		require_once 'views/admin/tags/edit.php';
	}
	
	function delete(){
		$id = $_GET['id'];
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = "ID phải là số";
			header("Location: index.php?controllers=Tags&action=index");
			exit();
		}

		$tags = new TagsModel();
		$isDelete = $tags->destroy($id);

		if ($isDelete) {
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
            //báo lỗi
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controllers=Tags&action=index");
		exit();
	}
	

}

 ?>