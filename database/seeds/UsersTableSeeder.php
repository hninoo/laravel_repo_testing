<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::whereName('admin')->first();
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'role_id' => $adminRole->id,
            'password' => Hash::make('123456'),
            'created_at' => date('Y-m-d H:m:s'),
            'updated_at' => date('Y-m-d H:m:s'),
        ]);

        $role = Role::find(1);
        $permissions = Permission::all();

        $user->assignRole($role->name);
        $role->givePermissionTo($permissions);
    }
}
