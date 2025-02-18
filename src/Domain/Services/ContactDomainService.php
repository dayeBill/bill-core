<?php

namespace DayeBill\BillCore\Domain\Services;

use DayeBill\BillCore\Domain\Data\ContactData;
use DayeBill\BillCore\Domain\Exceptions\ContactException;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactReadRepositoryInterface;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;

class ContactDomainService
{

    public function __construct(
        protected ContactRepositoryInterface $repository,
        protected ContactReadRepositoryInterface $readRepository,
    ) {
    }

    /**
     * @param  ContactData  $data
     *
     * @return Contact
     * @throws ContactException
     */
    public function create(ContactData $data) : Contact
    {

        if ($this->readRepository->findByNameInOwner($data->owner, $data->name,$data->alias)) {
            throw new ContactException('联系人已存在,请修改姓名或者重名备注！');
        }
        // 查询联系人是否存在  如果存在 创建失败
        $contact                = Contact::make();
        $contact->owner         = $data->owner;
        $contact->name          = $data->name;
        $contact->alias          = $data->alias ?? null;
        $contact->relation_type = $data->relationType ?? null;
        $contact->phone_number  = $data->phoneNumber ?? null;
        $contact->remarks       = $data->remarks ?? null;

        $this->repository->store($contact);

        return $contact;
    }

}
