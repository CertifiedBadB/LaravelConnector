<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Movies</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Fetch Movies from API and Insert Into Database</h1>
        <form  method="POST" action="{{route('movie.store')}}">
            @csrf
            @method('post')
            <input class="insert" type="submit" value="Fetch and Insert">
        </form>
        <form method="POST" action="{{ route('movie.cleanup') }}">
            @csrf
            @method('delete')
            <input type="submit" class="delete" value="Delete Records">
        </form>
        <p style="font-size: 12px; margin-top: 20px;">/* Disclaimer: This call inserts populair movies from the movie database into your database to discover. */</p>
    </div>
</body>
</html>