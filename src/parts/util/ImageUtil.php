<?php

namespace App\Parts\Util;

class ImageUtil{

    static public function uploadImage(array $file)
    {
        if (isset($file['error']) && is_int($file['error'])) {
            switch ($file['error']) {
                case UPLOAD_ERR_OK:
                    break;
                case UPLOAD_ERR_NO_FILE:
                    throw new RuntimeException('ファイルが選択されていません');
                case UPLOAD_ERR_INI_SIZE:
                case UPLOAD_ERR_FORM_SIZE:
                    throw new RuntimeException('ファイルサイズが大きすぎます');
                default:
                    throw new RuntimeException('原因不明のエラー');
            }

            $path = 'uploads'. sha1_file($file['tmp_name']). image_type_to_extension($type);
            if (!move_uploaded_file($file['tmp_name'], $path)) {
                throw new RuntimeException('アップロードができませんでした');
            }
            chmod($path, 0644);

            return $path;
        }
    }
}
