<?php

namespace App\Modules\Car\Repositories;

use App\Abstracts\AbstractBaseRepository as BaseRepository;
use Illuminate\Support\Collection;
use App\Modules\Car\Models\Car;

class CarRepository extends BaseRepository
{
    public function __construct()
    {
        $this->setModel(Car::class);
    }

    /**
     * @return Collection
     */
    public function listCar(): Collection
    {
        return $this->getModel()
            ->orderBy('name')
            ->get();
    }
}
