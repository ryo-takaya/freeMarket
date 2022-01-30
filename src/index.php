<?php
require_once dirname(__FILE__, 2). '/vendor/autoload.php';

use App\products\Test;
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css" >
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <body class="page-home page-2colum">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php">MARKET</a></h1>
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

      <!-- サイドバー -->
      <section id="sidebar">
        <form>
          <h1 class="title">カテゴリー</h1>
          <div class="selectbox">
            <span class="icn_select"></span>
            <select name="category">
              <option value="1">パソコン</option>
              <option value="2">スマホ</option>
            </select>
          </div>
          <h1 class="title">表示順</h1>
          <div class="selectbox">
            <span class="icn_select"></span>
            <select name="sort">
              <option value="1">金額が安い順</option>
              <option value="2">金額が高い順</option>
            </select>
          </div>
          <input type="submit" value="検索">
        </form>

      </section>

      <!-- Main -->
      <section id="main" >
        <div class="search-title">
          <div class="search-left">
            <span class="total-num">104</span>件の商品が見つかりました
          </div>
          <div class="search-right">
            <span class="num">1</span> - <span class="num">20</span>件 / <span class="num">104</span>件中
          </div>
        </div>
        <div class="panel-list">
          <a href="productDetail.php" class="panel">
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
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample03.gif" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">電動自転車 <span class="price">¥58,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample08.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">アイアンセット <span class="price">¥12,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample07.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">フィットネスマシン <span class="price">¥34,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample10.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ウォーキングシューズ <span class="price">¥4,500</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample05.jpg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">iPhone6s <span class="price">¥89,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample09.jpeg" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ASUS VivoBook E200HA <span class="price">¥75,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">MacBook Pro Retina <span class="price">¥89,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ミスノ　クロスバイク <span class="price">¥29,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">電動自転車 <span class="price">¥58,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">アイアンセット <span class="price">¥12,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">フィットネスマシン <span class="price">¥34,000</span></p>
            </div>
          </a>
          <a href="" class="panel">
            <div class="panel-head">
              <img src="img/sample-img.png" alt="商品タイトル">
            </div>
            <div class="panel-body">
              <p class="panel-title">ウォーキングシューズ <span class="price">¥4,500</span></p>
            </div>
          </a>
        </div>

        <div class="pagination">
          <ul class="pagination-list">
            <li class="list-item"><a href="">&lt;</a></li>
            <li class="list-item"><a href="">1</a></li>
            <li class="list-item"><a href="">2</a></li>
            <li class="list-item active"><a href="">3</a></li>
            <li class="list-item"><a href="">4</a></li>
            <li class="list-item"><a href="">5</a></li>
            <li class="list-item"><a href="">&gt;</a></li>
          </ul>
        </div>
        
      </section>

    </div>

  </body>
</html>
