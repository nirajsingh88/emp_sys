<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deptIds = DB::table('departments')->pluck('id')->toArray();


        foreach (range(1,10) as $i) {
            DB::table('employees')->insert([
            'name' => 'Employee '.$i,
            'email' => 'employee'.$i.'@example.com',
            'department_id' => $deptIds[array_rand($deptIds)],
            'salary' => rand(30000,120000),
            'created_at' => now(),
            'updated_at' => now(),
            ]);
        }
    }
}
