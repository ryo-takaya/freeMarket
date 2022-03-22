<?php


namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class PassRemindSendValidation extends Validation
{
    public function validate(): bool
    {
        $this->notEmpty(['email']);
        $this->validEmail();

        return $this->hasError();
    }
}

