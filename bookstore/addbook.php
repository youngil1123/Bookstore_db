<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$tbl=$_POST["tbl"];
$no=$_POST["number"];
$name=$_POST["name"];
$price=$_POST["price"];
$author=$_POST["author"];
$publisher=$_POST["publisher"];
$pages=$_POST["pages"];
$release=$_POST["release"];
$status=$_POST["status"];

$sql =" INSERT INTO ".$tbl." VALUES('".$no."','".$name."','".$price."','"
.$author."','".$publisher."','".$pages."','".$release."','".$status."');";

   echo $sql;
   $ret = mysqli_query($con, $sql);

   if($ret) {
    echo "<script>alert('데이터가 성공적으로 입력되었습니다.');
        location.replace('".$tbl.".php')</script>";
}
else {
    echo "데이터 입력 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

?>