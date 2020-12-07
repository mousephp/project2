<?php 
require_once 'config/db.php';

class TagsModel extends Database{

	function index(){
		$querySelect = $this->conn->prepare("SELECT * FROM tags");
		$querySelect->execute();
		$category = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $category;
	}

	//them
	public function store($param = []) {
		$queryInsert = $this->conn->prepare("INSERT INTO tags(name) VALUES (:name) ");
		$isInsert = $queryInsert->execute($param);	
		return $isInsert;
	}

	//lay id 
	public function getTagsById($id) {
		$querySelect = $this->conn->prepare("SELECT * FROM tags WHERE id=:id");
		$querySelect ->bindParam(':id',$id);
		$querySelect ->execute();
		$user = $querySelect->fetch(PDO::FETCH_ASSOC);
		return $user;
	}

	public function update($param = []) {
		$queryUpdate =$this->conn->prepare("UPDATE tags SET name = :name,updated_at = :updated_at WHERE id = :id ");//
		$isUpdate=$queryUpdate->execute($param);
		return $isUpdate;
	}

	//delete
	public function destroy($id = null) {
			$queryDelete =$this->conn->prepare("DELETE FROM tags WHERE id = :id");
			$queryDelete->bindParam(':id',$id);
			$isDelete = $queryDelete->execute();
			return $isDelete;
	}


	}

	?>