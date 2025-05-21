<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation;

class WishlistData extends Data
{
    public function __construct(
        #[Validation\Required, Validation\Exists('places', 'id')]
        public int $place_id
    ) {}
}
