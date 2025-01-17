<?php

namespace DayeBill\BillCore\Application\Services\Bill\Commands;

use DayeBill\BillCore\Domain\Data\BillData;

class BillCreateCommand extends BillData
{

    public ?QuickContactData $contact;

}
