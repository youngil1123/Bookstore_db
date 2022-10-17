<?php

$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$record_no=$_POST["number"]; if(empty($record_no)){ $record_no='%';}else{$record_no='%'.$record_no.'%';};
$name=$_POST["name"]; if(empty($name)){ $name='%';}else{$name='%'.$name.'%';};
$price=$_POST["price"];    if(empty($price)){ $price='%';}else{$price='%'.$price.'%';};
$artist=$_POST["artist"];   if(empty($artist)){ $artist='%';}else{$artist='%'.$artist.'%';};
$publisher=$_POST["publisher"];    if(empty($publisher)){ $publisher='%';}else{$napublisherme='%'.$publisher.'%';};
$release=$_POST["release"];  if(empty($release)){ $release='%';}else{$release='%'.$release.'%';};
$label=$_POST["label"];   if(empty($label)){ $label='%';}else{$label='%'.$label.'%';};

$sql ="SELECT * from record where record_no like '{$record_no}' 
and `name` like '{$name}'
and price like '{$price}'
and artist like '{$artist}'
and producer like '{$publisher}'
and `release` like '{$release}'
and `label` like '{$label}';";

echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
}
else {
    echo "<br>"."음반 데이터 조회 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
} 

echo "<h3> 음반 조회 결과";
echo "<table>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>음반 번호</TH><TH>앨범명</TH><TH>판매가</TH><TH>아티스트</TH><TH>제작자</TH>";
echo "<TH>발매일</TH><TH>레이블</TH>";
echo "</TR>";
while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['record_no'], "</TD>";
    echo "<TD>", $row['name'], "</TD>";
    echo "<TD>", $row['price'], "</TD>";
    echo "<TD>", $row['artist'], "</TD>";
    echo "<TD>", $row['producer'], "</TD>";
    echo "<TD>", $row['release'], "</TD>";
    echo "<TD>", $row['label'], "</TD>";
    echo "</TR>"; 
 }   
 echo "</table>";

?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>음반조회</title>

    <script>
        function btn_click(str) {
            if (str == "add") {
                admin.action = "addrecord.php";
            }
            else {
                admin.action = "deleterecord.php";
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
    <input type="hidden" name="tbl" value="record">
    음반번호 : <input type="text" name="number"><br>
    앨범명 : <input type="text" name="name"><br>
    판매가 : <input type="text" name="price"><br>
    아티스트 : <input type="text" name="artist"><br>
    제작자 : <input type="text" name="publisher"><br>
    발매일 : <input type="text" name="release"><br>
    레이블 : <input type="text" name="label"><br>
    <BR>
    <INPUT TYPE="submit" VALUE="추가" onclick='btn_click("add");'>
    <INPUT TYPE="submit" VALUE="삭제" onclick='btn_click("delete");'>
</form>
</body>

</html>