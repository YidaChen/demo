<?php
if(isset($_REQUEST["authcode"])){
    session_start();
    if($_SESSION["authcode"] == strtolower($_REQUEST["authcode"])){
        echo "<script>alert('輸入正確!')</script>";
    }else{
        echo "<script>alert('輸入錯誤!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>驗證碼</title>
</head>
<body>
    <form method="post" action="form.php">
        <img id="captchaImg" src="captcha.php">
        <a href="javascript:void(0)" onclick="document.getElementById('captchaImg').src='captcha.php?r='+Math.random()">看不清楚?</a><br>
        請輸入圖中內容:<input type="text" name="authcode">
        <input type="submit" value="驗證">
    </form>
</body>
</html>