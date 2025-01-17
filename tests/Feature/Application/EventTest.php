<?php


use DayeBill\BillCore\Application\Services\Event\EventCommandService;
use DayeBill\BillCore\Domain\Data\EventData;
use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use Illuminate\Support\Carbon;

test('create a event', function () {


    $command = new EventData();

    $command->owner     = owner();
    $command->type      = EventTypeEnum::OTHER;
    $command->subject   = fake()->word();
    $command->eventDate = Carbon::now();
    $event              = app(EventCommandService::class)->create($command);
    $this->assertEquals($command->type->value, $event->type->value);
    $this->assertEquals($command->subject, $event->subject);
    $this->assertEquals($command->eventDate->format('Y-m-d'), $event->event_date->format('Y-m-d'));

    return $event;
});

test('update a event', function (\DayeBill\BillCore\Domain\Models\Event $event) {
    $command            = new EventData();
    $command->id        = $event->id;
    $command->owner     = owner();
    $command->type      = EventTypeEnum::OTHER;
    $command->subject   = fake()->word();
    $command->eventDate = Carbon::now();
    $event              = app(EventCommandService::class)->update($command);
    $this->assertEquals($command->type->value, $event->type->value);
    $this->assertEquals($command->subject, $event->subject);
    $this->assertEquals($command->eventDate->format('Y-m-d'), $event->event_date->format('Y-m-d'));
    return $event;
})->depends('create a event');
