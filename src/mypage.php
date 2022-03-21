<?php

?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>マイページ MARKET</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
      #main{
        border: none !important;
      }
    </style>
  </head>

  <body class="page-mypage page-2colum page-logined">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php">MARKET</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="mypage.php">マイページ</a></li>
            <li><a href="">ログアウト</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">
      
      <h1 class="page-title">MYPAGE</h1>

      <!-- Main -->
      <section id="main" >
         <section class="list panel-list">
           <h2 class="title">
            登録商品一覧
           </h2>
           <a href="" class="panel">
             <div class="panel-head">
               <img src="img/sample01.jpg" alt="商品タイトル">
             </div>
             <div class="panel-body">
               <p class="panel-title">iPhone6s <span class="price">¥89,000</span></p>
             </div>
           </a>
           <a href="" class="panel">
             <div class="panel-head">
               <img src="img/sample02.jpg" alt="商品タイトル">
             </div>
             <div class="panel-body">
               <p class="panel-title">ASUS VivoBook E200HA <span class="price">¥75,000</span></p>
             </div>
           </a>
           <a href="" class="panel">
             <div class="panel-head">
               <img src="img/sample06.jpg" alt="商品タイトル">
             </div>
             <div class="panel-body">
               <p class="panel-title">MacBook Pro Retina <span class="price">¥89,000</span></p>
             </div>
           </a>
           <a href="" class="panel">
             <div class="panel-head">
               <img src="img/sample04.jpg" alt="商品タイトル">
             </div>
             <div class="panel-body">
               <p class="panel-title">ミスノ　クロスバイク <span class="price">¥29,000</span></p>
             </div>
           </a>
         </section>
         
         <style>
           .list{
             margin-bottom: 30px;
           }
        </style>
         
        <section class="list list-table">
          <h2 class="title">
            連絡掲示板一覧
          </h2>
          <table class="table">
            <thead>
              <tr>
                <th>最新送信日時</th>
                <th>取引相手</th>
                <th>メッセージ</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                  <td>2015.11.21</td>
                  <td>山田 二郎</td>
                  <td><a href="">サンプルテキストサンプルテキストサンプルテキストサンプルテキスト...</a></td>
              </tr>
              <tr>
                <td>2015.11.11</td>
                <td>山田 三郎</td>
                <td><a href="">サンプルテキストサンプルテキストサンプルテキストサンプルテキスト...</a></td>
              </tr>
              <tr>
                <td>2015.09.18</td>
                <td>山田 四郎</td>
                <td><a href="">サンプルテキストサンプルテキストサンプルテキストサンプルテキスト...</a></td>
              </tr>
              <tr>
                <td>2015.01.01</td>
                <td>山田 五郎</td>
                <td><a href="">サンプルテキストサンプルテキストサンプルテキストサンプルテキスト...</a></td>
              </tr>
            </tbody>
          </table>
        </section>
        
        <section class="list panel-list">
          <h2 class="title">
            お気に入り一覧
          </h2>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample01.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">iPhone6s <span class="price">¥89,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample02.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ASUS VivoBook E200HA <span class="price">¥75,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample06.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">MacBook Pro Retina <span class="price">¥89,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample04.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ミスノ　クロスバイク <span class="price">¥29,000</span></p>
            </div>
          </a>
        </section>
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
