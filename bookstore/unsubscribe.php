<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>탈퇴</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
    <h1>탈퇴</h1>

    <?php
    session_start();
    
    $conn = mysqli_connect("localhost", "root", "1234" , "bookstoredb");
    if( $conn != true ){ echo("<script>alert('접속 실패');</script>");
         echo("<script>history.back();</script>");}

    $ID = $_SESSION['ID'];
    $PW = $_SESSION['PW'];

    $sql = "DELETE FROM member WHERE ID = '$ID' ";
    $result = mysqli_query($conn, $sql);

    $a = mysqli_query( $conn , $sql );
        if( $a ){ echo("<script>alert('탈퇴되었습니다.');</script>");
            echo("<script>location.replace('index.php');</script>"); }
        else { echo("탈퇴 실패");
            echo "실패 원인 :".mysqli_error($conn);
            ; }
        

        
    ?>

    
</body>
</html>