<?php

namespace Database\Factories;

use DayeBill\BillCore\Domain\Models\Bill;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class BillFactory extends Factory
{
    protected $model = Bill::class;

    public function definition()
    {
        return [
            'owner_type'      => $this->faker->word(),
            'owner_id'        => $this->faker->word(),
            'event_id'        => $this->faker->randomNumber(),
            'contacts_id'     => $this->faker->randomNumber(),
            'bill_type'       => $this->faker->word(),
            'amount_currency' => $this->faker->word(),
            'payee_type'      => $this->faker->word(),
            'payee_id'        => $this->faker->word(),
            'pay_method'      => $this->faker->word(),
            'amount_value'    => $this->faker->randomNumber(),
            'bill_time'       => Carbon::now(),
            'remarks'         => $this->faker->word(),
            'created_at'      => Carbon::now(),
            'updated_at'      => Carbon::now(),
        ];
    }
}
