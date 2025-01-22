<?php

use DayeBill\BillCore\Domain\Models\Enums\ContactRelationTypeEnum;
use Illuminate\Testing\TestResponse;


test('can create a contact', function () {

    /**
     * @var TestResponse $response
     */
    $response = $this->postJson('/api/contacts', [
        'name'          => fake()->name(),
        'relation_type' => fake()->randomElement(array_values(ContactRelationTypeEnum::labels())),
        'phone_number'  => fake()->phoneNumber(),
        'remarks'       => fake()->text()
    ]);

    $response->assertStatus(201)->assertJson(['code' => 0]);
    $id = $response->json('data.0.id');

    return $id;
});

test('can query contacts', function () {

    /**
     * @var TestResponse $response
     */
    $response = $this->get('/api/contacts');


    $response->assertStatus(200)->assertJson(['code' => 0]);

    $id = $response->json('data.0.id');

    return $id;
});


test('can detail a contact', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->get('/api/contacts/'.$id);


    $response->assertStatus(200)->assertJson(['code' => 0]);

    $id = $response->json('data.id');

    return $id;
})->depends('can query contacts');


test('can update a contact', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->putJson('/api/contacts/'.$id, [
        'name'          => fake()->name(),
        'relation_type' => fake()->randomElement(array_values(ContactRelationTypeEnum::labels())),
        'phone_number'  => fake()->phoneNumber(),
        'remarks'       => fake()->text()
    ]);

    $response->assertStatus(200)->assertJson(['code' => 0]);
    $id = $response->json('data.0.id');

    return $id;
})->depends('can query contacts');


test('can delete a contact', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->delete('/api/contacts/'.$id);

    $response->assertStatus(200)->assertJson(['code' => 0]);

})->depends('can query contacts');
