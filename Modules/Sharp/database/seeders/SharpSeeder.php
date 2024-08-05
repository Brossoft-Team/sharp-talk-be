<?php

namespace Modules\Sharp\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Sharp\app\Models\Sharp;

class SharpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sharp::factory()->count(10);
    }
}
