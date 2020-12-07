<?php 
require_once 'models/UserModel.php';

class UserController{
	public $cookie_time = (3600 * 24 * 30); 
	public $cookie_name = 'siteAuth';

	//Danh sách users
	public function index(){
		$user = new UserModel();
		$users = $user->index();
		include 'views/admin/user/list.php';
	}

	//Thêm
	public function create() {
		$error = '';
        //xử lý submit form
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password1 = $_POST['password1'];
			$password2 = $_POST['password2'];
			$level = $_POST['level'];
			if($password1!==$password2 || empty($_POST['name'])){
				header("Location: index.php?controllers=User&action=create");
				setcookie("error", "Bạn cần diền đầy đủ thông tin || Mật khẩu phải trùng nhau!", time()+1, "/","", 0);
			}else {
				$user = new UserModel();
				$password=md5($password1);//c1
				
				$userArr = [
					':name' => $name,
					':email' => $email,
					':password' => $password,
					':level' => $level,
				];

				$isInsert = $user->store($userArr);
				if ($isInsert) {
					$_SESSION['success'] = "Thêm mới thành công";
				}
				else {
					$_SESSION['error'] = "Thêm mới thất bại";
				}
				header("Location: index.php?controllers=User&action=index");
				exit();
			}
		}
        //gọi views
		require_once 'views/admin/user/add.php';
	}

	//Sửa
	public function edit() {
		if (!isset($_GET['id'])) {
			$_SESSION['error'] = "Tham số không hợp lệ";
			header("Location: index.php?controllers=User&action=index");
			exit();
		}
		if (!is_numeric($_GET['id'])) {
			$_SESSION['error'] = "Id phải là số";
			header("Location: index.php?controllers=User&action=index");
			exit();
		}

		$id = $_GET['id'];
        //gọi model để lấy ra đối tượng sách theo id
		$UserModel = new UserModel();
		//$user duoc truyền sang getuserById và biến $user sẽ show ra views edit
		$user = $UserModel->getuserById($id);

        //xử lý submit form, lặp lại thao tác khi submit lúc thêm mới
		$error = '';
		if (isset($_POST['submit'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$de_password = $_POST['de_password'];
			$ag_password = $_POST['ag_password'];
			$level = $_POST['level'];
			var_dump($name,$email,$password,$de_password,$ag_password,$level);

            //check validate dữ liệu
			if($de_password!=$ag_password || empty($name)){
				header("Location: index.php?controllers=User&action=edit&id=$id");
				setcookie("error", "Bạn cần diền đầy đủ thông tin || Mật khẩu phải trùng nhau!", time()+1, "/","", 0);
			}else {
                //xử lý update dữ liệu vào hệ thống
				$UserModel = new UserModel();
				$pass=md5($password);
				
				//kiem tra tai khoan mat khau cu
				$userlogin = [
					':email' => $email,
					':password' => $pass,
				];
				$isPass = $UserModel->password($userlogin);
				if ($isPass<=0) {
					header("Location: index.php?controllers=User&action=edit&id=$id");
					setcookie("error", "Bạn cần diền đầy đủ thông tin || Mật khẩu không trùng nhau!", time()+1, "/","", 0);
				}

				//update tai khoan mat khau moi
				$agian_password=md5($de_password);
				if ($isPass) {
					$userArr = [
						'id' => $id,
						':name' => $name,
						':email' => $email,
						':agian_password' => $agian_password,				
						':level' => $level,
						':updated_at'=> date("Y-m-d h:i:s", time()),
					];

					$isUpdate = $UserModel->update($userArr);
					if ($isUpdate) {
						$_SESSION['success'] = "<h4 class='text-center'>Update bản ghi #$id thành công</h4>";
					}
					else {
						$_SESSION['error'] = "<h4 class='text-center'>Update bản ghi #$id thất bại</h4>";
					}
					header("Location: index.php?controllers=User&action=index");
					exit();
				} 

			}
		}
        //truyền ra views
		require_once 'views/admin/user/edit.php';
	}

	//Xóa
	public function delete() {
		$id = $_GET['id'];
		if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
			$_SESSION['error'] = "ID phải là số";
			header("Location: index.php?controllers=User&action=index");
			exit();
		}

		$user = new UserModel();
		$isDelete = $user->destroy($id);

		if ($isDelete) {
            //chuyển hướng về trang liệt kê danh sách
            //tạo session thông báo mesage
			$_SESSION['success'] = "<h4 class='text-center'>Xóa bản ghi #$id thành công</h4>";
		}else {
            //báo lỗi
			$_SESSION['error'] = "<h4 class='text-center'>Xóa bản ghi #$id thất bại</h4>";
		}
		header("Location: index.php?controllers=User&action=index");
		exit();
	}

	//Đăng nhập
	public function login(){
		//kiểm tra nếu cookie tồn tại thì chuyền hướng sang index.php
		if(isset($_COOKIE["siteAuth"])){
			echo "cookie vẫn còn tồn tại";
			header('Location: index.php');
		}else{
			echo "cookie đã bị hủy";
		}
		
		if(isset($_POST["login"])){
			$cookie_time = (3600 * 24 * 30); 
			$cookie_name = 'siteAuth';
			$a_check=((isset($_POST['remember'])!=0)?1:"");

			$email = $_POST["email"];
			$password =md5($_POST["password"]);
			//$password=crypt($pass,'$1$pass$');
			var_dump($email,$password);

			if(empty($email)){
				header("Location: index.php?controllers=User&action=login");
				setcookie("error", "Bạn cần diền đầy đủ thông tin", time()+1, "/","", 0);
			}else {

				$UserModel = new UserModel();

				$userArr = [
					':email' => $email,
					':_password' => $password,
				];

				$isLogin = $UserModel->login($userArr);
				var_dump("hung",$isLogin);

				$row=$isLogin;
				$f_user=$row['email'];					
				$f_pass=$row['password'];

				print_r($f_pass);
				if($f_user==$email && $f_pass==$password){
					$_SESSION['username']=$f_user;
					$_SESSION['password']=$f_pass;
					if($a_check==1){
						setcookie($cookie_name, 'usr='.$f_user.'&hash='.$f_pass, time() + $cookie_time);
					}
				}

				//khi đăng nhập thành công
				if($isLogin){					
					$_SESSION["loged"] = true;
					$_SESSION["email"] = $_POST["email"];
					header("Location: index.php?controllers=Product&action=index");
					//setcookie("success", "Đăng nhập thành công!", time()+1, "/","", 0);
				} else{
					header("Location: index.php?controllers=User&action=login");
					//setcookie("error", "Đăng nhập không thành công!", time()+1, "/","", 0);
					$_SESSION['error'] = "<h4 class='text-center'>Đăng nhập thất bại</h4>";
				}
			}

		}
		require_once 'views/login.php';
	}

	//đăng xuất
	public function logout(){
		//session
		session_destroy();
		header("Location: index.php?controllers=User&action=login");
		setcookie("siteAuth", "", time() + 0);
	}




}
