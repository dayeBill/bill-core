<?php


use DayeBill\BillCore\Application\Services\Bill\BillCommandService;
use DayeBill\BillCore\Application\Services\Bill\Commands\BillCreateCommand;
use DayeBill\BillCore\Application\Services\Bill\Commands\QuickContactData;
use DayeBill\BillCore\Domain\Models\Enums\BillTypeEnum;
use DayeBill\BillCore\Domain\Models\Enums\ContactRelationTypeEnum;
use Illuminate\Support\Carbon;
use RedJasmine\Support\Domain\Models\ValueObjects\Money;

beforeEach(function () {

    // 创建联系人
    // 创建事件

    $this->commandService = app(BillCommandService::class);

});

test('can create a bill', function () {
    $command           = new BillCreateCommand();
    $command->owner    = owner();
    $command->billType = BillTypeEnum::INCOME;
    $command->billTime = Carbon::now();
    $command->amount   = Money::from(['value' => 1000]);
    $command->subject  = fake()->word();
    $command->remarks  = fake()->text(100);
    $command->contact  = QuickContactData::from(
        [
            'name'         => fake()->name(),
            'relationType' => fake()->randomElement(array_values(ContactRelationTypeEnum::labels())),
        ]
    );


    $bill = $this->commandService->create($command);



});
