<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_POST["id"];
$coupon=$_POST["coupon"];

$sql =" UPDATE "."`member`"." SET coupon = ".$coupon." where ID='".$id."';";

   echo $sql;
   $ret = mysqli_query($con, $sql);

   if($ret) {
    echo "<script>alert('데이터가 성공적으로 변경되었습니다.');
        location.replace('member.php')</script>";
}
else {
    echo "데이터 입력 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

?>