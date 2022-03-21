<?php

namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class LoginValidation extends Validation{

    public function __construct(array $data, UsersTable $usersTable)
    {
        parent::__construct($data);
        $this->usersTable = $usersTable;
    }

    public function validate(): bool
    {
        $this->notEmpty(['email', 'pass', 'rePass']);
        $this->validEmail();
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

        return $this->hasError();
    }
}
