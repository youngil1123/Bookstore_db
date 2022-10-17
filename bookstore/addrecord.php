<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$tbl=$_POST["tbl"];
$no=$_POST["number"];
$name=$_POST["name"];
$price=$_POST["price"];
$artist=$_POST["artist"];
$publisher=$_POST["publisher"];
$release=$_POST["release"];
$label=$_POST["label"];

$sql =" INSERT INTO ".$tbl." VALUES('".$no."','".$artist."','".$name."','"
.$publisher."','".$label."','".$price."','".$release."');";

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