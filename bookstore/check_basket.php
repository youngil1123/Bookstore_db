<?php
//회원용 장바구니 조회
session_start();
ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_SESSION["ID"];
$stationery_no = $_REQUEST['stationery_no'];
$gift_no = $_REQUEST['gift_no'];
$domestic_no = $_REQUEST['domestic_no'];
$foreign_no = $_REQUEST['foreign_no'];

//print_r($_SESSION);
$sql ="SELECT * from basket where ID = '$id'";

$sql2="SELECT `sum` from basket where id = '{$id}';";
$ret2 = mysqli_query($con, $sql2);

$sql3="SELECT `basket_no` from basket where id = '{$id}';";
$ret3 = mysqli_query($con, $sql3);



$sum=mysqli_fetch_array($ret2)[0];
$no=mysqli_fetch_array($ret3)[0];

//echo "Query : ".$sql;

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
