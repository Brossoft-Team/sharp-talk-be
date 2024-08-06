<?php

namespace Modules\Sharp\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sharp\app\Models\Judgment;

class JudgmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Judgment::factory(5)->create();
    }
}
