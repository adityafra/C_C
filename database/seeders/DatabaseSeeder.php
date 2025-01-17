<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $json = File::get('database/data/users.json');
        $data = json_decode($json);
        foreach ($data->data as $obj) {
            if (User::where('nim', $obj->nim)->exists()) {
                continue;
            }
            User::create([
                'name' => $obj->name,
                'nim' => $obj->nim,
                'department' => $obj->department,
                'position' => $obj->position,
                'password' => $obj->password,
            ]);
        }
    }
}
