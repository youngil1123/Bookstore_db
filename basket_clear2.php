<?php
session_start();
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_SESSION["ID"];
echo $id;

$sql="SET foreign_key_checks=0";
mysqli_query($con, $sql);

$sql="DELETE from basket2 WHERE ID = '{$id}';";
mysqli_query($con, $sql);

$sql =" ALTER TABLE basket2 AUTO_INCREMENT=1;";
mysqli_query($con, $sql);

?>


<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장바구니 초기화</title>
</head>

<body>

    <script>
        alert('장바구니가 초기화 되었습니다.');
        history.go(-2)
    </script>
</body>

</html>