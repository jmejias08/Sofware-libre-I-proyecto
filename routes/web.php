<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {


    // $posts = collect(File::files(resource_path("posts")))

    //     ->map(fn ($file) => YamlFrontMatter::parseFile($file))
    //     ->map(fn ($document) => new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug
    //     ));




    // foreach ($files as $file) {
    //     $document = YamlFrontMatter::parseFile($file);
    //     $posts[] = new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body(),
    //         $document->slug,
    //     );
    // }

    return view('posts', [
        'posts' => Post::all()
    ]);
});


Route::get('posts/{post}', function ($slug) {

    
    $post = Post::find($slug);

    return view('post', [
        'post' => $post
    ]);

    // if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
    // return redirect('/');
    // }

    // $post = cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));

    // return view('post', ['post' => $post]);

})->where('post', '[A-z_\-]+');