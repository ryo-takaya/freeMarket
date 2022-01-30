<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <body class="page-login page-1colum">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php">MARKET</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="signup.html" class="btn btn-primary">ユーザー登録</a></li>
            <li><a href="">ログイン</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- メインコンテンツ -->
    <div id="contents" class="site-width">

      <!-- Main -->
      <section id="main" >

       <div class="form-container">
        
         <form action="mypage.php" class="form">
           <h2 class="title">ログイン</h2>
           <div class="area-msg">
             メールアドレスまたはパスワードが違います
           </div>
           <label>
            メールアドレス
             <input type="text" name="email">
           </label>
           <label>
             パスワード
             <input type="text" name="pass">
           </label>
           <label>
             <input type="checkbox" name="pass_save">次回ログインを省略する
           </label>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="ログイン">
            </div>
            パスワードを忘れた方は<a href="passRemindSend.php">コチラ</a>
         </form>
       </div>

      </section>

    </div>


  </body>
</html>
