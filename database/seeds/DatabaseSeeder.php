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
        // $this->call(AdminsSeeder::class);
        // $this->call(TagsSeeder::class);
        // $this->call(CategoriesSeeder::class);
        $this->call(ArticlesSeeder::class);
        // $this->call(RedirectsSeeder::class);
    }
}
