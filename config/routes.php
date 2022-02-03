<?php

class Route {
    private const ROUTE_MAP = [
        ['path' => '/', 'file' => 'src/index.php'],
        ['path' => '/login', 'file' => 'src/login.php'],
        ['path' => '/signup', 'file' => 'src/signup.php']

    ];

    /**
     * URLから対応するfilePathを返す
     * @param string $path アクセスパス
     * @return string 返すパス
     */
   public static function resolveFile($path):string
   {
       $map = self::ROUTE_MAP;
       foreach ($map as $info) {
           if($path === $info['path']) {
               return $info['file'];
           }
       }
       return 'src/notFound.php';
   }


}
