<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>배송조회</title>
</head>

</html>

<?php
   $con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

   $sql ="SELECT * FROM delivery";
 
   $ret = mysqli_query($con, $sql);   
   if($ret) {
	   //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
	   $count = mysqli_num_rows($ret);
   }
   else {
	   echo "<br>"."배송 데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   exit();
   } 
   
   echo "<h3> 배송 조회 결과 </h3>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>운송장번호</TH><TH>배송시작날짜</TH><TH>이름</TH><TH>연락처</TH><TH>주소</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($ret)) {
	  echo "<TR>";
	  echo "<TD>", $row['delivery_no'], "</TD>";
	  echo "<TD>", $row['departure'], "</TD>";
	  echo "<TD>", $row['name'], "</TD>";
	  echo "<TD>", $row['contact'], "</TD>";
	  echo "<TD>", $row['address'], "</TD>";
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE><br>"; 
   echo "<html><button onclick='location.replace(".'"admin.php"'.")'>이전</button></html>";
?>