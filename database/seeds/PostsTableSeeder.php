<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Post::create([
            'user_id' => 1,
            'title' => 'Hello World!',
            'slug' => 'hello-world',
            'content' => '<p>Welcome to WordPress. This is your first post. Edit or delete it, then start writing!</p>',
            'publish_at' => date('Y-m-d H:i:s')
        ]);
        App\Post::create([
            'user_id' => 1,
            'title' => 'Sample Page',
            'slug' => 'sample-page',
            'content' => '<p>This is an example page. It’s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:</p><blockquote><p>Hi there! I’m a bike messenger by day, aspiring actor by night, and this is my website. I live in Los Angeles, have a great dog named Jack, and I like piña coladas. (And gettin’ caught in the rain.)</p></blockquote><p>…or something like this:</p><blockquote><p>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickeys to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</p></blockquote><p>As a new WordPress user, you should go to <a href="http://localhost/wordpress/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!</p>',
            'type'=>'page',
            'publish_at' => date('Y-m-d H:i:s')
        ]);
        // ['user_id', 'title', 'slug', 'content', 'excerpt', 'status', 'parent', 'type', 'publish_at']
    }
}
