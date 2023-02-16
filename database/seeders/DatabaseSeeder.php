<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table( 'users' ) -> insert(
        [
            'resource_id' => generateAlphaNumericResource(15),
            'name' => 'Michael',
            'email' => 'michael@example.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password

            "created_at"                => date("Y-m-d H:i:s"),
            "updated_at"                => date("Y-m-d H:i:s"),
        ]);
        DB::table( 'projects' ) -> insert(
        [
            'resource_id' => generateAlphaNumericResource(15),

            'name' => 'Task Hub',
            'description' => 'Some description goes here...',

            "created_at"                => date("Y-m-d H:i:s"),
            "updated_at"                => date("Y-m-d H:i:s"),
        ]);
    }
}
