<?php

namespace App\DataTransferObject;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Attributes\Validation;

class PlaceData extends Data
{
    public function __construct(
        #[Validation\Required,
            Validation\StringType,
            Validation\Max(255),
            Validation\Unique('places', 'name')]
        public string $name,

        #[Validation\Required,
            Validation\Numeric,
            Validation\Between(-90, 90)]
        public float $latitude,

        #[Validation\Required,
            Validation\Numeric,
            Validation\Between(-180, 180)]
        public float $longitude
    ) {}
}
