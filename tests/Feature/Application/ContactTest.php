<?php


use DayeBill\BillCore\Application\Services\Contact\ContactApplicationService;
use DayeBill\BillCore\Domain\Data\ContactData;
use DayeBill\BillCore\Domain\Models\Contact;
use DayeBill\BillCore\Domain\Models\Enums\ContactRelationTypeEnum;

test('can create  a contact', function () {

    $command               = new ContactData();
    $command->owner        = owner();
    $command->relationType = fake()->randomElement(array_values(ContactRelationTypeEnum::labels()));
    $command->name         = fake()->name();
    $command->phoneNumber  = fake()->phoneNumber();
    $command->remarks      = fake()->text();
    $contact               = app(ContactApplicationService::class)->create($command);


    $this->assertEquals($command->relationType, $contact->relation_type);
    $this->assertEquals($command->name, $contact->name);
    $this->assertEquals($command->phoneNumber, $contact->phone_number);
    $this->assertEquals($command->remarks, $contact->remarks);

    return $contact;
});
test('can update  a contact', function (Contact $contact) {

    $command               = new ContactData();
    $command->id           = $contact->id;
    $command->owner        = owner();
    $command->relationType = fake()->randomElement(array_values(ContactRelationTypeEnum::labels()));
    $command->name         = fake()->name();
    $command->phoneNumber  = fake()->phoneNumber();
    $command->remarks      = fake()->text();
    $contact               = app(ContactApplicationService::class)->create($command);

    $this->assertEquals($command->relationType, $contact->relation_type);
    $this->assertEquals($command->name, $contact->name);
    $this->assertEquals($command->phoneNumber, $contact->phone_number);
    $this->assertEquals($command->remarks, $contact->remarks);

    return $contact;
})->depends('can create  a contact');
