<?php

use Illuminate\Testing\TestResponse;

test('can query bills', function () {

    /**
     * @var TestResponse $response
     */
    $response = $this->get('/api/bills');


    $response->assertStatus(200)->assertJson(['code' => 0]);

    $response->dump();

});
