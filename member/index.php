<?php
    include './lib/db_info.php';

    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //URI 호출
                                                             //[scheme], [host], [path], [query], [fragment]
                                                             // PHP_URL_PATH : 파일의 경로
    echo $uri;
    $requestMethod = $_SERVER["REQUEST_METHOD"]; //요청 method
    echo $requestMethod;
    
    
    switch($requestMethod){
        case 'GET':
            require_once "./get/get_function.php"; //function.php 호출 후 종료
            break;
        case 'POST':
            require_once "./post/post_function.php";
            break;
        case 'PUT':
            require_once "./put/update_function.php";  
            break;
        case 'DELETE':
            require_once "./delete/delete_function.php";  
            break;
        default:
            echo "REQUEST_METHOD가 필요합니다.";    
            break;
    }
?>


