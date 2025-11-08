<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = ['Engineering','HR','Sales','Marketing','Finance'];

        foreach ($departments as $name) {
            DB::table('departments')->insertOrIgnore([
            'name' => $name,
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
