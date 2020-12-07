<?php 
require_once 'models/ProductModel.php';

class CartController
{
	public $error;
	public function index()
	{
		require_once 'views/client/checkout.php';
	}

	public function create()
	{		
		$id = $_GET['id'];

		$product_model = new Product();
		$product = $product_model->getProductCartById($id);

		$product_item = [
			'title' => $product['title'],
			'price' => $product['price'],
			'image' => $product['avatar'],
			'quality' => 1
		];

		if (!isset($_SESSION['cart'])) {
			$_SESSION['cart'][$id] = $product_item;
			$_SESSION['cart']['total'] = $product['price'];
		}
		else {
			if (array_key_exists($id, $_SESSION['cart'])) {
				$_SESSION['cart'][$id]['quality']++;
			}else {
				$_SESSION['cart'][$id] = $product_item;
			}
			$_SESSION['cart']['total'] += $product['price'];
		}

		$url_redirect = 'gio-hang-cua-ban';
		header("Location: $url_redirect");
		exit();
	}

	public function delete()
	{

	}



}





?>