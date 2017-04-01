<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* COMMAND : php artisan db:seed */

        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'username' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('ajesh'),
            'firstname' => 'firstname',
            'lastname' => 'lasttname',
            'usertype_id' => 1,
        ]);

        DB::table('address')->insert([
            'user_id' => 1,
            'company' => str_random(10),
            'addressline1' => str_random(30),
            'addressline2' => str_random(30),
            'city' => str_random(10),
            'postcode' => str_random(6),
            'country' => str_random(10),
            'telephone1' => str_random(11),
            'telephone2' => str_random(11),
            'is_default' => true,
        ]);

        DB::table('user_types')->insert([
            'type' => 'customer',
        ]);

         DB::table('user_types')->insert([
            'type' => 'contractor',
        ]);
    }
}
