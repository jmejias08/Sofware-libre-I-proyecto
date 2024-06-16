[< Volver a la pagina principal](/docs/readme.md)

# Make a Route and link to it

Vamos a hacer una pagina de posts, se inicia cambiardo el nombre de la vista welcome por posts

Y en la parte de `/routes/web.php` cambiamos los siguiente:

```php
Route::get('/', function () {
    return view('post');
});
```


Se elimina el archivo `app.js` que esta en `public`y nos dirigimos al archivo `post.blade.php` y lo modificamos:

```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel= "stylesheet" href="/app.css">
    <title>My Blog</title>
</head>
<body>
    <article>
        <h1><a href="/post">Mi primer post</a></h1>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sapiente nesciunt iure, dolore delectus, laudantium qui nihil aperiam cum incidunt odio, asperiores quisquam hic! Maxime voluptatibus quibusdam sit provident optio.
        </p>
    </article>

    <article>
        <h1><a href="/post">Segundo post</a></h1>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sapiente nesciunt iure, dolore delectus, laudantium qui nihil aperiam cum incidunt odio, asperiores quisquam hic! Maxime voluptatibus quibusdam sit provident optio.
        </p>
    </article>

    <article>
        <h1><a href="/post">Tercer post</a></h1>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sapiente nesciunt iure, dolore delectus, laudantium qui nihil aperiam cum incidunt odio, asperiores quisquam hic! Maxime voluptatibus quibusdam sit provident optio.
        </p>
    </article>
</body>
</html>
```
En este html anadimos varios posts con contenido y que al clickar redirigen a la ruta /post</br>


Modificamos el archivo `app.css`:

```css
body {
    background: white;
    color: #222222;
    max-width: 600px;
    margin: auto;
    font-family: sans-serif;
}

p{
    line-height: 1.6;
}

article + article{
    margin-top: 3rem;
    padding: 3rem;
    border-top: 1px solid #c5c5c5; 
}
```


En la carpeta `/resources/views` creamos un archivos post.blade.php y le añadimos el siguiente codigo, el cual es igual al de posts pero le dejamos solo el contenido de un post y le ponemos un link a la pagina anterior 
```html
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel= "stylesheet" href="/app.css">
        <title>My Blog</title>
    </head>
    <body>
        <article>
            <h1><a href="/post">Mi primer post</a></h1>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Sequi sapiente nesciunt iure, dolore delectus, laudantium qui nihil aperiam cum incidunt odio, asperiores quisquam hic! Maxime voluptatibus quibusdam sit provident optio.
            </p>
        </article>

        <a href="/">Volver </a>

    </body>
    </html>
```

Así se deberia de ver la ruta posts:

![](images/pagina_Posts.png)

y así la ruta post:

![](images/pagina_Post.png)