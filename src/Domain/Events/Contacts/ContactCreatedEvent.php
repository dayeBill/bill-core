<?php

namespace DayeBill\BillCore\Domain\Events\Contacts;

use DayeBill\BillCore\Domain\Models\Contact;
use Illuminate\Contracts\Events\ShouldDispatchAfterCommit;
use Illuminate\Foundation\Events\Dispatchable;
use RedJasmine\Payment\Domain\Models\Refund;

class ContactCreatedEvent implements ShouldDispatchAfterCommit
{

    use Dispatchable;


    public function __construct(public readonly Contact $contact)
    {
    }
}

