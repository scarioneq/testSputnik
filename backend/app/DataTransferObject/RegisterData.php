<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation;

class RegisterData extends Data
{
    public function __construct(
        #[Validation\Required, Validation\StringType, Validation\Max(255), Validation\Unique('users', 'login')]
        public string $login,

        #[Validation\Required, Validation\StringType, Validation\Min(6)]
        public string $password
    ) {}
}
