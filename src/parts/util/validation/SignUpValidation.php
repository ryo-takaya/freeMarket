<?php

namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class SignUpValidation extends Validation{

    private $usersTable;

    public function __construct(array $data, UsersTable $usersTable)
    {
        parent::__construct($data);
        $this->usersTable = $usersTable;
    }

    public function validate(): bool
    {
        $this->notEmpty(['email', 'pass', 'rePass']);
        $this->validEmail();
        $this->isSamePassAndRePass();
        $this->validMinLen([
            [
            'key' => 'pass',
            'value' => $this->data['pass'],
            'min' => 6
                ]
        ]);
        $this->validMaxLen([
            [
                'key' => 'pass',
                'value' => $this->data['pass'],
                'max' => 30
            ]
        ]);
        $this->validHalf([[
            'key' => 'pass',
            'value' => $this->data['pass'],
        ]]);
        $this->isUniqueEmail();

        return $this->hasError();
    }

    private function isUniqueEmail(){
        if (isset($this->data['email'])) {
            if($this->usersTable->isUniqueEmail($this->data['email'])){
                $this->err_message['isUniqueEmail'] = ['email' => 'そのemailは既に存在しています'];
            }
        }

    }


}
