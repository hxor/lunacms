<?php

use Illuminate\Database\Seeder;

use App\Models\Post;
use App\Models\Category;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Sample Category
        $os = Category::create(['title' => 'Operating System', 'slug' => 'operating-system']);
        $os->childs()->saveMany([
            new Category(['title' => 'Linux', 'slug' => 'linux']),
            new Category(['title' => 'macOS', 'slug' => 'macos']),
            new Category(['title' => 'Windows', 'slug' => 'windows'])
        ]);

        $smartphone = Category::create(['title' => 'Smart Phone', 'slug' => 'smart-phone']);
        $smartphone->childs()->saveMany([
            new Category(['title' => 'Android', 'slug' => 'android']),
            new Category(['title' => 'IoS', 'slug' => 'ios']),
            new Category(['title' => 'Windows Phone', 'slug' => 'windows-phone']),
        ]);


        // Sample posts
        $linux = Category::where('title', 'Linux')->first();
        $android = Category::where('title', 'Android')->first();

        $post1 = Post::create([
          'user_id' => 1,
          'slug' => 'all-about-linux',
          'title' => 'All About Linux',
          'body' => '
                        <h1>HTML Ipsum Presents</h1>
                        <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

                        <h2>Header Level 2</h2>

                        <ol>
                           <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                           <li>Aliquam tincidunt mauris eu risus.</li>
                        </ol>

                        <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>

                        <h3>Header Level 3</h3>

                        <ul>
                           <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                           <li>Aliquam tincidunt mauris eu risus.</li>
                        </ul>

                        <pre><code>
                        #header h1 a {
                          display: block;
                          width: 300px;
                          height: 80px;
                        }
                        </code></pre>',
          'image' => '/images/posts/001.jpg',
          'published' => 1,
        ]);

        $post2 = Post::create([
          'user_id' => 1,
          'slug' => 'all-about-android',
          'title' => 'All About Android',
          'body' => '
                        <h1>HTML Ipsum Presents</h1>
                        <p><strong>Pellentesque habitant morbi tristique</strong> senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. <em>Aenean ultricies mi vitae est.</em> Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, <code>commodo vitae</code>, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. <a href="#">Donec non enim</a> in turpis pulvinar facilisis. Ut felis.</p>

                        <h2>Header Level 2</h2>

                        <ol>
                           <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                           <li>Aliquam tincidunt mauris eu risus.</li>
                        </ol>

                        <blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.</p></blockquote>

                        <h3>Header Level 3</h3>

                        <ul>
                           <li>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</li>
                           <li>Aliquam tincidunt mauris eu risus.</li>
                        </ul>

                        <pre><code>
                        #header h1 a {
                          display: block;
                          width: 300px;
                          height: 80px;
                        }
                        </code></pre>',
          'image' => '/images/posts/001.jpg',
          'published' => 1,
        ]);

        $linux->posts()->saveMany([$post1]);
        $android->posts()->saveMany([$post2]);
    }
}
