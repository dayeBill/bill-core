<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;
use Spatie\QueryBuilder\AllowedFilter;

class BillReadRepository extends QueryBuilderReadRepository implements BillReadRepositoryInterface
{
    /**
     * @var $modelClass class-string
     */
    protected static string $modelClass = Bill::class;


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
