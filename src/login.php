<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'on');

use App\Parts\Util\Validation\LoginValidation;
use App\Parts\Model\Db\UsersTable;
use App\Parts\Util\Auth;

Auth::startSession();
Auth::loginFlow();

$usersTable = new UsersTable($db);
$errorPasswordFlg = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $postData = $_POST;
    $validation = new LoginValidation($postData, $usersTable);
    if ($validation->validate()) {
        $errMessage = $validation->getErrorMessage();
    } else {
        try {
            $stmt = $db->prepare('SELECT id, password FROM users where email = :email AND delete_flg = 0');
            $stmt->execute([':email' => $postData['email']]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!empty($result) && password_verify($postData['pass'], $result['password'])) {
                $defaultLimit = 60*60;
                $_SESSION['login_date'] = time();

                if(!empty($postData['pass_save'])){
                    $_SESSION['login_limit'] = $defaultLimit * 24 * 30;
                } else {
                    $_SESSION['login_limit'] = $defaultLimit;
                }
                $_SESSION['user_id'] = $result['id'];
                header('Location:/mypage');
            } else {
                $errorPasswordFlg = true;
            }
        } catch(PDOException $e){

        }
    }
}



?>


<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>ログイン</title>
      <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <body class="page-login page-1colum">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index">MARKET</a></h1>
        <nav id="top-nav">
          <ul>
            <li><a href="/signup" class="btn btn-primary">ユーザー登録</a></li>
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
        
         <form class="form" method="post">
           <h2 class="title">ログイン</h2>
             <div class="area-msg">
                 <?php
                 if(isset($errMessage)){
                     foreach($errMessage as $arr){
                         foreach ($arr as $msg){
                             echo $msg. '</br>';
                         }
                     }
                 }
                 echo $errorPasswordFlg ? 'パスワードかユーザーネームが間違っています': '';
                 ?>
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
            パスワードを忘れた方は<a href="passRemindSend">コチラ</a>
         </form>
       </div>

      </section>

    </div>


  </body>
</html>
