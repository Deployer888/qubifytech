<?php

namespace Modules\DynamicPage\Database\Seeders;

use Illuminate\Database\Seeder;

class DynamicPageDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            DynamicPageSeeder::class,
        ]);
    }
}
