<?php

namespace App\Http\Controllers;

use App\Http\Resources\WeatherResource;
use App\Repositories\AuditLog\WeatherRepository;
use Illuminate\Http\Request;

class WeatherController extends Controller
{

    public WeatherRepository $weatherRepository;

    public function __construct(WeatherRepository $repository) {
        $this->weatherRepository = $repository;
    }
    public function index() {
        $result = $this->weatherRepository->getData();
        return WeatherResource::collection($result);
    }
}
