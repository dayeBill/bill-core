<?php

namespace DayeBill\BillCore\Domain\Services;

use DayeBill\BillCore\Domain\Data\BillData;
use DayeBill\BillCore\Domain\Exceptions\ContactException;
use DayeBill\BillCore\Domain\Models\Bill;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\EventReadRepositoryInterface;
use RedJasmine\Support\Domain\Data\Queries\FindQuery;

class BillDomainService
{

    public function __construct(
        protected EventReadRepositoryInterface $eventReadRepository,
        protected ContactReadRepositoryInterface $contactReadRepository,

    ) {
    }


    /**
     * @param  BillData  $data
     *
     * @return Bill
     * @throws ContactException
     */
    public function create(BillData $data) : Bill
    {

        // 查询联系人
        if (isset($data->contactId) && !$this->contactReadRepository->findByIdInOwner($data->owner, $data->contactId)) {
            throw new ContactException('联系人不存在', 114401);
        }
        // 查询事件
        if (isset($data->eventId) && !$this->eventReadRepository->findByIdInOwner($data->owner, $data->eventId)) {
            throw new ContactException('事件不存在', 204401);
        }

        $bill                = Bill::make();
        $bill->owner         = $data->owner;
        $bill->bill_type     = $data->billType;
        $bill->bill_category = $data->billCategory;
        $bill->contact_id    = $data->contactId ?? null;
        $bill->event_id      = $data->eventId ?? null;
        $bill->bill_time     = $data->billTime;
        $bill->amount        = $data->amount;
        $bill->subject       = $data->subject ?? null;
        $bill->remarks       = $data->remarks ?? null;
        $bill->payee_type    = $data->payeeType ?? null;
        $bill->payee_id      = $data->payeeId ?? null;
        $bill->pay_method    = $data->payMethod ?? null;
        $bill->sort          = $data->sort;


        return $bill;

    }
}
