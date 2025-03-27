<?php

namespace DayeBill\BillCore\Application\Services\Bill\Queries;

use RedJasmine\Support\Domain\Data\Queries\PaginateQuery;

class BillPaginateQuery extends PaginateQuery
{

    public mixed $include = ['event', 'contact'];

    public ?int  $eventId;

    public ?int $contactId;

    public ?string $billType;
}