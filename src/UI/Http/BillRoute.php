<?php

namespace DayeBill\BillCore\UI\Http;

use DayeBill\BillCore\UI\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;

class BillRoute
{

    public static function route()
    {

        Route::resource('bills', BillController::class)->names('bill.bills');
    }

}
