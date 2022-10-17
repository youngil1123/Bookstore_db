<?php
session_start();

//비회원용 장바구니 담기

ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_WARNING);
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_SESSION["ID"];
$stationery_no = $_REQUEST['stationery_no'];
$gift_no = $_REQUEST['gift_no'];
$domestic_no = $_REQUEST['domestic_no'];
$foreign_no = $_REQUEST['foreign_no'];
$record_no = $_REQUEST['record_no'];
$gubun = $_REQUEST['gubun'];

if($gubun == "sangpum") $sql = "select * from giftcard where gift_no='$gift_no'";
else if($gubun == "music") $sql = "select * from record where record_no='$record_no'";
else if($gubun == "ibook") $sql = "select * from domesticbook where domestic_no='$domestic_no'";
else if($gubun == "obook") $sql = "select * from foreignbook where foreign_no='$foreign_no'";
else if($gubun == "mungu") $sql = "select * from stationery where stationery_no='$stationery_no'";

$ret0 = mysqli_query($con, $sql);
$sinfo = mysqli_fetch_array($ret0);
//print_r($sinfo);

if($gubun == "sangpum") $sql = "insert into basket2 set basket_no=NULL, amount=1, sum='$sinfo[price]', ID='$id', gift_number='$gift_no'";
else if($gubun == "music") $sql = "insert into basket2 set basket_no=NULL, amount=1, sum='$sinfo[price]', ID='$id', record_number='$record_no'";
else if($gubun == "ibook") $sql = "insert into basket2 set basket_no=NULL, amount=1, sum='$sinfo[price]', ID='$id', domestic_number='$domestic_no'";
else if($gubun == "obook") $sql = "insert into basket2 set basket_no=NULL, amount=1, sum='$sinfo[price]', ID='$id', foreign_number='$foreign_no'";
else if($gubun == "mungu") $sql = "insert into basket2 set basket_no=NULL, amount=1, sum='$sinfo[price]', ID='$id', stationery_number='$stationery_no'";


mysqli_query($con, $sql) or die(mysqli_error($con));

$sql ="SELECT * from basket2 where id = '$id'";

$sql2="SELECT SUM(`sum`) from basket2 group by id having id = '{$id}';";
$ret2 = mysqli_query($con, $sql2);

$sql3="SELECT `basket_no` from basket2 where id = '{$id}';";
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

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장바구니조회</title>
</head>

<body>

    <BR>
    <table>
        <tr>
            <!-- 임시로 관리자 화면으로 연결-->
            <td>
                <button onclick='history.go(-1)'>이전</button>
            </td>
            <td>
                <form name="clear" method="post" action='basket_clear2.php'>
                    <input type="hidden" name="id" value=<?php echo $id;?>>
                    <input type="submit" value="초기화">
                </form>
            </td>
            <td>
                <form name="account" method="post" action='pay_progress2.php'>
                    <input type="hidden" name="plan" value="계좌">
                    <input type="hidden" name="sum" value=<?php echo $sum;?>>
                    <input type="hidden" name="no" value=<?php echo $no;?>>
                    <input type="hidden" name="id" value=<?php echo $id;?>>
                    <input type="submit" value="계좌이체">
                </form>
            </td>
            <td>
                <form name="account" method="post" action='pay_progress2.php'>
                    <input type="hidden" name="plan" value="카드">
                    <input type="hidden" name="sum" value=<?php echo $sum;?>>
                    <input type="hidden" name="no" value=<?php echo $no;?>>
                    <input type="hidden" name="id" value=<?php echo $id;?>>
                    <input type="submit" value="카드결제">
                </form>
            <td>
        </tr>

</body>

</html>
