<?php

namespace DayeBill\BillCore\Infrastructure\Repositories\Eloquent;

use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use RedJasmine\Support\Infrastructure\Repositories\Eloquent\EloquentRepository;

class ContactRepository extends EloquentRepository implements ContactRepositoryInterface
{

    protected static string $eloquentModelClass = Contact::class;
}
