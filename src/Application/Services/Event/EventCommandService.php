<?php

namespace DayeBill\BillCore\Application\Services\Event;

use DayeBill\BillCore\Domain\Models\Event;
use DayeBill\BillCore\Domain\Repositories\EventRepositoryInterface;
use RedJasmine\Support\Application\ApplicationCommandService;
use RedJasmine\Support\Data\Data;

/**
 * @method Event create(Data $command)
 */
class EventCommandService extends ApplicationCommandService
{


    public function __construct(
        public EventRepositoryInterface $repository

    ) {
    }

    protected static string $modelClass = Event::class;

    public static string $hookNamePrefix = 'bill-core.application.event.command';


}
