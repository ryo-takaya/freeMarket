<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <title>商品詳細</title>
    <link rel="stylesheet" type="text/css" href="../style/style.css">
    <link rel="stylesheet" type="text/css" href="../style/products.css">
    <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>

<body class="page-productDetail page-1colum">

<!-- メニュー -->
<header>
    <div class="site-width">
        <h1><a href="detail.php">商品詳細</a></h1>
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

        <div class="title">
            <span class="badge">スマホ</span>　
            iphon6s
        </div>
        <div class="product-img-container">
          <div class="product-img-container-flex">
            <div class="img-main">
              <img src="../img/sample01.jpg" alt="">
            </div>
            <div class="img-sub">
             <img src="../img/sample02.jpg" alt="">
             <img src="../img/sample03.gif" alt="">
             <img src="../img/sample04.jpg" alt="">
           </div>
         </div>
        </div>
        <div class="product-detail">
            hogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehogehoge
        </div>
        <div class="product-buy">
            <div class="item-left">
                <a href=""> &lt; 商品一覧に戻る</a>
            </div>
            <div class="item-center">
              <p class="price">お値段:20,000円</p>
            </div>
            <div class="item-right">
                <button class="btn btn-primary">購入</button>
            </div>
        </div>

    </section>
</div>

<!-- footer -->
<footer id="footer">
    copyright hogehogeFotter
</footer>

<script src="js/vendor/jquery-2.2.2.min.js"></script>
<script>
    $(function(){
        const $ftr = $('#footer');
        if( window.innerHeight > $ftr.offset().top + $ftr.outerHeight() ){
            $ftr.attr({'style': 'position:fixed; top:' + (window.innerHeight - $ftr.outerHeight()) +'px;' });
        }
    });
</script>
</body>
</html>