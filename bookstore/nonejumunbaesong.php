<html>
  <head>
    <meta charset="utf-8">
    <title>주문내역 및 배송조회</title>
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
  <h1>주문내역 및 배송조회</h1>
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
 $guest_contact = $_SESSION['guest_contact'];
 //echo $guest_contact;
 $my_id = $_SESSION['ID'];
$my_id = $_SESSION['guest_name'];

 $sql ="SELECT * from delivery where name = '$my_id'";
 $ret = mysqli_query($con, $sql);

 echo"<TABLE border=1>";
 echo"<tr>";
 echo"<th>운송장번호</th><th>배송시작날짜</th><th>이름</th>";
 echo"<th>연락처</th><th>주소</th>";
 echo"</tr>";
 while($row = mysqli_fetch_array($ret)) {
   echo"<TR>";
   echo"<td>", $row['delivery_no'],"</td>";
   echo"<td>", $row['departure'],"</td>";
   echo"<td>", $row['name'],"</td>";
   echo"<td>", $row['contact'],"</td>";
   echo"<td>", $row['address'],"</td>";
   echo "</TR>";
 }

 mysqli_close($con);
 echo "</table>";
?>
