<html>
  <head>
    <meta charset="utf-8">
    <title>문구</title>
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
  <h1>문구 조회</h1>
      <body>
        <nav class= "tab_type1">
      <table border="2">
      <thead>
          <tr>
            <th><b><a href="./nonemembermain.html">비회원 메인 페이지</a></b></th>
            <th><b><a href="./nonejumunbaesong.php">주문 내역 및 배송조회</a></b></th>
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


 $sql = "SELECT * FROM stationery";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>상품번호</th><th>상품군</th><th>제조사</th>";
 echo"<th>품명 및 모델명</th><th>판매가</th><th>제조국</th><th>수입여부</th><th>담기</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['stationery_no'],"</td>";
   echo"<td>", $row['type'],"</td>";
   echo"<td>", $row['maker'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['price'],"</td>";
   echo"<td>", $row['manuCountry'],"</td>";
   echo"<td>", $row['import'],"</td>";
   echo "<TD>", "<a href='./basket2.php?gubun=mungu&stationery_no=", $row['stationery_no'],"'>담기</a></td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
