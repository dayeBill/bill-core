<?php

namespace DayeBill\BillCore\Domain\Data;

use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use Illuminate\Support\Carbon;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Data\Data;
use RedJasmine\Support\Domain\Models\ValueObjects\Money;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\DateTimeInterfaceCast;
use Spatie\LaravelData\Casts\EnumCast;

class BillData extends Data
{
    public UserInterface $owner;

    #[WithCast(EnumCast::class, BillTypeEnum::class)]
    public BillTypeEnum $billType;

    #[WithCast(DateTimeInterfaceCast::class, 'Y-m-d H:i:s')]
    public Carbon $billTime;

    public Money  $amount;

    public ?int $eventId;
    public ?int $contactId;

    #[Max(20)]
    public ?string $subject;
    #[Max(100)]
    public ?string $remarks;
    #[Max(32)]
    public ?string $payeeType;
    #[Max(32)]
    public ?string $payeeId;
    #[Max(32)]
    public ?string $payMethod;


}
