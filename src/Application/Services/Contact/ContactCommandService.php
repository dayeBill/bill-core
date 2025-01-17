<?php

namespace DayeBill\BillCore\Application\Services\Contact;

use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use RedJasmine\Support\Application\ApplicationCommandService;

class ContactCommandService extends ApplicationCommandService
{


    public function __construct(
        public ContactRepositoryInterface $repository

    ) {
    }

    protected static string $modelClass = Contact::class;

    public static string $hookNamePrefix = 'bill-core.application.contact.command';


}

