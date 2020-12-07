<?php 
require_once 'models/ProductModel.php';
require_once 'models/CateModel.php';
require_once 'models/TagsModel.php';

class ClientController
{
	
	public function index()
	{
		$product=new ProductModel();
		$products=$product->index();
		$category=new CateModel();
		
		include 'views/client/index.php';
	}


	public function detail()
	{
		$id = $_GET['id'];
		$product=new ProductModel();

		//lấy chi tiết sản phẩm
		$isPro=$product->getProById($id);

		//lấy ra tag_id trong table products
		$getTags=$product->getTag();

		//lấy chi tiết tags
		$tag=new TagsModel();
		$isTag=$tag->getTagsById($id);
		$tags=$tag->index();

		include 'views/client/detail.php';
	}

	/*

*/

	public $error;
	public function cart()
	{		
		$id = $_GET['id'];

		$product_model = new ProductModel();
		$product = $product_model->getProductCartById($id);
		$duct = $product_model->getProductCartById($id);

		$product_item = [
			'title' => $product['title'],
			'price' => $product['price'],
			'image' => $product['image'],
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

		include 'views/client/checkout.php';
		exit();
	}


	public function deleteCart()
	{	

		$id = $_GET['id'];

        //xóa sản phẩm trong giỏ hàng tương đương với việc xóa mảng tương ứng theo key - id sản phẩm
		//bước đầu tiên là cập nhật lại tổng giá trị đơn hàng total trước khi xóa
		$price_total_item =
		$_SESSION['cart'][$id]['quality']
            * $_SESSION['cart'][$id]['price'];
		$_SESSION['cart']['total'] -= $price_total_item;

        //sau đó mới thực hiện xóa sản phẩm khỏi đơn hàng
		unset($_SESSION['cart'][$id]);

        //trường hợp giỏ hàng trống thì cần unset mảng cart này đi
		if ($_SESSION['cart']['total'] == 0) {
			unset($_SESSION['cart']);
		}
		include 'views/client/checkout.php';
		exit();
	}









}






?>