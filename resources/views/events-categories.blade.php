<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
</head>
<body>

    <h1>Lista de Categorias</h1>

    <ol>
        @foreach($categories as $category)
            <li>
                {{ $category->name }}
            </li>
        @endforeach
    </ol>  
    
</body>
</html>