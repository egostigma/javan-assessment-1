<?php

namespace Database\Seeders;

use App\Models\FamilyMember;
use Illuminate\Database\Seeder;

class FamilyMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seeds = [
            ["parent_id" => null, "name" => "Budi", "gender" => "m"],
            ["parent_id" => 1, "name" => "Dedi", "gender" => "m"],
            ["parent_id" => 1, "name" => "Dodi", "gender" => "m"],
            ["parent_id" => 1, "name" => "Dede", "gender" => "m"],
            ["parent_id" => 1, "name" => "Dewi", "gender" => "f"],
            ["parent_id" => 2, "name" => "Feri", "gender" => "m"],
            ["parent_id" => 2, "name" => "Farah", "gender" => "f"],
            ["parent_id" => 3, "name" => "Gugus", "gender" => "m"],
            ["parent_id" => 3, "name" => "Gandi", "gender" => "m"],
            ["parent_id" => 4, "name" => "Hani", "gender" => "f"],
            ["parent_id" => 4, "name" => "Hana", "gender" => "f"],
        ];

        foreach ($seeds as $seed) {
            FamilyMember::create($seed);
        }
    }
}
