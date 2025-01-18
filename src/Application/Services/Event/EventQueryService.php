<?php

namespace DayeBill\BillCore\Application\Services\Event;

use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use RedJasmine\Support\Application\ApplicationQueryService;
use Spatie\QueryBuilder\AllowedFilter;

class EventQueryService extends ApplicationQueryService
{


    public function __construct(
        protected EventReadRepositoryInterface $repository

    ) {
    }


    public function allowedFilters() : array
    {
        return [
            AllowedFilter::exact('owner_type'),
            AllowedFilter::exact('owner_id'),
            AllowedFilter::exact('id'),
        ];
    }


}
