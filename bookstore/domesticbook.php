<?php

$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$domestic_no=$_POST["number"]; if(empty($domestic_no)){ $domestic_no='%';}else{$domestic_no='%'.$domestic_no.'%';};
$name=$_POST["name"]; if(empty($name)){ $name='%';}else{$name='%'.$name.'%';};
$price=$_POST["price"];    if(empty($price)){ $price='%';}else{$price='%'.$price.'%';};
$author=$_POST["author"];   if(empty($author)){ $author='%';}else{$author='%'.$author.'%';};
$publisher=$_POST["publisher"];    if(empty($publisher)){ $publisher='%';}else{$napublisherme='%'.$publisher.'%';};
$release=$_POST["release"];  if(empty($release)){ $release='%';}else{$release='%'.$release.'%';};
$status=$_POST["status"];   if(empty($status)){ $status='%';}else{$status='%'.$status.'%';};

$sql ="SELECT * from domesticbook where domestic_no like '{$domestic_no}' 
and `name` like '{$name}'
and price like '{$price}'
and author like '{$author}'
and publisher like '{$publisher}'
and `release` like '{$release}'
and `status` like '{$status}';";

echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
}
else {
    echo "<br>"."국내도서 데이터 조회 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
} 

echo "<h3> 국내도서 조회 결과";
echo "<table>";
echo "<TABLE border=1>";
echo "<TR>";
echo "<TH>국내도서번호</TH><TH>국내도서이름</TH><TH>판매가</TH><TH>저자</TH><TH>출판사</TH>";
echo "<TH>쪽수</TH><TH>출시일</TH><TH>상태</TH>";
echo "</TR>";
while($row = mysqli_fetch_array($ret)) {
    echo "<TR>";
    echo "<TD>", $row['domestic_no'], "</TD>";
    echo "<TD>", $row['name'], "</TD>";
    echo "<TD>", $row['price'], "</TD>";
    echo "<TD>", $row['author'], "</TD>";
    echo "<TD>", $row['publisher'], "</TD>";
    echo "<TD>", $row['pages'], "</TD>";
    echo "<TD>", $row['release'], "</TD>";
    echo "<TD>", $row['status'], "</TD>";
    echo "</TR>"; 
 }   
 echo "</table>";
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>국내도서조회</title>

    <script>
    function btn_click(str){
        if(str=="add"){
            admin.action="addbook.php";
        }
        else{
            admin.action="deletedomesticbook.php";
        }
    }
    </script>
</head>
<body>

<BR>
<button onclick='location.replace("products.html")'>이전</button>
<BR><BR>

<FORM Name="admin" METHOD="POST">

<input type="hidden" name="tbl" value="domesticbook">

    국내도서번호 : <input type="text" name="number"><br>
    국내도서이름 : <input type="text" name="name"><br>
    판매가 : <input type="text" name="price"><br>
    저자 : <input type="text" name="author"><br>
    출판사 : <input type="text" name="publisher"><br>
    페이지 : <input type="text" name="pages"><br>
    출시일 : <input type="text" name="release"><br>
    상태 : <input type="text" name="status"><br>
    <BR>
    <INPUT TYPE="submit" VALUE="추가" onclick='btn_click("add");'>
    <INPUT TYPE="submit" VALUE="삭제" onclick='btn_click("delete");'>
    </form>
</body>

</html>
