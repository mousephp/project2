<?php 
require_once 'config/db.php';

class ProductModel extends Database
{
	
	function index(){
		$querySelect = $this->conn->prepare("SELECT * FROM products");
		$querySelect->execute();
		$product = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $product;
	}

	
	//them
	public function store($param = []) {
		$queryInsert = $this->conn->prepare("INSERT INTO products(title,slug,price,image,status,featured,desciption,cate_id,tag_id) VALUES (:title, :slug, :price, :image, :status, :featured, :desciption, :cate_id, :tag_id) ");
		$isInsert = $queryInsert->execute($param);
		return $isInsert;
	}


	//lay id 
	public function getProById($id) {
		$querySelect = $this->conn->prepare("SELECT * FROM products WHERE id=:id");
		$querySelect ->bindParam(':id',$id);
		$querySelect ->execute();
		$product = $querySelect->fetch(PDO::FETCH_ASSOC);
		return $product;
	}

	public function getTag() {
		$querySelect = $this->conn->prepare("SELECT tag_id FROM products");
		$querySelect->execute();
		$productTag = $querySelect->fetchAll(PDO::FETCH_ASSOC);
		return $productTag;
	}

	//sua (luy y sử dụng dấu ` ` hoặc không sử dụng trong truong csdl)
	public function update($pro = []) {
		$queryUpdate =$this->conn->prepare("UPDATE products SET title = :title, slug=:slug, price = :price, image = :image, status = :status, featured = :featured, desciption = :desciption, cate_id= :cate_id, tag_id = :tag_id, updated_at = :updated_at WHERE id = :id ");
		$isUpdate=$queryUpdate->execute($pro);	
		return $isUpdate;
	}

	//delete
	public function destroy($id = null) {
		$queryDelete =$this->conn->prepare("DELETE FROM products WHERE id = :id");
		$queryDelete->bindParam(':id',$id);
		$isDelete = $queryDelete->execute();
		return $isDelete;
	}

	public function getProductCartById($id=null)
	{
		$obj_select =$this->conn->prepare("SELECT id, title, price, image FROM products WHERE id = :id ");
		$obj_select ->bindParam(':id',$id);
		$obj_select->execute();
		$products = $obj_select->fetch(PDO::FETCH_ASSOC);
		return $products;
	}

}



?>