<?php 
    header('Content-type: application/json');
    header('Access-Controle-Allow-Origin:*');
    
    $sql = 'SELECT * FROM member';
    $result = mysqli_query($conn,$sql);
    

    if(isset($_GET['id'])){ //설정 되어 있는지 확인
        $sql = "SELECT *
            FROM member 
            WHERE id = {$_GET['id']}";
        $result = mysqli_query($conn,$sql);
        while($row = mysqli_fetch_assoc($result)){

            $json_result = array(
                'name' => $row['mb_name'],
                'id' => $row['mb_id'],
                'password' => $row['mb_password'],
                'birth' => $row['mb_birth'],
                'emailAddress' => $row['mb_email'],
                'phone' => $row['mb_phone'],
                'created' => $row['mb_created_at']
            );

           echo json_encode($json_result,JSON_UNESCAPED_UNICODE);

        }
    } else {
        while($row = mysqli_fetch_assoc($result)){
            
            $json_result = array(
                'name' => $row['mb_name'],
                'id' => $row['mb_id'],
                'password' => $row['mb_password'],
                'birth' => $row['mb_birth'],
                'email' => $row['mb_email'],
                'phone' => $row['mb_phone'],
                'created' => $row['mb_created_at']
            );
            echo json_encode($json_result,JSON_UNESCAPED_UNICODE);
        }
        exit;
    }
?>
