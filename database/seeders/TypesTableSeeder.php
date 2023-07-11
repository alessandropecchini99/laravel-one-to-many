<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'politica',
                'description' => 'Lorem description',
            ],
            [
                'name' => 'attualità',
                'description' => 'Lorem description',
            ],
            [
                'name' => 'informatica',
                'description' => 'Lorem description',
            ],
            [
                'name' => 'letteratura',
                'description' => 'Lorem description',
            ],
            [
                'name' => 'cucina',
                'description' => 'Lorem description',
            ],
            [
                'name' => 'videogiochi',
                'description' => 'Lorem description',
            ],
        ];

        foreach ($types as $type) {
            Type::create($type);
        }
    }
}
