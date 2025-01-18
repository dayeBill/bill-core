<?php

namespace DayeBill\BillCore\Application\Services\Bill;

use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;
use RedJasmine\Support\Application\ApplicationQueryService;
use RedJasmine\Support\Domain\Data\Queries\PaginateQuery;
use Spatie\QueryBuilder\AllowedFilter;

class BillQueryService extends ApplicationQueryService
{


    public function __construct(
        protected BillReadRepositoryInterface $repository

    ) {
    }


    public function paginate(PaginateQuery $query) : LengthAwarePaginator
    {
        $query->include = ['event', 'contact'];

        return $this->getRepository()->paginate($query);
    }


    public function allowedFilters() : array
    {
        return [
            AllowedFilter::exact('owner_type'),
            AllowedFilter::exact('owner_id'),
            AllowedFilter::exact('event_id'),

        ];
    }

    public function allowedIncludes() : array
    {
        return [
            'contact',
            'event'
        ];
    }

}
