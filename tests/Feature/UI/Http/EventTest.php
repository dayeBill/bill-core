<?php

use DayeBill\BillCore\Domain\Models\Enums\EventTypeEnum;
use Illuminate\Testing\TestResponse;


test('can create a event', function () {

    /**
     * @var TestResponse $response
     */
    $response = $this->postJson('/api/events', [
        'type'       => fake()->randomElement(EventTypeEnum::values()),
        'subject'    => fake()->word(),
        'event_date' => fake()->date()
    ]);
    $response->dump();
    $response->assertStatus(201)->assertJson(['code' => 0]);
    $id = $response->json('data.0.id');

    return $id;
});

test('can query events', function () {

    /**
     * @var TestResponse $response
     */
    $response = $this->get('/api/events');

    $response->dump();
    $response->assertStatus(200)->assertJson(['code' => 0]);

    $id = $response->json('data.0.id');

    return $id;
});


test('can detail a event', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->get('/api/events/'.$id);

    $response->dump();
    $response->assertStatus(200)->assertJson(['code' => 0]);

    $id = $response->json('data.id');

    return $id;
})->depends('can query events');


test('can update a event', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->putJson('/api/events/'.$id, [
        'type'       => fake()->randomElement(EventTypeEnum::values()),
        'subject'    => fake()->word(),
        'event_date' => fake()->date()
    ]);
    $response->dump();
    $response->assertStatus(200)->assertJson(['code' => 0]);
    $id = $response->json('data.0.id');

    return $id;
})->depends('can query events');


test('can delete a event', function ($id) {
    /**
     * @var TestResponse $response
     */
    $response = $this->delete('/api/events/'.$id);
    $response->dump();
    $response->assertStatus(200)->assertJson(['code' => 0]);

})->depends('can query events');
