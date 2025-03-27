<?php

namespace DayeBill\BillCore\Application\Services\Event;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\EventRepositoryInterface;
use RedJasmine\Support\Application\ApplicationService;
use RedJasmine\Support\Data\Data;

/**
 * @method Event create(Data $command)
 */
class EventApplicationService extends ApplicationService
{


    public function __construct(
        public EventRepositoryInterface $repository,
        public EventReadRepositoryInterface $readRepository

    ) {
    }

    protected static string $modelClass = Event::class;


    public static string $hookNamePrefix = 'bill-core.application.event';


}
