<?php

namespace DayeBill\BillCore\Domain\Data;


use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use Illuminate\Support\Carbon;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\Data;

class EventData extends Data
{
    public UserInterface $owner;

    public string $subject;

    public ?Carbon $eventDate;

    public EventTypeEnum $type = EventTypeEnum::OTHER;

}
