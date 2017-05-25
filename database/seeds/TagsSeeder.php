<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Old 
        $olds = DB::connection('legacy')->table('tag')->orderBy('id')->get();
        // Wipe our DB
        DB::table('tags')->truncate();
        // Do it
        foreach ($olds as $old) {
            DB::table('tags')->insert([
                'id' => $old->id,
                'title' => $old->title,
                'slug' => $old->slug,
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);
        }
    }
}
