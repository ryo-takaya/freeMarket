<?php
use App\Parts\Util\Auth;

Auth::startSession();
Auth::loginFlow();

$errFlg = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try{
        $sql1 = 'UPDATE users SET delete_flg = 1 where user_id = :user_id';
        $sql2 = 'UPDATE products SET delete_flg = 1 where user_id = :user_id';
        $sql3 = 'UPDATE favorite_products SET delete_flg = 1 where user_id = :user_id';

        $stmt = $db->prepare($sql1);
        $result = $stmt->execute([':user_id' => $_SESSION['user_id']]);
        $stmt = $db->prepare($sql2);
        $stmt->execute([':user_id' => $_SESSION['user_id']]);
        $stmt = $db->prepare($sql3);
        $stmt->execute([':user_id' => $_SESSION['user_id']]);

        if($result){
            session_destroy();
            header('Location:login');
        }else{
            $errFlg = true;
        }

    }catch (PDOException $e) {
        echo $e->getMessage();
    }
}
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
            <li><a href="/mypage">マイページ</a></li>
            <li><a href="/logout">ログアウト</a></li>
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
            <h2 class="title">退会</h2>
              <div class="area-msg">
                  <?php

                  echo $errFlg ? '退会に失敗しました': '';
                  ?>
              </div>
            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="退会する" name="submit">
            </div>
          </form>
        </div>
        <a href="mypage">&lt; マイページに戻る</a>
      </section>
    </div>



  </body>
</html>
