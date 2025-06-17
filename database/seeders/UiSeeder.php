<?php

namespace Database\Seeders;

use App\Models\Ui;
use Illuminate\Database\Seeder;

class UiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ui::factory()->count(5)->create();
    }
}
