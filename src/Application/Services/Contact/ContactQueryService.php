<?php

namespace DayeBill\BillCore\Application\Services\Contact;

use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use RedJasmine\Support\Application\ApplicationQueryService;
use Spatie\QueryBuilder\AllowedFilter;

class ContactQueryService extends ApplicationQueryService
{


    public function __construct(
        protected ContactReadRepositoryInterface $repository

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
