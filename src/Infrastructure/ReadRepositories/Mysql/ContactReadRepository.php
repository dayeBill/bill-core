<?php

namespace DayeBill\BillCore\Infrastructure\ReadRepositories\Mysql;

use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use RedJasmine\Support\Infrastructure\ReadRepositories\QueryBuilderReadRepository;

class ContactReadRepository extends QueryBuilderReadRepository implements ContactReadRepositoryInterface
{
    public $modelClass = Contact::class;

}
