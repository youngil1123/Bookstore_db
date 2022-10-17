<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 로그인 과정</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
    <h1>회원 로그인 과정</h1>
    <?php

    $conn = mysqli_connect("localhost", "root", "1234" , "bookstoredb");
    if( $conn != true ){ echo("<script>alert('접속 실패');</script>");
         echo("<script>history.back();</script>");}

    $ID = $_POST['ID'];
    $PW = $_POST['PW'];

    $sql = "SELECT * FROM member WHERE ID ='{$ID}' and PW='{$PW}'";
    $result = mysqli_query($conn, $sql);
    $member = mysqli_fetch_array($result);

    $a = mysqli_query( $conn , $sql );
    if( $a ){ echo("로그인 성공"); }
    else { echo("로그인 실패"); }

    session_start();
    $_SESSION['ID'] = $ID;
    $_SESSION['PW'] = $PW;
    $_SESSION['NAME'] = $member['name'];
    $_SESSION['HPNO'] = $member['contact'];
    $_SESSION['MEMBER'] = "Y";


    $sql = "SELECT * FROM member WHERE ID ='{$ID}' and PW='{$PW}'";
    $result = mysqli_query($conn, $sql);

    if($ID=="admin"){
        echo "<script>alert('관리자 로그인')</script>";
        echo "<script>location.replace('admin.php')</script>";
    }else if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "로그인 성공";
            echo("<script>location.replace('membermain.html');</script>");
        }
    }else{
    ?>


    <script>
        alert("로그인 실패");
        history.back();
    </script>

    <?php
        mysqli_close($conn);
    }
    ?>

    <form action="test8.php" method="POST">
        <input class="button" type="submit" name="submit" value="마이페이지로 이동">
    </form>

</body>
</html>
