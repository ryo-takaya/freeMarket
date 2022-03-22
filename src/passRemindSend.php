<?php
use App\Parts\Util\Auth;
use App\Parts\Util\MailSender;
use App\Parts\Util\Validation\PassRemindSendValidation;


Auth::startSession();
Auth::loginFlow();
$errorFlg = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = new PassRemindSendValidation($_POST);
    if ($validation->validate()) {
        $errMessage = $validation->getErrorMessage();
    } else {
        try {
            $stmt = $db->prepare('SELECT count(*) FROM users where email = :email AND delete_flg = 0');
            $result = $stmt->execute([':email' => $_POST['email']]);
            $record = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result && array_shift($record)) {
                $authKey = uniqid();

                $from = 'From: test@example.com';
                $to = $_POST['email'];
                $sub = 'パスワード再発行認証';
                $message = <<<EOT
認証キー:{$authKey}
EOT;
                MailSender::sendEmail($to,$sub,$message,$from);

                $_SESSION['auth_key'] = $authKey;
                $_SESSION['auth_email'] = $_POST['email'];
                $_SESSION['auth_key_limit'] = time() + 60 * 30;
                header('Location: /passremindrecieve');
            } else {
                $errorFlg = true;
            }
        } catch(PDOException $e){

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
            <li><a href="signup.html" class="btn btn-primary">パスワード再発行メール送信</a></li>
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

          <form action="" class="form" method="post">
           <p>ご指定のメールアドレス宛にパスワード再発行用のURLと認証キーをお送り致します。</p>
            <label>
              Email
              <input type="text" name="email">
            </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="送信する">
            </div>
          </form>
        </div>
        <a href="mypage.php">&lt; マイページに戻る</a>
      </section>

    </div>


  </body>
</html>