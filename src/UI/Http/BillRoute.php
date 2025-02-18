<?php

namespace DayeBill\BillCore\UI\Http;

use DayeBill\BillCore\UI\Http\Controllers\BillController;
use DayeBill\BillCore\UI\Http\Controllers\ContactController;
use DayeBill\BillCore\UI\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

class BillRoute
{

    public static function route() : void
    {

        Route::get('bills/summary', [BillController::class, 'summary'])->name('bill.bills.summary');
        Route::get('bills/enums', [BillController::class, 'enums'])->name('bill.bills.enums');
        Route::resource('bills', BillController::class)->names('bill.bills');
        Route::get('events/enums', [EventController::class, 'enums'])->name('bill.events.enums');
        Route::resource('events', EventController::class)->names('bill.events');
        Route::get('contacts/enums', [ContactController::class, 'enums'])->name('bill.contacts.enums');
        Route::resource('contacts', ContactController::class)->names('bill.contacts');
    }

}
