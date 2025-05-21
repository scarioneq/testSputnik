<?php

namespace App\Services;

use App\DataTransferObject\PlaceData;
use App\Models\Place;

class PlaceService
{
    public function create(PlaceData $data): Place
    {
        return Place::create($data->toArray());
    }

    public function getAll()
    {
        return Place::all();
    }
}
