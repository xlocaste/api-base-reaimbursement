<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'view reimbursement']);
        Permission::create(['name' => 'create reimbursement']);
        Permission::create(['name' => 'edit reimbursement']);
        Permission::create(['name' => 'delete reimbursement']);

        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo('view reimbursement');
        $admin->givePermissionTo('create reimbursement');
        $admin->givePermissionTo('edit reimbursement');
        $admin->givePermissionTo('delete reimbursement');

        $user = Role::create(['name' => 'user']);
        $user->givePermissionTo('view reimbursement');
        $user->givePermissionTo('create reimbursement');

        User::where('name', 'admin')->update(['role' => 'admin']);
        User::where('name', 'user')->update(['role' => 'user']);
    }
}
