<html>
  <head>
    <meta charset="utf-8">
    <title>음반</title>
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
  <h1> 음반 조회</h1>
      <body>
        <nav class= "tab_type1">
      <table border="2">
      <thead>
          <tr>
            <th><b><a href="./membermain.html">회원 메인 페이지</a></b></th>
            <th><b><a href="./storeevent.php">이벤트 조회</a></b></th>
            <th><b><a href="./mypage.php">마이페이지</a></b></th>
            <th><b><a href="./coupon.php">쿠폰 조회</a></b></th>
            <th><b><a href="./jumunbaesong.php">주문 내역 및 배송조회</a></b></th>
          </tr>
      </thead>
    </body>

    </table>
    </nav>


    </html>

<?php
session_start();
 $con = mysqli_connect("localhost", "root", "1234", "bookstoredb")
  or die("MySQL 접속 실패!!!!");
$session_id= session_id();


 $sql = "SELECT * FROM record";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>음반 번호</th><th>아티스트</th><th>앨범명</th>";
 echo"<th>제작자</th><th>레이블</th><th>판매가</th><th>발매일</th><th>담기</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['record_no'],"</td>";
   echo"<td>", $row['artist'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['producer'],"</td>";
   echo"<td>", $row['label'],"</td>";
   echo"<td>", $row['price'],"</td>";
   echo"<td>", $row['release'],"</td>";
   echo "<TD>", "<a href='./basket.php?gubun=music&record_no=", $row['record_no'],"'>담기</a></td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
