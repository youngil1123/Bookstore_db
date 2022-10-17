<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비회원 로그인</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
<form action="guest_login_process.php" method="POST">
    <h1>비회원 로그인</h1>
    <input type="text" name="guest_name" placeholder="이름">
    <br>
    <input type="text" name="guest_contact" placeholder="전화번호">
    <br>
    <input type="text" name="guest_address" placeholder="주소">
    <br>
    <input class="button" type="submit" value="비회원 로그인">
</form>
</body>
</html>