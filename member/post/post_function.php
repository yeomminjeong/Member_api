<?php
    $conn = mysqli_connect('localhost','root','alswjd2300','member_db');

    #json to php array
    $data = json_decode(file_get_contents('php://input'),true);

    #connection check
    $conn = mysqli_connect('localhost','root','alswjd2300','member_db');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error); 
    } else {
        echo '연결됐습니다.';
    }

    # $data[]
    $name = $data['mb_name'];
    $id = $data['mb_id'];
    $password = $data['mb_password'];
    $birth = $data['mb_birth'];
    $gender = $data['mb_gender'];
    $email = $data['mb_email'];
    $phone = $data['mb_phone'];
    
    $sql = "INSERT INTO member
           (mb_name, mb_id, mb_password, mb_birth, mb_gender, mb_email, mb_phone, mb_created_at)
        VALUES(
            '$name',
            '$id',
            '$password',
            '$birth',
            '$gender',
            '$email',
            '$phone',
            NOW()
        )
    ";

    echo "\n";
    // echo var_dump($mb_name);
    // echo var_dump($mb_id);
    // echo var_dump($sql);


    $result = mysqli_query($conn,$sql);
    echo var_dump($result);

    if($result === false){
        echo '문제가 생겼습니다.';
    } else {
        echo '성공했습니다.';
    }


?>