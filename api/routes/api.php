<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Car\Actions\ListCarAction;

Route::group(['prefix' => 'cars'], function () {
    Route::get('/', ListCarAction::class);
});
