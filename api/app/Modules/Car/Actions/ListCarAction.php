<?php

namespace App\Modules\Car\Actions;

use App\Modules\Car\Services\CarService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Lorisleiva\Actions\Action;

class ListCarAction extends Action
{
    private $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function handle(Request $request): JsonResponse
    {
        $results = $this->carService->listCar();

        return response()->json([
            'results' => $results
        ], Response::HTTP_OK);
    }
}
