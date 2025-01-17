<?php

use DayeBill\BillCore\UI\Http\BillRoute;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['message' => 'success', 'code' => 0,]);
});


BillRoute::route();

