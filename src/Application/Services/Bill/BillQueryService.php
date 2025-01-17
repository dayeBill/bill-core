<?php

namespace DayeBill\BillCore\Application\Services\Bill;

use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use RedJasmine\Support\Application\ApplicationQueryService;

class BillQueryService extends ApplicationQueryService
{


    public function __construct(
        protected BillReadRepositoryInterface $repository

    ) {
    }

    public function allowedIncludes() : array
    {
        return [
            'bill_type',

        ];
    }

}
