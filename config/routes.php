<?php

class Route {
    private const ROUTE_MAP = [
        ['path' => '/', 'file' => 'src/index.php'],
        ['path' => '/login', 'file' => 'src/login.php'],
        ['path' => '/signup', 'file' => 'src/signup.php'],
        ['path' => '/mypage', 'file' => 'src/mypage.php'],
        ['path' => '/logout', 'file' => 'src/logout.php'],
        ['path' => '/withdraw', 'file' => 'src/withdraw.php'],
        ['path' => '/user/edit', 'file' => 'src/profEdit.php'],
        ['path' => '/passedit', 'file' => 'src/passEdit.php'],
        ['path' => '/passremind', 'file' => 'src/passRemindSend.php'],
        ['path' => '/passremindrecieve', 'file' => 'src/passRemindRecieve.php'],
    ];

    /**
     * URLから対応するfilePathを返す
     * @return string 返すパス
     */
   public static function resolveFile():string
   {
       $map = self::ROUTE_MAP;
       $path = self::parseUrl();
       foreach ($map as $info) {
           if($path === $info['path']) {
               return $info['file'];
           }
       }
       return 'src/notFound.php';
   }

   private static function parseUrl():string{
       if(!isset($_SERVER['REQUEST_URI'])){
           throw new RuntimeException('$_SERVER["REQUEST_URI"]が定義されていません');
       }
       $path = $_SERVER['REQUEST_URI'];
       $position = strpos($path,'?');
       if($position === false){
           return $path;
       } else {
           return (explode('?', $path))[0];
       }
   }


}
