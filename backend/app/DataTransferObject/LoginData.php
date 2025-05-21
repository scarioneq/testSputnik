<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation;

class LoginData extends Data
{
    public function __construct(
        #[Validation\Required, Validation\StringType]
        public string $login,

        #[Validation\Required, Validation\StringType]
        public string $password
    ) {}
}
