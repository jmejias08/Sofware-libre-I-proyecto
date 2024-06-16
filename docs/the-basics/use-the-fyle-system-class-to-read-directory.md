[< Volver a la pagina principal](/docs/readme.md)

# Use the Filesystem Class to Read a Directory



En este video se modifican las rutas para poder buscar y leer los posts de la carpeta `resourses/posts`. Para poder mostrarlas en la pagina principal del blog <br/>


Se eliminan las rutas de los archivos html

```html
<h1>My Third Post</h1>

<p>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sapiente nesciunt iure, dolore delectus, laudantium qui nihil aperiam cum incidunt odio, asperiores quisquam hic! Maxime voluptatibus quibusdam sit provident optio.
</p>
```

Se modifica el archivo web.php de la siguiente forma:

```php
Route::get('/', function () {

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
```


En la ruta `/app/Model` creamos un archivo llamado Post.php y ponemos lo siguiente: 

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use PhpParser\Node\Expr\FuncCall;

class Post
{
    public static function all()
    {
        $files = File::files(resource_path("posts/"));

        return array_map(fn($file) => $file->getContents(), $files);
    }

    public static function find($slug)
    {
        base_path();
        if (!file_exists($path = resource_path("posts/{$slug}.html"))) {
            throw new ModelNotFoundException();
        }

        return cache()->remember("post.{$slug}", 1200, fn () => file_get_contents($path));
    }
}

```

se modifica el archivo `posts.blade.php` de la siguiente forma:

```html
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <title>My Blog</title>
</head>

<body>
    <?php foreach ($posts as $post) : ?>
        <article>
            <?= $post; ?>
        </article>
    <?php endforeach; ?>
</body>

</html>
```

