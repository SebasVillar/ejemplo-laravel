<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Skill')->delete();

        $skills = [
            ['name' => 'programacion'],
            ['name' => 'office'],
            ['name' => 'java'],
            ['name' => 'ingles'],
        ];

        DB::table('Skill')->insert($skills);
    }
}
