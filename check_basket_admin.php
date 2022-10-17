<?php

$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_POST["id"];

$sql ="SELECT * from basket where id = '{$id}';";
$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
}
else {
    echo "<br>"."장바구니 데이터 조회 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
} 

echo "<h3> 장바구니 조회 결과";
echo "<table>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>장바구니번호</TH><TH>총 수량</TH><TH>금액 합계</TH><TH>ID</TH><TH>상품권번호</TH>";
echo "<TH>음반번호</TH><TH>제품번호</TH><TH>외국도서번호</TH><TH>국내도서번호</TH>";
echo "</TR>";
while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['basket_no'], "</TD>";
    echo "<TD>", $row['amount'], "</TD>";
    echo "<TD>", $row['sum'], "</TD>";
    echo "<TD>", $row['ID'], "</TD>";
    echo "<TD>", $row['gift_number'], "</TD>";
    echo "<TD>", $row['record_number'], "</TD>";
    echo "<TD>", $row['stationery_number'], "</TD>";
    echo "<TD>", $row['foreign_number'], "</TD>";
    echo "<TD>", $row['domestic_number'], "</TD>";

    echo "</TR>"; 
 }   
 echo "</table>";
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장바구니조회</title>
</head>


</html>