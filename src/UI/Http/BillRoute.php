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

        Route::get('bills/options', [BillController::class, 'options'])->name('bill.bills.options');
        Route::resource('bills', BillController::class)->names('bill.bills');
        Route::get('events/options', [EventController::class, 'options'])->name('bill.events.options');
        Route::resource('events', EventController::class)->names('bill.events');
        Route::get('contacts/options', [ContactController::class, 'options'])->name('bill.contacts.options');
        Route::resource('contacts', ContactController::class)->names('bill.contacts');
    }

}
