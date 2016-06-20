<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->command->info('User seed successful');

        $this->call('RolesTableSeeder');
        $this->command->info('Role seed successful');

        $this->call('PicturesTableSeeder');
        $this->command->info('Picture seed successful');
    }
}

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Administrator',
            'email' => str_random(10).'@mail.com',
            'password' => bcrypt('qwerty'),
        ]);
    }
}

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('roles')->delete();

        DB::table('roles')->insert(
            [
                ['name' => 'owner', 'display_name' => 'Project Owner', 'description' => 'User is the owner of a given project'],
                ['name' => 'admin', 'display_name' => 'User Administrator', 'description' => 'User is allowed to manage and edit pictures'],
            ]
        );

        DB::table('role_user')->delete();

        DB::table('role_user')->insert(
            [
                ['user_id' => '1', 'role_id' => '1'],
                ['user_id' => '1', 'role_id' => '2']
            ]
        );
    }
}

class PicturesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('pictures')->delete();

        DB::table('pictures')->insert(
            [
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
                ['min' => str_random(40), 'origin' => str_random(40), 'created_at' => date("Y-m-d H:i:s"), 'updated_at' => date("Y-m-d H:i:s")],
            ]
        );
    }
}