<?php

namespace DayeBill\BillCore\Application\Services\Contact\Commands;

use DayeBill\BillCore\Application\Services\Contact\ContactApplicationService;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Services\ContactDomainService;
use RedJasmine\Support\Application\Commands\CommandHandler;
use RedJasmine\Support\Exceptions\AbstractException;
use Throwable;

class ContactCreateCommandHandler extends CommandHandler
{

    public function __construct(
        protected ContactApplicationService $service,
        protected ContactDomainService $domainService,


    ) {
    }


    public function handle(ContactCreateCommand $command) : Contact
    {
        $this->beginDatabaseTransaction();

        try {

            $contact = $this->domainService->create($command);

            $this->service->repository->store($contact);

            $this->commitDatabaseTransaction();
        } catch (AbstractException $exception) {
            $this->rollBackDatabaseTransaction();
            throw  $exception;
        } catch (Throwable $throwable) {
            $this->rollBackDatabaseTransaction();
            throw  $throwable;
        }

        return $contact;

    }

}
