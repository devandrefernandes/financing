<?php

namespace App\Abstracts;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

abstract class AbstractBaseRepository
{
    protected $model;

    public function __construct()
    {
        $this->setModel($this->model);
    }

    public function setModel(string $modelClass) : void
    {
        $this->model = app($modelClass);
    }

    public function getModel(): Model
    {
        if ($this->model instanceof Model) {
            return $this->model;
        }
        throw new \Exception('Model not instanceof of Illuminate\Database\Eloquent\Model');
    }
}
