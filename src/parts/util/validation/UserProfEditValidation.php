<?php


namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class UserProfEditValidation extends Validation
{
    public function __construct(array $data, UsersTable $usersTable)
    {
        parent::__construct($data);
        $this->usersTable = $usersTable;
    }

    public function validate(): bool
    {
        if($this->data['user_name'] !== ''){
            $this->validMinLen([
                [
                    'key' => 'user_name',
                    'value' => $this->data['user_name'],
                    'min' => 6
                ]
            ]);
            $this->validMaxLen([
                [
                    'key' => 'user_name',
                    'value' => $this->data['user_name'],
                    'max' => 30
                ]
            ]);
        }

        return $this->hasError();
    }
}
