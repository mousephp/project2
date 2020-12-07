<?php 
require_once 'config/db.php';

class CateModel extends Database{
	// public $id;
	// public $name;

	function index(){
		$querySelect = $this->conn->prepare("SELECT * FROM categories");
		$querySelect->execute();
		$category = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $category;
	}
	
	//them
	public function store($param = []) {
		$queryInsert = $this->conn->prepare("INSERT INTO categories(name,slug) VALUES (:name, :slug) ");
		$isInsert = $queryInsert->execute($param);	
		return $isInsert;
	}

	//lay id 
	public function getCateById($id) {
		$querySelect = $this->conn->prepare("SELECT * FROM categories WHERE id=:id");
		$querySelect ->bindParam(':id',$id);
		$querySelect ->execute();
		$cate = $querySelect->fetch(PDO::FETCH_ASSOC);
		return $cate;
	}

	public function update($cate = []) {
		$queryUpdate =$this->conn->prepare("UPDATE categories SET name = :name, slug=:slug, updated_at = :updated_at WHERE id = :id ");//
		$isUpdate=$queryUpdate->execute($cate);	
		return $isUpdate;
	}

	//delete
	public function destroy($id = null) {		
		$queryDelete =$this->conn->prepare("DELETE FROM categories WHERE id = :id");
		$queryDelete->bindParam(':id',$id);
		$isDelete = $queryDelete->execute();
		return $isDelete;
	}
	
}

?>