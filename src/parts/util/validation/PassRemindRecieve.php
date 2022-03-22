<?php


namespace App\Parts\Util\Validation;

use App\Parts\Model\Db\UsersTable;


class PassRemindRecieveValidation extends Validation
{
    public function validate(): bool
    {
        $this->notEmpty(['token']);
        $this->validHalf(['token']);

        return $this->hasError();
    }
}
