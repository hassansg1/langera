<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application"s database.
     *
     * @return void
     */
    public function run()
    {
//        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $user = \App\Models\User::updateOrCreate(
            [
                "email" => "admin@langera.com",
            ],
            [
                "first_name" => "Langera",
                "last_name" => "Admin",
                'usertype_id' => 1,
                "password" => Hash::make("123456789"),
            ]);


        $user = \App\Models\User::updateOrCreate(
            [
                "email" => "aida@langera.com",
            ],
            [
                "first_name" => "Aida",
                'usertype_id' => 2,
                "last_name" => "Kane",
                "password" => Hash::make("123456789"),
            ]);

        Role::create(['name' => 'Student','guard_name' => 'web']);
        $user->assignRole("Student");

    }
}
