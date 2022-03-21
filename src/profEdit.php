<?php
use App\Parts\Util\Auth;

Auth::startSession();
Auth::loginFlow();
?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>プロフィール編集  MARKET</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <style>
      
    </style>

  </head>

  <body class="page-profEdit page-2colum page-logined">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php"> MARKET</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="mypage.php">マイページ</a></li>
            <li><a href="/logout">ログアウト</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      <h1 class="page-title">プロフィール編集</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container">
          <form action="" class="form">
            <div class="area-msg">
              TELは半角数字10文字以上で入力してください。<br>
              年齢は半角数字で入力してください。<br>
              ◯◯が長すぎます。
            </div>
           <label>
             名前
             <input type="text" name="username">
           </label>
            <label>
              TEL
              <input type="text" name="tel">
            </label>
            <label>
              郵便番号
              <input type="text" name="zip">
            </label>
            <label>
              住所
              <input type="text" name="addr">
            </label>
            <label style="text-align:left;">
             年齢
              <input type="number" name="age">
            </label>
            <label>
              Email
              <input type="text" name="email">
            </label>
            
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="変更する">
            </div>
          </form>
        </div>
      </section>
      
      <!-- サイドバー -->
      <section id="sidebar">
        <a href="registProduct.php">商品を出品する</a>
        <a href="tranSale.php">販売履歴を見る</a>
        <a href="profEdit.php">プロフィール編集</a>
        <a href="passEdit.php">パスワード変更</a>
        <a href="withdraw.php">退会</a>
      </section>
    </div>

  </body>
</html>
