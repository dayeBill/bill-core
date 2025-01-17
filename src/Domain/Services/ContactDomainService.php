<?php

namespace DayeBill\BillCore\Domain\Services;

use DayeBill\BillCore\Domain\Data\ContactData;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Repositories\ContactRepositoryInterface;

class ContactDomainService
{

    public function __construct(

        protected ContactRepositoryInterface $repository
    ) {
    }

    public function create(ContactData $data) : Contact
    {
        $contact                = Contact::make();
        $contact->owner         = $data->owner;
        $contact->name          = $data->name;
        $contact->relation_type = $data->relationType ?? null;
        $contact->phone_number  = $data->phoneNumber ?? null;
        $contact->remarks       = $data->remarks ?? null;

        $this->repository->store($contact);

        return $contact;
    }

}
