<?php
// $a = var_dump($_POST);
// echo mysqli_error($a);


$conn = mysqli_connect('localhost','root','alswjd2300','member_db');
settype($_GET['id'],'integer');
$sql = "DELETE FROM member WHERE id = {$_GET['id']}";
$result = mysqli_query($conn, $sql);



if($result === false){
    echo '문제가 생겼습니다.';
} else {

    echo '삭제 됐습니다.';
}
?>