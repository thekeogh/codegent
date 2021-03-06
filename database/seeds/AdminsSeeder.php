<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Old 
        $olds = DB::connection('legacy')->table('user')->orderBy('id')->get();
        // Wipe our DB
        DB::table('admins')->truncate();
        // Do it
        foreach ($olds as $old) {
            DB::table('admins')->insert([
                'id' => $old->id,
                'name' => "{$old->firstname} {$old->surname}",
                'email' => $old->email,
                'password' => bcrypt(env('SEEDER_KEOGH_PWD')),
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);
        }
    }
}
