<?php

namespace App\Modules\Car\Services;

use App\Modules\Car\Models\Car;
use App\Modules\Car\Repositories\CarRepository;
use Illuminate\Support\Collection;

class CarService
{
    protected $repository;

    public function __construct(CarRepository $carRepository)
    {
        $this->repository = $carRepository;
    }

    /**
     * @return Collection
     */
    public function listCar(): Collection
    {
        return $this->repository->listCar();
    }
}
