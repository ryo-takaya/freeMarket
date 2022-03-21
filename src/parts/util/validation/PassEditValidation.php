<?php

namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class PassEditValidation extends Validation
{
    public function __construct(array $data, UsersTable $usersTable)
    {
        parent::__construct($data);
        $this->usersTable = $usersTable;
    }

    public function validate(): bool
    {
        $this->notEmpty(['old_pass', 'pass', 'rePass']);
        $this->validPass();
        $this->isSamePassAndRePass();

        return $this->hasError();
    }

    private function validPass()
    {
        foreach (['pass', 'rePass', 'old_pass'] as $key) {
            $this->validMinLen([
                [
                    'key' => $key,
                    'value' => $this->data[$key],
                    'min' => 6
                ]
            ]);
            $this->validMaxLen([
                [
                    'key' => $key,
                    'value' => $this->data[$key],
                    'max' => 30
                ]
            ]);
            $this->validHalf([[
                'key' => $key,
                'value' => $this->data[$key],
            ]]);
        }

    }
}
