<?php
use App\Parts\Util\Auth;
use App\Parts\Util\Validation\UserProfEditValidation;
use App\Parts\Model\Db\UsersTable;

Auth::startSession();
Auth::loginFlow();

$usersTable = new UsersTable($db);
$user = $usersTable->getUser($_SESSION['user_id']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $validation = new UserProfEditValidation($_POST, $usersTable);
if ($validation->validate()) {
    $errMessage = $validation->getErrorMessage();
} else {
    if($_POST['user_name'] !== ''){
        $user['user_name'] = $_POST['user_name'];
    }

    $stmt = $db->prepare('UPDATE users SET user_name = :user_name WHERE user_id = :user_id');
    $result = $stmt->execute([':user_name' => $user['user_name'],':id' => $_SESSION['user_id']]);
    if(!$result){
        throw new Exception('更新に失敗しました');
    }

  }
}

?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>プロフィール編集  MARKET</title>
      <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

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
                  ?>
              </div>
           <label>
             名前
             <input type="text" name="username">
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
