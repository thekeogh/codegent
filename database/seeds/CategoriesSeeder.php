<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Old 
        $olds = DB::connection('legacy')->table('blog_category')->orderBy('id')->get();
        // Wipe our DB
        DB::table('blog_categories')->truncate();
        // Do it
        foreach ($olds as $old) {
            DB::table('blog_categories')->insert([
                'id' => $old->id,
                'title' => $old->title,
                'slug' => $old->slug,
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);
        }
    }
}
