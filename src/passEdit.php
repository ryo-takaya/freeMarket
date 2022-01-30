<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>パスワード変更 MARKET</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <style>
      .form{
        margin-top: 50px;
      }
    </style>
  </head>

  <body class="page-passEdit page-2colum page-logined">

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
      <h1 class="page-title">パスワード変更</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container">
          <form action="" class="form">
           <div class="area-msg">
             古いパスワードが正しくありません。<br>
             新しいパスワードと新しいパスワード（再入力）が一致しません。<br>
             新しいパスワードは半角英数字6文字以上で入力してください。<br>
             パスワードが長すぎます。
           </div>
            <label>
              古いパスワード
              <input type="text" name="pass_old">
            </label>
            <label>
              新しいパスワード
              <input type="text" name="pass_new">
            </label>
            <label>
              新しいパスワード（再入力）
              <input type="text" name="pass_new_re">
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