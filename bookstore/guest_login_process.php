<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비회원 로그인 과정</title>
    <link rel=stylesheet href='style.css' type='text/css'>
</head>
<body>
    <h1>비회원 로그인 과정</h1>
    <?php

    $guest_name = $_POST['guest_name'];
    $guest_contact = $_POST['guest_contact'];
    $guest_address = $_POST['guest_address'];

    session_start();
    $_SESSION['guest_name'] = $guest_name;
    $_SESSION['guest_contact'] = $guest_contact;
    $_SESSION['guest_address'] = $guest_address;
    $_SESSION['ID'] = $guest_name;
    $_SESSION['MEMBER'] = "N";

    ?>

    <script>
        location.replace('nonemembermain.html');
    </script>

</body>
</html>
