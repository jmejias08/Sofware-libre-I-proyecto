[< Volver a la pagina principal](/docs/readme.md)

# Use Caching for Expensive Operations


Para este tutorial nuevamente solo modifacmos el archivo web.php, este tiene el fin de poder almacenar en cache el html de cada post. Esto debido a que llamar siempre el `file_get_contants()` genera problemas de rendimiento, ya se puede saturar si muchos usuarios quieren acceder a este al mismo tiempo. <br/>

Se modifica el archivo de la siguiente forma:

```php
Route::get('posts/{post}', function ($slug) {

    if (! file_exists($path = __DIR__ . "/../resources/posts/{$slug}.html")) {
       return redirect('/');
    }

    $post = cache()->remember("post.{$slug}", 1200, fn() => file_get_contents($path));

    return view('post', ['post' => $post]);

})->where('post', '[A-z_\-]+');
```