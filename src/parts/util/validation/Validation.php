<?php

namespace App\Parts\Util\Validation;

abstract class Validation{

    protected $data;
    protected $err_message = [];


    /**
     * @param array $data
     */
    public function __construct(array $data){
        $this->data = $data;
    }

    /**
     *
     */
    protected function notEmpty(array $mustValidateKey):array
    {
        $data = $this->data;
        $result = [];
        foreach ($data as $key => $value) {
            if (!array_key_exists($key,$mustValidateKey)) {
                $result[$key] = '入力必須です';
            }
            if(count($result) !== 0){
                return $result;
            }
            if(strlen($value) === 0){
                $result[$key] = '入力必須です';
            }
        }
         $this->err_message['notEmpty'] = $result;
    }

    protected function validEmail()
    {
        $result = [];
        if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $this->data['email'])){
            $result[] = 'Emailの形式で入力してください';
        }
         $this->err_message['validEmail'] = $result;
    }

    protected function isSamePassAndRePass(){
        $result = [];
        if($this->data['pass'] !== $this->data['rePass']){
            $result[] = 'パスワード（再入力）が合っていません';
        }
         $this->err_message['isSamePassAndRePass'] = $result;
    }

    protected function validMinLen(array $validateInfo){
        $result = [];
        foreach ($validateInfo as $info) {
            if(mb_strlen($info['value']) < $info['min']){
                $result[$info['key']] = "{$info['min']}文字以上で入力してください";
            }
        }

         $this->err_message['validMinLen'] =  $result;
    }

    protected function validMaxLen(array $validateInfo){
        $result = [];

        var_dump($validateInfo);
        foreach ($validateInfo as $info) {
            if(mb_strlen($info['value']) > $info['max']){
                $result[$info['key']] = "{$info['max']}文字以内で入力してください";
            }
        }
         $this->err_message['validMaxLen'] = $result;
    }

    protected function validHalf(array $validateKey){
        $result = [];
        foreach ($validateKey as $info) {
            if(!preg_match("/^[a-zA-Z0-9]+$/", $info['value'])){
                $result[$info['key']] = '半角英数字のみご利用いただけます';
            }
        }

        $this->err_message['validHalf'] = $result;
    }

    /**
     * バリデーションエラーがあったらtrue, なかったらfalse
     * @return bool
     */
    protected function hasError(): bool
    {
        $error = $this->getErrorMessage();
        foreach ($error as $arr) {
            if(count($arr) > 0){
                return true;
            }
        }
        return false;
    }
    
    /**
     * @return  bool
     */
    abstract public function validate():bool;

    public function getErrorMessage():array
    {
        return $this->err_message;
    }
}
