<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원정보 수정</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
     <h1>회원정보 수정</h1>
     <?php
     session_start();
     
     $conn = mysqli_connect("localhost", "root", "1234" , "bookstoredb");
     if( $conn != true ){ echo("<script>alert('접속 실패');</script>");
          echo("<script>history.back();</script>");}

     $newPW = $_POST['newPW'];
     $newname = $_POST['newname'];
     $newcontact = $_POST['newcontact'];
     $newaddress = $_POST['newaddress'];

     $ID = $_SESSION['ID'];

     if(($newPW != NULL)||($newname != NULL)||($newcontact != NULL)||($newaddress != NULL)){
          if($newname != NULL){
               $sql = "UPDATE member
               SET name = '$newname'
               WHERE ID = '$ID'";
               $result = mysqli_query($conn, $sql);
          }
          if($newcontact != NULL){
               $sql = "UPDATE member
               SET contact = '$newcontact'
               WHERE ID = '$ID'";
               $result = mysqli_query($conn, $sql);
          }
          if($newaddress != NULL){
               $sql = "UPDATE member
               SET address = '$newaddress'
               WHERE ID = '$ID'";
               $result = mysqli_query($conn, $sql);
          }
          if($newPW != NULL){
               $sql = "UPDATE member
               SET PW = '$newPW'
               WHERE ID = '$ID'";
               $result = mysqli_query($conn, $sql);
          ?>
          <script>
               alert("개인정보가 변경되었습니다.\n다시 로그인해주세요.");
               location.replace('member_login.php');
          </script>
          <?php
          }
          echo("<script>alert('변경되었습니다.');</script>");
          echo("<script>location.replace('edit.php');</script>");
     }
     else{
          ?>
          <script>
               alert("변경된 정보가 없습니다.");
               location.replace('edit.php');
          </script>
          <?php
     }

     ?>
</body>
</html>