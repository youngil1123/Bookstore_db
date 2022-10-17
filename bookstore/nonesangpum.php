<html>
  <head>
    <meta charset="utf-8">
    <title>상품권</title>
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
  <h1>상품권 조회</h1>


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
 $con = mysqli_connect("localhost", "root", "1234", "bookstoredb")
  or die("MySQL 접속 실패!!!!");

 $sql = "SELECT * FROM giftcard";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>상품권번호</th><th>품명</th><th>가격</th>";
 echo"<th>제조사</th><th>담기</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['gift_no'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['price'],"</td>";
   echo"<td>", $row['maker'],"</td>";
   echo "<TD>", "<a href='basket2.php?gubun=sangpum&gift_no=", $row['gift_no'],"'>담기</a></td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
