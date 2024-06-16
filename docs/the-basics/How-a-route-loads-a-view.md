[< Volver a la pagina principal](/docs/readme.md)

# How a Route Loads a View

Las rutas en laravel se configuran en `routes/web.php`.

La siguiente seria la ruta raiz:

```bash
Route::get('/', function () {
    return view('welcome');
});
```

Laravel puede retornar cualquier tipo de contenido. <br/>
Como funciones:

```bash
Route::get('/', function () {
    return 'Hello World';
});
```

O archivos de texto como JSON:

```bash
Route::get('/', function () {
    return ['foo' => 'bar'];
});
```