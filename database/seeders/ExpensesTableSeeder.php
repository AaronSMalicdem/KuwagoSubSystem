<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ExpensesTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        
        $expenseTypes = ['Supply', 'Advertisement', 'Spills','Others'];
        $itemNames = ['Beverage', 'Banner', 'Posters', 'Electricity', 'Water', 'Repairs'];

        for ($i = 0; $i < 500; $i++) {
            DB::table('expenses')->insert([
                'expense_type' => $faker->randomElement($expenseTypes),
                'item_name' => $faker->randomElement($itemNames),
                'total_expenses' => $faker->randomFloat(2, 50, 5000),
                'date' => $faker->dateTimeBetween('-2 years', 'now'),
                'archived' => $faker->boolean(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
