<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원 로그인</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
    <form action="member_login_process.php" method="POST">
        <h1>회원 로그인</h1>
        <input type="text" name="ID" placeholder="아이디">
        <br>
        <input type="text" name="PW" placeholder="비밀번호">
        <br>
        <input class="button" type="submit" value="회원 로그인">
    </form>

    
</body>
</html>