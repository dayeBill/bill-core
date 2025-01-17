<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;

class EventReadRepository extends QueryBuilderReadRepository implements EventReadRepositoryInterface
{
    public $modelClass = Event::class;

}
