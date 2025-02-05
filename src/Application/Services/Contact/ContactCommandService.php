<?php

namespace DayeBill\BillCore\Application\Services\Contact;

use DayeBill\BillCore\Application\Services\Contact\Commands\ContactCreateCommandHandler;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use RedJasmine\Support\Application\ApplicationCommandService;
use RedJasmine\Support\Application\CommandHandlers\DeleteCommandHandler;
use RedJasmine\Support\Application\CommandHandlers\UpdateCommandHandler;

class ContactCommandService extends ApplicationCommandService
{


    public function __construct(
        public ContactRepositoryInterface $repository

    ) {
    }

    protected static string $modelClass = Contact::class;

    public static string $hookNamePrefix = 'bill-core.application.contact.command';


    protected static $macros = [
        'create' => ContactCreateCommandHandler::class,
        'update' => UpdateCommandHandler::class,
        'delete' => DeleteCommandHandler::class
    ];


}

