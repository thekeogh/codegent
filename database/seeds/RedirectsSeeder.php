<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedirectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Old 
        $olds = DB::connection('legacy')->table('redirect')->orderBy('id')->get();
        // Wipe our DB
        DB::table('redirects')->truncate();
        // Do it
        foreach ($olds as $old) {
            DB::table('redirects')->insert([
                'id' => $old->id,
                'status' => 'active',
                'from' => $old->short,
                'to' => $old->url,
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);
        }
    }
}
