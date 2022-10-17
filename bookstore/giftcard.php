<?php

$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$gift_no=$_POST["number"]; if(empty($gift_no)){ $gift_no='%';}else{$gift_no='%'.$gift_no.'%';};
$name=$_POST["name"]; if(empty($name)){ $name='%';}else{$name='%'.$name.'%';};
$price=$_POST["price"];    if(empty($price)){ $price='%';}else{$price='%'.$price.'%';};
$maker=$_POST["maker"];    if(empty($maker)){ $maker='%';}else{$maker='%'.$maker.'%';};

$sql ="SELECT * from giftcard where gift_no like '{$gift_no}' 
and `name` like '{$name}'
and price like '{$price}'
and `maker` like '{$maker}';";

echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
}
else {
    echo "<br>"."상품권 데이터 조회 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
} 

echo "<h3> 문구 조회 결과";
echo "<table>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>상품권 번호</TH><TH>품명</TH><TH>제조사</TH><TH>가격</TH>";
echo "</TR>";
while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['gift_no'], "</TD>";
    echo "<TD>", $row['name'], "</TD>";
    echo "<TD>", $row['maker'], "</TD>";
    echo "<TD>", $row['price'], "</TD>";
    echo "</TR>"; 
 }   
 echo "</table>";
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품권조회</title>
    <script>
        function btn_click(str) {
            if (str == "add") {
                admin.action = "addgiftcard.php";
            }
            else {
                admin.action = "deletegiftcard.php";
            }
        }
    </script>
</head>

<body>

    <BR>
    <button onclick='location.replace("products.html")'>이전</button>

</html>
<BR><BR>

<FORM Name="admin" METHOD="POST">
    <input type="hidden" name="tbl" value="giftcard">
    상품권 번호 : <input type="text" name="number"><br>
    품명 : <input type="text" name="name"><br>
    판매가 : <input type="text" name="price"><br>
    제조사 : <input type="text" name="maker"><br>
    <BR>
    <INPUT TYPE="submit" VALUE="추가" onclick='btn_click("add");'>
    <INPUT TYPE="submit" VALUE="삭제" onclick='btn_click("delete");'>
</form>
</body>

</html>