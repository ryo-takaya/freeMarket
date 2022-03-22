<?php

use App\Parts\Util\Auth;
use App\Parts\Util\MailSender;
use App\Parts\Util\Validation\PassRemindRecieveValidation;

$isNotSameAuthKey = false;
$isOvertimeLimitKey = false;

if(!isset($_SESSION['auth_key'])){
    header('Location: /passremind');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = new PassRemindRecieveValidation($_POST);
if ($validation->validate()) {
    $errMessage = $validation->getErrorMessage();
} else {
    if($_POST['token'] !== $_SESSION['auth_key']){
        $isNotSameAuthKey = true;
    }
    if(time() < $_SESSION['auth_key_limit']){
        $isOvertimeLimitKey = true;
    }
    $pass = uniqid();
    $stmt = $db->prepare('UPDATE users SET password = :pass WHERE email = :email');
    $result = $stmt->execute([':pass' => $pass, ':email' => $_SESSION['auth_email']]);
    if($result){
        $from = 'From: test@example.com';
        $to = $_POST['email'];
        $sub = 'パスワード再発行認証';
        $message = <<<EOT
再発行パスワード:{$pass}
EOT;
        MailSender::sendEmail($to,$sub,$message,$from);
        $_SESSION = [];
        header('Location: /login');
    }
}
}
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>パスワード再発行 MARKET</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <body class="page-signup page-1colum">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php"> MARKET</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="signup.html" class="btn btn-primary">パスワード再発行認証</a></li>
            <li><a href="login.php">ログイン</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">

      <!-- Main -->
      <section id="main" >

        <div class="form-container">

          <form action="passEdit.php" class="form" method="post">
            <p>ご指定のメールアドレスお送りした【パスワード再発行認証メール】内にある「認証キー」をご入力ください。</p>
            <div class="area-msg">
              認証キーが違います
            </div>
            <label>
              認証キー
              <input type="text" name="token">
            </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="変更画面へ">
            </div>
          </form>
        </div>
        <a href="passRemindSend.php">&lt; パスワード再発行メールを再度送信する</a>
      </section>

    </div>



  </body>
</html>