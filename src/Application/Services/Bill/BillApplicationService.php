<?php

namespace DayeBill\BillCore\Application\Services\Bill;

use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommandHandler;
use DayeBill\BillCore\Application\Services\Bill\Queries\BillSummaryQuery;
use DayeBill\BillCore\Application\Services\Bill\Queries\BillSummaryQueryHandler;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\BillRepositoryInterface;
use RedJasmine\Support\Application\ApplicationService;
use RedJasmine\Support\Application\CommandHandlers\DeleteCommandHandler;

/**
 * @see BillCreateCommandHandler::handle()
 * @method Bill create(BillCreateCommand $command)
 * @method array summary(BillSummaryQuery $command)
 */
class BillApplicationService extends ApplicationService
{

    public function __construct(
        public BillRepositoryInterface $repository,
        public BillReadRepositoryInterface $readRepository
    ) {
    }

    protected static string $modelClass = Bill::class;

    public static string $hookNamePrefix = 'bill-core.application.bill';

    protected static $macros = [
        'create'  => BillCreateCommandHandler::class,
        'update'  => null,
        'summary' => BillSummaryQueryHandler::class
    ];


}
