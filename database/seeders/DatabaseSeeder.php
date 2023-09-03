<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Helper\Helper;
use App\Models\ContentSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::updateOrCreate(
            [
                'email' => 'admin@gmail.com',
            ],
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin123!')
            ]
        );
        \App\Models\User::updateOrCreate([
            'email' => 'superadmin@gmail.com',
        ], [
            'name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('superadmin123!')
        ]);

        // ContentSetting seeder
        $sections = \App\Models\ContentSetting::FRONTSITE_SECTION;
        foreach ($sections as $key => $section) {
            \App\Models\ContentSetting::create([
                'name' => $section,
                'type' => ContentSetting::TYPE['FRONTSITE'],
                'status' => Helper::STATUS['ACTIVE'],
            ]);
        }
    }
}
