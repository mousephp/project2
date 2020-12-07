<?php 
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');



//http://localhost/project2/index.php?controllers=User&action=login

//tk-user
// hung@gmail.com/123456
// admin@gmail.com/1234567


//url: admin
//index?controllers=Cate&action=create

if (isset($_GET['controllers'] )){
	
	if($_GET['controllers'] =='Home'){
		$controllerName = $_GET['controllerName'] ?? 'HomeController';
	}
	if($_GET['controllers'] =='User'){
		$controllerName = $_GET['controllerName'] ?? 'UserController';
	}
	if ($_GET['controllers'] =='Cate'){
		$controllerName = $_GET['controllerName'] ?? 'CateController';
	}
	if ($_GET['controllers'] =='Product'){
		$controllerName = $_GET['controllerName'] ?? 'ProductController';
	}
	if ($_GET['controllers'] =='Tags'){
		$controllerName = $_GET['controllerName'] ?? 'TagsController';
	}
	if ($_GET['controllers'] =='Com'){
		$controllerName = $_GET['controllerName'] ?? 'ComController';
	}
}else{
	$controllerName = $_GET['controllerName'] ?? 'ClientController' ;
}

$action = $_GET['action'] ?? 'index';
/*
 *Load loadfile.php
 */
include 'Helpers/loadFile.php';
//$database->index();


?>