<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

use App\Parts\Util\Validation\SignUpValidation;

//post送信されていた場合
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $postData = $_POST;
  $validation = new SignUpValidation($postData);
  if ($validation->validate()) {
      $errMessage = $validation->getErrorMessage();
      var_dump($errMessage);
  } else {
      //DBへの接続準備
//      $dsn = 'mysql:dbname=php_sample01;host=localhost;charset=utf8';
//      $user = 'root';
//      $password = 'root';
//      $options = array(
//          // SQL実行失敗時に例外をスロー
//          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//          // デフォルトフェッチモードを連想配列形式に設定
//          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//          // バッファードクエリを使う(一度に結果セットをすべて取得し、サーバー負荷を軽減)
//          // SELECTで得た結果に対してもrowCountメソッドを使えるようにする
//          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
//      );

      // PDOオブジェクト生成（DBへ接続）
      //$dbh = new PDO($dsn, $user, $password, $options);

      //SQL文（クエリー作成）
      //$stmt = $dbh->prepare('INSERT INTO users (email,pass,login_time) VALUES (:email,:pass,:login_time)');

      //プレースホルダに値をセットし、SQL文を実行
      //$dbRst = $stmt->execute(array(':email' => $email, ':pass' => $pass, ':login_time' => date('Y-m-d H:i:s')));

      //SQL実行結果が成功の場合
//        if($dbRst){
//          header("Location:mypage.html"); //マイページへ
//        }
  }



}

?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>ユーザー登録 MARKET</title>
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
            <li><a href="signup.html" class="btn btn-primary">ユーザー登録</a></li>
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

          <form class="form" method="post">
            <h2 class="title">ユーザー登録</h2>
            <div class="area-msg">
             <?php 
              if(isset($errMessage)){
                foreach($errMessage as $msg){
                  echo $msg.'<br>';
                }
              }
              ?>
            </div>
            <label>
              Email
              <input type="text" name="email">
            </label>
            <label>
              パスワード <span style="font-size:12px">※英数字６文字以上</span>
              <input type="text" name="pass">
            </label>
            <label>
              パスワード（再入力）
              <input type="text" name="rePass">
            </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="登録する">
            </div>
          </form>
        </div>

      </section>

    </div>


  </body>
</html>