<?php
   $con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

   $sql ="SELECT * FROM member";

   $ret = mysqli_query($con, $sql);
   if($ret) {
	   //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
	   $count = mysqli_num_rows($ret);
   }
   else {
	   echo "<br>"."회원 데이터 조회 실패!!!"."<br>";
	   echo "실패 원인 :".mysqli_error($con);
	   exit();
   }

   echo "<h3> 회원 조회 결과 </h3>";
   echo "<TABLE border=1>";
   echo "<TR>";
   echo "<TH>아이디</TH><TH>이름</TH><TH>연락처</TH><TH>주소</TH><TH>생일</TH>";
   echo "<TH>가입일</TH><TH>보유쿠폰</TH>";
   echo "</TR>";

   while($row = mysqli_fetch_array($ret)) {
	  echo "<TR>";
	  echo "<TD>", $row['ID'], "</TD>";
	  echo "<TD>", $row['name'], "</TD>";
	  echo "<TD>", $row['contact'], "</TD>";
	  echo "<TD>", $row['address'], "</TD>";
	  echo "<TD>", $row['birth'], "</TD>";
	  echo "<TD>", $row['joindate'], "</TD>";
	  echo "<TD>", $row['coupon'], "</TD>";
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
    <title>회원조회</title>
</head>

<body>

    <BR>
    <button onclick='location.replace("admin.php")'>이전</button>
    <BR><BR>

    <FORM METHOD="POST" ACTION="editcoupon.php">

        아이디 : <input type="text" name="id"><br>
        보유쿠폰수정 : <input type="text" name="coupon"><br>
        <BR>
        <INPUT TYPE="submit" VALUE="수정">
    </form>


</body>

</html>
