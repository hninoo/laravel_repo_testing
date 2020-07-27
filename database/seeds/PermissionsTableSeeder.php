<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('permissions')->insert(array(
            0 =>
            array (
                    'id' => 1,
                    'name' => 'create_role',
                    'guard_name' => 'web',

            ),
            1 =>
            array (
                    'id' => 2,
                    'name' => 'edit_role',
                    'guard_name' => 'web',

            ),
            2 =>
            array (
                    'id' => 3,
                    'name' => 'delete_role',
                    'guard_name' => 'web',

            ),
            3 =>
            array (
                    'id' => 4,
                    'name' => 'role_list',
                    'guard_name' => 'web',

            ),
            4=>
            array(
                'id' => 5,
                'name' => 'create_permission',
                'guard_name' => 'web',
            ),
            5=>
            array(
                'id' => 6,
                'name' => 'edit_permission',
                'guard_name' => 'web',
            ),
            6=>
            array(
                'id' => 7,
                'name' => 'delete_permission',
                'guard_name' => 'web',
            ),
            7=>
            array(
                'id' => 8,
                'name' => 'permission_list',
                'guard_name' => 'web',
            ),
            8=>
            array(
                'id' => 9,
                'name' => 'create_user',
                'guard_name' => 'web',
            ),
            9=>
            array(
                'id' => 10,
                'name' => 'edit_user',
                'guard_name' => 'web',
            ),
            10=>
            array(
                'id' => 11,
                'name' => 'delete_user',
                'guard_name' => 'web',
            ),
            11=>
            array(
                'id' => 12,
                'name' => 'user_list',
                'guard_name' => 'web',
            ),
            12=>
            array(
                'id' => 13,
                'name' => 'create_task',
                'guard_name' => 'web',
            ),
            13=>
            array(
                'id' => 14,
                'name' => 'edit_task',
                'guard_name' => 'web',
            ),
            15=>
            array(
                'id' => 16,
                'name' => 'delete_task',
                'guard_name' => 'web',
            ),
            16=>
            array(
                'id' => 17,
                'name' => 'task_list',
                'guard_name' => 'web',
            ),
        )
    );
        // $permission = Permission::create(
        //     ['name' => 'create_role','guard_name'=>'web']
        // );
    }
}
