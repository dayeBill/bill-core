<?php

namespace DayeBill\BillCore\Application\Services\Bill\Commands;

use DayeBill\BillCore\Application\Services\Bill\BillCommandService;
use DayeBill\BillCore\Domain\Data\ContactData;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;
use DayeBill\BillCore\Domain\Services\BillDomainService;
use DayeBill\BillCore\Domain\Services\ContactDomainService;
use RedJasmine\Support\Application\CommandHandler;
use Throwable;

class BillCreateCommandHandler extends CommandHandler
{
    public function __construct(
        protected BillCommandService $service,
        protected BillDomainService $billDomainService,
        protected ContactDomainService $contactDomainService,
        public ContactReadRepositoryInterface $contactReadRepository
    ) {
    }

    public function handle(BillCreateCommand $command) : Bill
    {
        $this->beginDatabaseTransaction();
        try {
            // 查询联系人
            $this->quickCreateContact($command);
            // 查询事件
            $bill = $this->billDomainService->create($command);
            // 创建账单
            $this->service->repository->store($bill);
            $this->commitDatabaseTransaction();
        } catch (AbstractException $exception) {
            $this->rollBackDatabaseTransaction();
            throw  $exception;
        } catch (Throwable $throwable) {
            $this->rollBackDatabaseTransaction();
            throw  $throwable;
        }
        return $bill;
    }

    protected function quickCreateContact(BillCreateCommand $command) : void
    {
        if (isset($command->contactId) && $command->contact) {
            return;
        }
        if (!isset($command->contact)) {
            return;
        }

        if ($contact = $this->contactReadRepository->findByNameInOwner(
            $command->owner,
            $command->contact->name,
            $command->contact->alias
        )) {
            $command->contactId = $contact->id;
            return;
        }


        $contactCreateCommand               = new ContactData();
        $contactCreateCommand->owner        = $command->owner;
        $contactCreateCommand->name         = $command->contact->name;
        $contactCreateCommand->alias        = $command->contact->alias;
        $contactCreateCommand->relationType = $command->contact->relationType;

        $contact = $this->contactDomainService->create($contactCreateCommand);

        $command->contactId = $contact->id;
    }

}
