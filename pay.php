<?php
   $con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

   $sql ="SELECT * FROM pay";
   
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

   $sql_sum ="SELECT sum(total) FROM pay";
   $ret_sum = mysqli_query($con, $sql_sum);
   $total_sum=mysqli_fetch_array($ret_sum)[0];
   
   echo "<h3> 결제 조회 결과 </h3>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>결제 번호</TH><TH>결제 금액</TH><TH>결제 할인</TH><TH>결제 합계 금액</TH><TH>결제 방식</TH><TH>장바구니 번호</TH>";
   echo "</TR>";
   
   while($row = mysqli_fetch_array($ret)) {
	  echo "<TR>";
	  echo "<TD>", $row['pay_no'], "</TD>";
	  echo "<TD>", $row['sum'], "</TD>";
	  echo "<TD>", $row['discount'], "</TD>";
	  echo "<TD>", $row['total'], "</TD>";
	  echo "<TD>", $row['paymentplan'], "</TD>";
      echo "<TD>", $row['basket_number'], "</TD>";
	  echo "</TR>";	  
   }   
   mysqli_close($con);
   echo "</TABLE>"; 
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>결제 조회</title>
</head>

<body>

    <BR>
    <button onclick='location.replace("admin.php")'>이전</button>
    <button onclick=btn()>매출액 확인</button>
    <BR><BR>
</body>

<script>

    function btn() {
        alert("총 매출액 : <?=$total_sum?> 원");
    }

</script>

</html>