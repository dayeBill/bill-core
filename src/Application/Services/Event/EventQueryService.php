<?php

namespace DayeBill\BillCore\Application\Services\Event;

use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
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
            AllowedFilter::callback('keyword', static function (Builder $builder, $value) {
                return $builder->where(function (Builder $builder) use ($value) {
                    $builder->where('subject', 'like', '%'.$value.'%');
                });
            }),
        ];
    }


}
