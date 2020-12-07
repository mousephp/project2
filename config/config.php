<?php
/*
*Dùng các biến $autoload và $autoloadModel để load tất cả các file trong core và model
*/
$autoload = [
    'CateController',
    'HomeController',
    'ProductController',
    'TagsController',
   
    'CartController',
    'ClientController',
     'UserController',
];
$autoloadModel = [
    'CateModel',
    'ProductModel',
    'TagsModel',
    'UserModel',
];