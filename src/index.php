<?php
require_once dirname(__FILE__, 2). '/vendor/autoload.php';

$sql = 'SELECT * FROM products';
$stmt = $db->prepare($sql);
$stmt->execute();
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
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


      <!-- Main -->
      <section id="main" >

        <div class="panel-list">
            <?php foreach ($products as $product): ?>
                <div class="panel-head">
                    <img src="<?php echo $product['pic1'] ?>" alt="商品タイトル">
                </div>
                <div class="panel-body">
                    <p class="panel-title"><?php echo $product['product_name'] ?> <span class="price"><?php echo $product['price'] ?></span></p>
                </div>
            <?php endforeach; ?>

        </div>
        
      </section>

    </div>

  </body>
</html>
