<?php

namespace DayeBill\BillCore\Domain\Data;

use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\Data;


class ContactData extends Data
{

    public UserInterface $owner;
    public string        $name;
    public ?string       $relationType;
    public ?string       $phoneNumber;
    public ?string       $remarks;



}
