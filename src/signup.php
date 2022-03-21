<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

use App\Parts\Util\Validation\SignUpValidation;
use App\Parts\Model\Db\UsersTable;

$usersTable = new UsersTable($db);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $postData = $_POST;
  $validation = new SignUpValidation($postData, $usersTable);
  if ($validation->validate()) {
      $errMessage = $validation->getErrorMessage();
  } else {
      $name = '名無しさん';
      if(isset($postData['name']) && strlen($postData['name']) > 0){
          $name = $postData['name'];
      }
          $stmt = $db->prepare('INSERT INTO users (username, email,password,login_time) VALUES (:username,:email,:pass,:login_time)');
          $dbRst = $stmt->execute([':username'=>$name,':email' => $postData['email'], ':pass' => password_hash( $postData['pass'], PASSWORD_DEFAULT), ':login_time' => date('Y-m-d H:i:s')]);
      if ($dbRst) {
          header("Location:mypage");
      } else {
          throw new Exception('ユーザーの作成に失敗しました');
      }
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
            <li><a href="/signup" class="btn btn-primary">ユーザー登録</a></li>
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
                foreach($errMessage as $arr){
                  foreach ($arr as $msg){
                      echo $msg. '</br>';
                  }
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