<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 정보 전달</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
    <?php
        $conn = mysqli_connect("localhost", "root", "1234" , "bookstoredb");
        if( $conn != true ){ echo("<script>alert('접속 실패');</script>");
             echo("<script>history.back();</script>");}

        $ID = $_POST['ID'];
        $PW = $_POST['PW'];
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $birth = $_POST['birth'];
        $joindate = date("Y-m-d");

        $sql = "insert into member (ID,PW,name,contact,address,birth,joindate,coupon) VALUES ('$ID','$PW','$name','$contact','$address','$birth','$joindate',0);";

        $a = mysqli_query( $conn , $sql );
        if( $a ){
        ?>
        
        <script>
            alert("회원가입 성공");
            location.replace('member_login.php');
        </script>
        
        <?php
        }
        else {
        
        ?>
        
        <script>
            alert("회원가입 실패");
            history.back();
        </script>
        
        <?php

        }

    ?>
</body>
</html>