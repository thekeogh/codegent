<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Old 
        $olds = DB::connection('legacy')->table('blog_entry')->orderBy('id')->get();
        $cats = DB::connection('legacy')->table('blog_category_map')->get();
        $tags = DB::connection('legacy')->table('tag_map')->where('related_content_type', 'blog_entry')->get();
        // Wipe our DB
        DB::table('blog_articles')->truncate();
        DB::table('blog_category_article')->truncate();
        DB::table('tag_blog_article')->truncate();
        // Do it
        foreach ($olds as $old) {
            $media = $old->media_id ? DB::connection('legacy')->table('media')->where('id', $old->media_id)->first() : null;
            $video_url = null;
            if ($media and in_array($media->media_type, ['flv', 'html5video', 'uploaded_video'])) {
                $video_url = $media->remote_id;
            }
            DB::table('blog_articles')->insert([
                'id' => $old->id,
                'admin_id' => $old->created_by,
                'status' => $old->status,
                'title' => $old->title,
                'slug' => $old->slug,
                'summary' => $old->summary,
                'body' => $old->content,
                'image_url' => $media ? "https://codegent-codegentltd.netdna-ssl.com/media/thumb/{$media->uuid}/269x293_{$media->focus_x}_{$media->focus_y}.jpg" : null,
                'video_url' => $video_url,
                'published_at' => $old->published_date,
                'created_at' => $old->created_at,
                'updated_at' => $old->updated_at,
            ]);
        }
        // Cats
        foreach ($cats as $cat) {
            DB::table('blog_category_article')->insert([
                'category_id' => $cat->blog_category_id,
                'article_id' => $cat->blog_entry_id,
            ]);
        }
        // Tags
        foreach ($tags as $tag) {
            DB::table('tag_blog_article')->insert([
                'tag_id' => $tag->tag_id,
                'article_id' => $tag->related_content_id,
            ]);
        }
        
        
    }
}