<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>마이 페이지</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
     <h1>마이 페이지</h1>
     <?php
     session_start();
     
     $conn = mysqli_connect("localhost", "root", "1234" , "bookstoredb");
     if( $conn != true ){ echo("<script>alert('접속 실패');</script>");
          echo("<script>history.back();</script>");}

     $sql = "SELECT * FROM member WHERE ID ='{$_SESSION['ID']}' and PW='{$_SESSION['PW']}'";
     $result = mysqli_query($conn, $sql);

     echo "<style>td { border:1px solid #ccc; padding:5px; }</style>";
     echo "<table><tbody>";    

     if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
               echo "<tr><td>아이디</td><td>" . $row["ID"]. 
               "</td></tr><tr><td>비밀번호</td><td>" . $row["PW"]. 
               "</td></tr><tr><td>이름</td><td>" . $row["name"]. 
               "</td></tr><tr><td>전화번호</td><td>" . $row["contact"]. 
               "</td></tr><tr><td>주소</td><td>" . $row["address"]. 
               "</td></tr><tr><td>생일</td><td>" . $row["birth"]. 
               "</td></tr><tr><td>가입일</td><td>" . $row["joindate"]. 
               "</td></tr><tr><td>쿠폰</td><td>" . $row["coupon"]. 
               "</td></tr><br>";
          }
     }else{
     ?>

     <script>
          alert("로그인에 실패하였습니다.\n로그인 페이지로 이동합니다.");
          location.href='index.php';
     </script>

     <?php
          echo "</tbody></table>";          
          mysqli_close($conn);
     }  
     ?>

     <form action="edit.php" method="POST">
          <input class="button" type="submit" name="submit" value="수정하기">
     </form>

     <br>
     <input class="button" type="submit" onclick="test();" value="탈퇴하기">
     

     <script>
          function test() {
               if (!confirm("탈퇴하시겠습니까?")) {
               } else {
                    location.replace('unsubscribe.php');
               }
    }
     </script>

</body>
</html>