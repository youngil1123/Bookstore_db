<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
<form action="signup_proces.php" method="POST">
    <h1>회원가입</h1>
    <input type="text" name="ID" placeholder="아이디">
    <br>
    <input type="text" name="PW" placeholder="비밀번호">
    <br>
    <input type="text" name="name" placeholder="이름">
    <br>
    <input type="text" name="contact" placeholder="전화번호">
    <br>
    <input type="text" name="address" placeholder="주소">
    <br>
    <input type="text" name="birth" placeholder="생일">
    <br>
    <input class="button" type="submit" name="submit">
</form>
</body>
</html>