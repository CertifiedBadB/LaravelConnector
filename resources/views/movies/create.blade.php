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
            <input type="submit" value="Fetch and Insert">
        </form>
        <p style="font-size: 12px; margin-top: 20px;">/* Disclaimer: This call inserts 10 movies from the movie database into your database to discover. */</p>
    </div>
</body>
</html>