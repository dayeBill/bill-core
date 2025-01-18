<?php

namespace DayeBill\BillCore\UI\Http;

use DayeBill\BillCore\UI\Http\Controllers\BillController;
use DayeBill\BillCore\UI\Http\Controllers\ContactController;
use DayeBill\BillCore\UI\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

class BillRoute
{

    public static function route()
    {

        Route::resource('bills', BillController::class)->names('bill.bills');
        Route::resource('events', EventController::class)->names('bill.events');
        Route::resource('contacts', ContactController::class)->names('bill.contacts');
    }

}
