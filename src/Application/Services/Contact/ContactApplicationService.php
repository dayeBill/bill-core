<?php

namespace DayeBill\BillCore\Application\Services\Contact;

use DayeBill\BillCore\Application\Services\Contact\Commands\ContactCreateCommandHandler;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use RedJasmine\Support\Application\ApplicationService;

class ContactApplicationService extends ApplicationService
{


    public function __construct(
        public ContactRepositoryInterface $repository,
        public ContactReadRepositoryInterface $readRepository,
    ) {
    }

    protected static string $modelClass = Contact::class;

    public static string $hookNamePrefix = 'bill-core.application.contact';


    protected static $macros = [
        'create' => ContactCreateCommandHandler::class,
    ];


}

