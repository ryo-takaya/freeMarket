<?php

class Route {
    private const ROUTE_MAP = [
        ['path' => '/', 'file' => 'src/index.php'],
        ['path' => '/login', 'file' => 'src/login.php'],
        ['path' => '/signup', 'file' => 'src/signup.php'],
        ['path' => '/mypage', 'file' => 'src/mypage.php']

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
