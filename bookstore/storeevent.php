<html>
  <head>
    <meta charset="utf-8">
    <title>이벤트 조회</title>
    <style>
      * { padding: 0; margin: 0; list-style: none;}
      body {padding: 30px;}
      .tab_type1 ul {display: flex;}
      .tab_type1 ul li { flex: 5; border:3px solid #aaa;}
      font-size = 30px;
      table {width: 40%}
      th {height: 40px}
    </style>
    </head>
  <h1> 이벤트 조회</h1>
      <body>
        <nav class= "tab_type1">
      <table border="2">
      <thead>
          <tr>
            <th><b><a href="./membermain.html">회원 메인 페이지</a></b></th>
            <th><b><a href="./storeevent.php">이벤트 조회</a></b></th>
            <th><b><a href="./edit.php">개인정보 수정</a></b></th>
            <th><b><a href="./coupon.php">쿠폰 조회</a></b></th>
            <th><b><a href="./jumunbaesong.php">주문 내역 및 배송조회</a></b></th>
          </tr>
      </thead>
    </body>

    </table>
    </nav>


    </html>

<?php
 $con = mysqli_connect("localhost", "root", "1234", "bookstoredb")
  or die("MySQL 접속 실패!!!!");

 $sql = "SELECT * FROM event";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>이벤트 번호</th><th>이벤트 이름</th><th>이벤트 내용</th>";
 echo"<th>이벤트 시작일</th><th>이벤트 종료일</th><th>이벤트 상품</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['event_no'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['content'],"</td>";
   echo"<td>", $row['beginning'],"</td>";
   echo"<td>", $row['closing'],"</td>";
   echo"<td>", $row['stationery_number'],"</td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
