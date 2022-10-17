<?php
session_start();
$userID = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 페이지</title>
</head>

<body>
    <table>
    <tr>
    <td>
    <output type="number" id="id">
        <?php echo $userID;?>님 로그인 되셨습니다.
    </output>
    </td>

    <td>
    <!-- 로그아웃 버튼 -->
    <button onclick="logout()">로그아웃</button>
    </td>

    <td>
    <p>
    <form method="post" action='edit.php'>
        <input type="hidden" name="userID" value="<?php echo $userID;?>">
    
        <!-- 개인정보수정 버튼 -->
        <input type="submit" value="개인정보수정">

    </form>
    </p>
    </td>

    </tr>
    </table>
    
    <button onclick="location.replace('products.html')">제품 조회</button>
    <button onclick="location.replace('member.php')">회원 조회</button>
    <button onclick="location.replace('deleted_member.php')">탈퇴 회원 조회</button>
    <button onclick="location.replace('pay.php')">결제 조회</button>
    <button onclick="location.replace('delivery.php')">배송 조회</button>

    <br><br>


<FORM Name="admin1" METHOD="POST" action='basket_admin.php?gubun=ibook'>
ID : <input type="text" name="id">
    국내도서번호 : <input type="text" name="domestic_no">
    <INPUT TYPE="submit" VALUE="장바구니 추가">
</form>

<FORM Name="admin2" METHOD="POST" action='basket_admin.php?gubun=obook'>
ID : <input type="text" name="id">
    외국도서번호 : <input type="text" name="foreign_no">
    <INPUT TYPE="submit" VALUE="장바구니 추가">
</form>

<FORM Name="admin3" METHOD="POST" action='basket_admin.php?gubun=music'>
ID : <input type="text" name="id">
    음반번호 : <input type="text" name="record_no">
    <INPUT TYPE="submit" VALUE="장바구니 추가">
</form>

<FORM Name="admin4" METHOD="POST" action='basket_admin.php?gubun=mungu'>
ID : <input type="text" name="id">
    문구번호 : <input type="text" name="stationery_no">
    <INPUT TYPE="submit" VALUE="장바구니 추가">
</form>

<FORM Name="admin5" METHOD="POST" action='basket_admin.php?gubun=sangpum'>
ID : <input type="text" name="id">
    상품권번호 : <input type="text" name="gift_no">
    <INPUT TYPE="submit" VALUE="장바구니 추가">
</form>

</body>
<script>
        function logout() {  // 로그아웃 버튼을 눌렀을 때
            var choice = confirm("정말로 로그아웃 하시겠습니까?");
            if (choice) {
                alert("로그아웃 되었습니다.");
                location.replace("index.php");
            }
        }
    </script>
</html>
