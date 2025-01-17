<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;

class EventReadRepository extends QueryBuilderReadRepository implements EventReadRepositoryInterface
{
    /**
     *
     * @var $modelClass class-string
     */
    protected static string  $modelClass = Event::class;

    public function findByIdInOwner(UserInterface $owner, int $id) : ?Model
    {
        return $this->query(null)->where([
            'owner_type' => $owner->getType(),
            'owner_id'   => (string) $owner->getId(),
        ])->where('id', $id)->first();
    }

}
