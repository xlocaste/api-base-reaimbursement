<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::where('name', 'admin')->update(['role' => 'admin']);
        User::where('name', 'user')->update(['role' => 'user']);
    }
}
