<?php

namespace DayeBill\BillCore\Application\Services\Bill;

use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommandHandler;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\BillRepositoryInterface;
use RedJasmine\Support\Application\ApplicationCommandService;

/**
 * @see BillCreateCommandHandler::handle()
 * @method Bill create(BillCreateCommand $command)
 */
class BillCommandService extends ApplicationCommandService
{

    public function __construct(
        public BillRepositoryInterface $repository
    ) {
    }

    protected static string $modelClass = Bill::class;

    public static string $hookNamePrefix = 'bill-core.application.bill.command';

    protected static $macros = [
        'create' => BillCreateCommandHandler::class,
    ];


}
