<?php

namespace DayeBill\BillCore\Domain\Data;

use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use Illuminate\Support\Carbon;
use RedJasmine\Support\Contracts\UserInterface;
use RedJasmine\Support\Domain\Models\ValueObjects\Money;
use Spatie\LaravelData\Attributes\Validation\Max;
use Spatie\LaravelData\Data;

class BillData extends Data
{
    public UserInterface $owner;

    public BillTypeEnum $billType;
    public Carbon       $billTime;
    public Money        $amount;

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
