<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

$id=$_POST["id"];
$plan=$_POST["plan"];
$sum=$_POST["sum"];
$no=$_POST["no"];
?>

<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>결제</title>
</head>

<body>

    <script>
        var choice = confirm("총 결제금액은 <?=$sum?> 원 입니다. 결제를 계속하시겠습니까?");
        if (!choice) {
            alert("결제가 취소되었습니다.")
            history.go(-2);
        }
    </script>
</body>

</html>

<?php

$sql="SELECT * FROM basket where stationery_number='EVP4444'";
    $ret = mysqli_query($con, $sql);
    $count=mysqli_num_rows($ret);

    if($count>=1){
        $sql="SELECT coupon FROM `member` where ID='$id';";
     $ret = mysqli_query($con, $sql);
     $count=mysqli_fetch_array($ret)[0];

        if($count<=0){
            $sql =" DELETE from basket where ID='$id';";
            echo $sql;
            $ret3 = mysqli_query($con, $sql);
        
            $sql =" ALTER TABLE basket AUTO_INCREMENT=1;";
            echo $sql;
            $ret4 = mysqli_query($con, $sql);
       
            echo "<html><script>alert('쿠폰의 갯수가 부족하여 결제할 수 없습니다.');
                location.replace('membermain.html')</script></html>";
        }else{
            $sql ="SET foreign_key_checks=0;";
            $ret = mysqli_query($con, $sql);
    
            $sql="UPDATE `member` set coupon=coupon-1 where ID='$id';";
            $ret = mysqli_query($con, $sql);
            echo $sql;
            
            goto A;
        }
    } else{
A:
$sql =" INSERT INTO pay VALUES(NULL, 0, '".$sum."', 0, '".$sum."','".$plan."', '".$no."');";
echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
    
    $sql ="SET foreign_key_checks=0;";
    $ret2=mysqli_query($con, $sql);
    
    if(!$ret2){
        echo "실패 원인 :".mysqli_error($con);
        exit();
    }


    $sql =" DELETE from basket where ID='$id';";
    echo $sql;
    $ret3 = mysqli_query($con, $sql);

    $sql =" ALTER TABLE basket AUTO_INCREMENT=1;";
    echo $sql;
    $ret4 = mysqli_query($con, $sql);

    $sql ="SELECT `name`, contact, `address` from `member` where id = '{$id}';";
    echo $sql;
    $ret5 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret5);

    $d_number=sprintf("%06d", rand(000000, 999999));
    echo $sql;
    $sql =" INSERT INTO delivery VALUES('".$d_number."', now(), '".$row['name']."', '".$row['contact']."', '".$row['address']."');";
    $ret6 = mysqli_query($con, $sql);

    echo $row['name'];

    echo "<html><script>alert('결제가 성공적으로 완료되었습니다.');
        location.replace('membermain.html')</script></html>";  // 임시로 로그인 화면으로 연결
    
}

else {
    echo "<br>"."결제 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
}
}
?>