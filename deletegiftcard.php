<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$gift_no=$_POST["number"];

$sql =" DELETE FROM giftcard where gift_no='".$gift_no."';";

   echo $sql;
   $ret = mysqli_query($con, $sql);

   if($ret) {
    echo "<script>alert('데이터가 성공적으로 삭제되었습니다.');
        location.replace('giftcard.php')</script>";
}
else {
    echo "데이터 삭제 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
} 
mysqli_close($con);

?>