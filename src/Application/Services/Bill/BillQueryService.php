<?php

namespace DayeBill\BillCore\Application\Services\Bill;

use DayeBill\BillCore\Application\Services\Bill\Queries\BillSummaryQueryHandler;
use DayeBill\BillCore\Application\Services\Bill\Queries\BillPaginateQuery;
use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use RedJasmine\Support\Application\ApplicationQueryService;
use Spatie\QueryBuilder\AllowedFilter;

class BillQueryService extends ApplicationQueryService
{


    public function __construct(
        public BillReadRepositoryInterface $repository

    ) {
    }


    protected static $macros = [
        'findById'       => FindQueryHandler::class,
        'paginate'       => PaginateQueryHandler::class,
        'simplePaginate' => SimplePaginateQueryHandler::class,
        'summary'        => BillSummaryQueryHandler::class
    ];

    public function paginate(BillPaginateQuery $query) : LengthAwarePaginator
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
            AllowedFilter::exact('contact_id'),
            AllowedFilter::exact('bill_type'),
            AllowedFilter::exact('bill_category'),

            AllowedFilter::callback('keyword', static function (Builder $builder, $value) {
                return $builder->where(function (Builder $builder) use ($value) {
                    $builder->where('bill_category', 'like', '%'.$value.'%')
                            ->orWhere('subject', 'like', '%'.$value.'%');
                });
            }),

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
