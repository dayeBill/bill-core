<?php

namespace DayeBill\BillCore\Domain\Data;


use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use Illuminate\Support\Carbon;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\Data;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;

class EventData extends Data
{
    public UserInterface $owner;

    public string $subject;

    #[WithCast(DateTimeInterfaceCast::class,'Y-m-d')]
    public ?Carbon $eventDate;

    public EventTypeEnum $type = EventTypeEnum::OTHER;

}
