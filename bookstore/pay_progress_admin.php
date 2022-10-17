<?php
$con=mysqli_connect("localhost", "root", "1234", "bookstoredb") or die("MySQL 접속 실패 !!");

session_start();

$id=$_POST["id"];
$plan=$_POST["plan"];
$sum=$_POST["sum"];
$no=$_POST["no"];
$name=$_SESSION['guest_name'];
$contact=$_SESSION['guest_contact'];
$address=$_SESSION['guest_address'];
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
echo $sum;

$sql =" INSERT INTO pay VALUES(NULL, 0, '".$sum."', 0, '".$sum."','".$plan."', '".$no."');";
echo "Query : ".$sql;

$ret = mysqli_query($con, $sql); 

if($ret) {
    //echo mysqli_num_rows($ret), "건이 조회됨..<br><br>";
    $count = mysqli_num_rows($ret);
    
    if(!$ret){
        echo "실패 원인 :".mysqli_error($con);
        exit();
    }

    $sql ="SET foreign_key_checks=0;";
    mysqli_query($con, $sql);

    $sql =" DELETE from basket2 where ID='$id';";
    echo $sql;
    $ret3 = mysqli_query($con, $sql);

    $sql =" ALTER TABLE basket2 AUTO_INCREMENT=1;";
    echo $sql;
    $ret4 = mysqli_query($con, $sql);

    $sql ="SELECT `name`, contact, `address` from `member` where id = '{$id}';";
    echo $sql;
    $ret5 = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($ret5);

    echo $row['name'];

    echo "<html><script>alert('결제가 성공적으로 완료되었습니다.');
        location.replace('admin.php')</script></html>";  // 임시로 로그인 화면으로 연결

}
else {
    echo "<br>"."결제 실패!!!"."<br>";
    echo "실패 원인 :".mysqli_error($con);
    exit();
}
?>