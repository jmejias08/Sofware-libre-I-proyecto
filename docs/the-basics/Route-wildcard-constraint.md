[< Volver a la pagina principal](/docs/readme.md)

# Route wildcard constraints

En en este episodio solamente editaremos el arhivo web.php en el cual se alojan las rutas. La idea de esta modificacion es el anadir una estriccion a las rutas, para que estas en su slug solo tenga caracteres validos

```php
Route::get('posts/{post}', function ($slug) {

    $path = __DIR__ . "/../resources/posts/{$slug}.html";

    if (! file_exists($path)){
       return redirect('/');
    }

    $post = file_get_contents($path);


    return view('post', [
        'post' => $post
    ]);

})->where('post', '[A-z_\-]+');
```