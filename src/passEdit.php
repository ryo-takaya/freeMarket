<?php
use App\Parts\Util\Auth;
use App\Parts\Model\Db\UsersTable;
use App\Parts\Util\Validation\PassEditValidation;

Auth::startSession();
Auth::loginFlow();

$usersTable = new UsersTable($db);
$user = $usersTable->getUser($_SESSION['user_id']);
$samePass = false;
$sameNewOldPass = false;
var_dump($user);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
$validation = new PassEditValidation($_POST, $usersTable);
if(!password_verify($user['password'], $_POST['old_pass'])){
    var_dump(333);
    $samePass = true;
}
    if($_POST['old_pass'] === $_POST['pass']){
        $sameNewOldPass = true;
    }

if ($validation->validate() || $samePass || $sameNewOldPass) {
    $errMessage = $validation->getErrorMessage();
} else {
    $stmt = $db->prepare('UPDATE users SET password = :password WHERE id = :user_id');
    $result = $stmt->execute([':id' => $_SESSION['user_id']]);
    if(!$result){
        throw new Exception('更新に失敗しました');
    } else{
        var_dump('kjk');
        $_SESSION['msg_success'] = 'パスワードの更新がうまくいきました';
        $userName = $user['user_name'];
        $from = 'test@example.com';
        $to = $user['email'];
        $sub = 'パスワード変更';
        mb_language('Japanese');
        mb_internal_encoding('UTF-8');

        $result = mb_send_mail($to,$sub,'パスワード変更', "From: ". $from);
        if(!$result){
            throw new Exception('メールの送信に失敗しました');
        }
    }
}
}
?>

<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>パスワード変更 MARKET</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
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
            <li><a href="/logout">ログアウト</a></li>
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
          <form action="" class="form" method="post">
              <div class="area-msg">
                  <?php
                  if(isset($errMessage)){
                      foreach($errMessage as $arr){
                          foreach ($arr as $msg){
                              echo $msg. '</br>';
                          }
                      }
                  }
                  echo $samePass && 'パスワードがあっていません';
                  echo $sameNewOldPass && 'パスワードが同じです';
                  ?>
              </div>
            <label>
              古いパスワード
              <input type="text" name="old_pass">
            </label>
            <label>
              新しいパスワード
              <input type="text" name="pass">
            </label>
            <label>
              新しいパスワード（再入力）
              <input type="text" name="rePass">
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
