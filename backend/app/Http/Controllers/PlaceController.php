<?php

namespace App\Http\Controllers;

use App\DataTransferObject\PlaceData;
use App\Models\Place;
use App\Services\PlaceService;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function __construct(private PlaceService $service) {}

    public function index()
    {
        return $this->service->getAll();
    }

    public function store(Request $request)
    {
        $this->authorize('create', Place::class);
        $data = PlaceData::from($request);
        return $this->service->create($data);
    }
}
