<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DomainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::updateOrCreate(['name' => 'مبدعون وافراد'], [
            'name' => 'مبدعون وافراد',
            'status' => '0',
        ]);
    }
}
