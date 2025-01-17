<?php

namespace DayeBill\BillCore\Domain\Data;

use DayeBill\BillCore\Domain\Models\Enums\ContactRelationTypeEnum;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\Data;


class ContactData extends Data
{

    public UserInterface            $owner;
    public string                   $name;
    public ?string                  $phoneNumber;
    public ?string                  $remarks;
    public ?ContactRelationTypeEnum $relationType;


}
