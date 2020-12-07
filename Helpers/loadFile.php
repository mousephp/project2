<?php
if (file_exists('controllers/' . $controllerName . '.php')) {
    include 'controllers/' . $controllerName . '.php';
} else {
    echo ('File Not Found !!');
}
/*
 *Tạo đối tượng file vừa load từ controller
 */
 var_dump($controllerName) ;
$controller = new $controllerName();

/*
 *Gọi method từ biến action truyền vào từ URL
 */
 
if (method_exists($controller, $action)) {
    $controller->$action();
} else {
    echo "Method not Found";
}
 