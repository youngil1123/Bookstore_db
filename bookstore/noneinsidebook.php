<html>
  <head>
    <meta charset="utf-8">
    <title>국내도서</title>
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
  <h1>국내도서 조회</h1>
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

 $sql = "SELECT * FROM domesticbook";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>국내도서번호</th><th>국내도서이름</th><th>판매가</th>";
 echo"<th>저자</th><th>출판사</th><th>쪽수</th><th>출시일</th><th>상태</th><th>담기</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['domestic_no'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['price'],"</td>";
   echo"<td>", $row['author'],"</td>";
   echo"<td>", $row['publisher'],"</td>";
   echo"<td>", $row['pages'],"</td>";
   echo"<td>", $row['release'],"</td>";
   echo"<td>", $row['status'],"</td>";
   echo "<TD>", "<a href='basket2.php?gubun=ibook&domestic_no=", $row['domestic_no'],"'>담기</a></td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
