<?php
use App\Parts\Util\Auth;
use App\Parts\Util\ImageUtil;
use App\Parts\Model\Db\CategoriesTable;

Auth::startSession();
Auth::loginFlow();
$categoryTable = new CategoriesTable($db);
$categories = $categoryTable->getListCategories();
$errFlg = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pic1 = $_FILES['pic1']['name'] !== ''? ImageUtil::uploadImage($_FILES['pic1']):'';

    $name = $_POST['name'];
    $category_id = $_POST['category_id'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
    var_dump($category_id);


    $stmt = $db->prepare('INSERT products INTO(user_id, category_id, product_name, comment, price, pic1) VALUES(:user_id, :category_id, :comment, :price, :pic1)');
    $result = $stmt->execute([':user_id' => $_SESSION['user_id'], ':category_id' => 1, ':comment' => $comment, ':price' => $price, ':pic1' => $pic1]);

    if($result){
        header('Location:/mypage');
    } else {
        $errFlg = true;
    }
}
?>
<!DOCTYPE html>
<html lang="ja">

  <head>
    <meta charset="utf-8">
    <title>商品出品登録</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  </head>

  <body class="page-profEdit page-2colum page-logined">

    <!-- メニュー -->
    <header>
      <div class="site-width">
        <h1><a href="index.php">商品出品登録</a></h1>
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
      <h1 class="page-title">商品を出品する</h1>
      <!-- Main -->
      <section id="main" >
        <div class="form-container">
          <form action="" class="form" method="post" enctype="multipart/form-data">
            <div class="area-msg">
              <?php echo $errFlg?'商品の投稿に失敗しました':'' ?>
            </div>
            <label>
              商品名
              <input type="text" name="name">
            </label>
            <label>
              カテゴリ
              <select name="category" id="">
                  <?php foreach ($categories as $category): ?>
                      <option value=<?php echo $category['id']?>><?php echo $category['name'] ?></option>
                  <?php endforeach; ?>
              </select>
            </label>
            <label>
              詳細
              <textarea name="comment" id="" cols="30" rows="10" style="height:150px;"></textarea>
            </label>
            <p class="counter-text">0/500文字</p>
            <label style="text-align:left;">
              金額
              <div class="form-group">
                <input type="text" name="price" style="width:150px" placeholder="50,000"><span class="option">円</span>
              </div>
            </label>
            <label>
              画像１
                <input type="file" name="pic1">
              <div class="area-drop">


              </div>
            </label>
            <label>
              画像２
                <input type="file" name="pic2">
              <div class="area-drop">

              </div>
            </label>
            <label>
              画像３
                <input type="file" name="pic3">
              <div class="area-drop">

              </div>
            </label>

            <div class="btn-container">
              <input type="submit" class="btn btn-mid" value="出品する">
            </div>
          </form>
        </div>
      </section>

      <!-- サイドバー -->
      <section id="sidebar">
        <a href="registProduct.php">商品を登録する</a>
        <a href="tranSale.php">販売履歴を見る</a>
        <a href="profEdit.php">プロフィール編集</a>
        <a href="passEdit.php">パスワード変更</a>
        <a href="withdraw.php">退会</a>
      </section>
    </div>



  </body>
</html>
