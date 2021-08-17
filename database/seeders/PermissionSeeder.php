<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (['grafic_bar', 'user_read', 'grafic_other'] as $name) {
            Permission::create([
                'name' => $name,
                'guard_name' => 'api'
            ])->roles()->attach(1);
        }
    }
}
