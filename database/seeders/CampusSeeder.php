<?php

namespace Database\Seeders;

use App\Models\Campus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $campuses = [
            'Sorsogon State University - Bulan Campus',
            'Sorsogon State University - Sorsogon Campus',
            'Sorsogon State University - Magallanes Campus',
            'Sorsogon State University - Castilla Campus',
            'Sorsogon State University - Graduate Studies Campus'
        ];

        foreach ($campuses as $campusName) {
            Campus::firstOrCreate(['name' => $campusName]);
        }
    }
}
