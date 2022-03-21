<?php
use App\Parts\Util\Auth;

Auth::startSession();
Auth::loginFlow();
?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title> MARKET</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

    <style>
      .form .btn{
        float: none;
      }
      .form{
        text-align: center;
      }
    </style>

  </head>

  <body class="page-withdraw page-1colum">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php">MARKET</a></h1>
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
      <!-- Main -->
      <section id="main" >
        <h1 class="page-title">販売履歴</h1>
        <a href="mypage.php">&lt; マイページに戻る</a>
      </section>
    </div>



  </body>
</html>
