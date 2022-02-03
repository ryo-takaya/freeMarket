<?php

namespace App\Parts\Util\Validation;


class SignUpValidation extends Validation{

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

        return $this->hasError();

    }


}
