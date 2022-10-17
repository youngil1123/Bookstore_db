<?php

$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$stationery_no=$_POST["number"]; if(empty($stationery_no)){ $stationery_no='%';}else{$stationery_no='%'.$stationery_no.'%';};
$name=$_POST["name"]; if(empty($name)){ $name='%';}else{$name='%'.$name.'%';};
$price=$_POST["price"];    if(empty($price)){ $price='%';}else{$price='%'.$price.'%';};
$type=$_POST["type"];    if(empty($type)){ $type='%';}else{$natypeme='%'.$type.'%';};
$maker=$_POST["maker"];   if(empty($maker)){ $maker='%';}else{$maker='%'.$maker.'%';};
$manuCountry=$_POST["manuCountry"];  if(empty($manuCountry)){ $manuCountry='%';}else{$manuCountry='%'.$manuCountry.'%';};
$import=$_POST["import"];   if(empty($import)){ $import='%';}else{$import='%'.$import.'%';};

$sql ="SELECT * from stationery where stationery_no like '{$stationery_no}' 
and `name` like '{$name}'
and price like '{$price}'
and `maker` like '{$maker}'
and `type` like '{$type}'
and `manuCountry` like '{$manuCountry}'
and `import` like '{$import}';";

echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
}
else {
    echo "<br>"."문구 데이터 조회 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
} 

echo "<h3> 문구 조회 결과";
echo "<table>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>문구 번호</TH><TH>품명 및 모델명</TH><TH>제조사</TH><TH>가격</TH><TH>상품군</TH>";
echo "<TH>제조국</TH><TH>수입여부</TH>";
echo "</TR>";
while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['stationery_no'], "</TD>";
    echo "<TD>", $row['name'], "</TD>";
    echo "<TD>", $row['maker'], "</TD>";
    echo "<TD>", $row['price'], "</TD>";
    echo "<TD>", $row['type'], "</TD>";
    echo "<TD>", $row['manuCountry'], "</TD>";
    echo "<TD>", $row['import'], "</TD>";
    echo "</TR>"; 
 }   
 echo "</table>";
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>문구조회</title>
    <script>
        function btn_click(str) {
            if (str == "add") {
                admin.action = "addstationery.php";
            }
            else {
                admin.action = "deletestationery.php";
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
    <input type="hidden" name="tbl" value="stationery">
    문구번호 : <input type="text" name="number"><br>
    품명 및 모델명 : <input type="text" name="name"><br>
    판매가 : <input type="text" name="price"><br>
    상품군 : <input type="text" name="type"><br>
    제조사 : <input type="text" name="maker"><br>
    제조국 : <input type="text" name="manuCountry"><br>
    수입여부 : <input type="text" name="import"><br>
    <BR>
    <INPUT TYPE="submit" VALUE="추가" onclick='btn_click("add");'>
    <INPUT TYPE="submit" VALUE="삭제" onclick='btn_click("delete");'>
</form>
</body>

</html>