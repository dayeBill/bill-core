<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;
use Spatie\QueryBuilder\AllowedFilter;

class EventReadRepository extends QueryBuilderReadRepository implements EventReadRepositoryInterface
{
    /**
     *
     * @var $modelClass class-string
     */
    protected static string  $modelClass = Event::class;

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

    public function findByIdInOwner(UserInterface $owner, int $id) : ?Model
    {
        return $this->query(null)->where([
            'owner_type' => $owner->getType(),
            'owner_id'   => (string) $owner->getId(),
        ])->where('id', $id)->first();
    }

}
