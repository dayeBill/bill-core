<?php

namespace DayeBill\BillCore\Infrastructure\Repositories\Eloquent;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\EventRepositoryInterface;
use RedJasmine\Support\Infrastructure\Repositories\Eloquent\EloquentRepository;

class EventRepository extends EloquentRepository implements EventRepositoryInterface
{


    protected static string $eloquentModelClass = Event::class;
}
