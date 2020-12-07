<?php 
require_once 'config/db.php';

class UserModel extends Database{
	// public $id;
	// public $name;

	function index(){
		$querySelect = $this->conn->prepare("SELECT * FROM users");
		$querySelect->execute();
		$category = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $category;
	}

	
	//them
	public function store($param = []) {
		$queryInsert = $this->conn->prepare("INSERT INTO users(name,email,password,level) 
			VALUES (:name,:email,:password,:level) ");
		$isInsert = $queryInsert->execute($param);
		return $isInsert;
	}


	//lay id 
	public function getUserById($id) {
		$querySelect = $this->conn->prepare("SELECT * FROM users WHERE id=:id");
		$querySelect ->bindParam(':id',$id);
		$querySelect ->execute();
		$user = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $user[0];
	}




	//Remember me
	public function Remember_me($param=[]){
		$login =$this->conn->prepare("SELECT * FROM users WHERE email = :usr AND password = :&hash ");
		$login->execute($param);
		$count = $login->fetch(\PDO::FETCH_ASSOC);
		return $count;
	}


	public function password($param = []){
		$login =$this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :password ");
		$login->execute($param);
		$count = $login->fetch(\PDO::FETCH_ASSOC);
		return $count;
	}

	public function update($param = []) {
			$queryUpdate =$this->conn->prepare("UPDATE users SET name = :name,email = :email,password = :agian_password,level = :level, updated_at = :updated_at WHERE id = :id ");//
			$isUpdate=$queryUpdate->execute($param);
			return $isUpdate;
	}

	//delete
	public function destroy($id = null) {
		$queryDelete =$this->conn->prepare("DELETE FROM users WHERE id = :id");
		$queryDelete->bindParam(':id',$id);
		$isDelete = $queryDelete->execute();
		return $isDelete;
	}

	public function login($param = []){
		$login =$this->conn->prepare("SELECT * FROM users WHERE email = :email AND password = :_password ");
		$login->execute($param);
		$count = $login->fetch(\PDO::FETCH_ASSOC);
		return $count;
	}


}

?>