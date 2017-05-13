<?php

use Illuminate\Database\Seeder;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Codegent',
            'email' => 'admin@codegent.com',
            'password' => bcrypt(env('SEEDER_CODEGENT_PWD')),
        ]);
        DB::table('admins')->insert([
            'name' => 'Steve McKeogh',
            'email' => 'steve@screen.cloud',
            'password' => bcrypt(env('SEEDER_KEOGH_PWD')),
        ]);
    }
}
