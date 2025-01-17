<?php

namespace DayeBill\BillCore\Infrastructure\Repositories\Eloquent;

use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\BillRepositoryInterface;
use RedJasmine\Support\Infrastructure\Repositories\Eloquent\EloquentRepository;

class BillRepository extends EloquentRepository implements BillRepositoryInterface
{

    protected static string $eloquentModelClass = Bill::class;

}
