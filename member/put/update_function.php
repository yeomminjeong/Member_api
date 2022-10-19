<?php
    // settype($_POST['id'], 'integer');
    
    $conn = mysqli_connect('localhost','root','alswjd2300','member_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); 
    } else {
        echo '연결됐습니다.';
    }
 
    // parse_str(file_get_contents('php://input'),$data);
    $data = json_decode(file_get_contents('php://input'),true);
    
    #data[]
    $name = $data['mb_name'];
    $id = $data['mb_id'];
    $password = $data['mb_password'];
    $birth = $data['mb_birth'];
    $gender = $data['mb_gender'];
    $email = $data['mb_email'];
    $phone = $data['mb_phone'];
    
    // var_dump($data);
    // echo $name;

    $put_sql = "UPDATE member
        SET
            mb_name = '{$name}',
            mb_id = '{$id}',
            mb_password = '{$password}',
            mb_birth = '{$birth}',
            mb_gender = '{$gender}',
            mb_email = '{$email}',
            mb_phone = '{$phone}'
        WHERE
            id = {$_GET['id']}";
  

    //Get으로 받아서 sql result를 array로 바꾸고 foreach해서 접근? 


    $result = mysqli_query($conn,$put_sql);
    var_dump($result);
   

    if($result === false){
        die( '문제가 생겼습니다.'. mysqli_error());
    } else {
        echo '변경 됐습니다.';
    }

 
      
    //$_GET DB안에 있는 데이터 가져오기 
    //$_PUT 일치/불일치 맞춰서 수정하는 함수 생성
?>