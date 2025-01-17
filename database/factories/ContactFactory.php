<?php

namespace Database\Factories;

use DayeBill\BillCore\Domain\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        return [
            'owner_type'    => $this->faker->word(),
            'owner_id'      => $this->faker->word(),
            'name'          => $this->faker->name(),
            'relation_type' => $this->faker->word(),
            'phone_number'  => $this->faker->phoneNumber(),
            'remarks'       => $this->faker->word(),
            'created_at'    => Carbon::now(),
            'updated_at'    => Carbon::now(),
        ];
    }
}
