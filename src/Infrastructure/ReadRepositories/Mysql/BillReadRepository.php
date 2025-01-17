<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\BillReadRepositoryInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;

class BillReadRepository extends QueryBuilderReadRepository implements BillReadRepositoryInterface
{
    public $modelClass = Bill::class;

}
