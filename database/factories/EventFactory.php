<?php

namespace Database\Factories;

use DayeBill\BillCore\Domain\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'owner_type' => $this->faker->word(),
            'owner_id'   => $this->faker->word(),
            'subject'    => $this->faker->word(),
            'event_date' => Carbon::now(),
            'amount'     => $this->faker->randomNumber(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
