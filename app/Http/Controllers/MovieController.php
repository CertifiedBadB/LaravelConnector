<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index(){
        return view('movies.index');
    }

    public function create(){
        return view('movies.create');
    }

    public function store(){
        $response = Http::withHeaders([
            'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI0MjZiOTBkZmVhNDE3NTI4MjU4NWZlOTU0OWJiNTI2MCIsInN1YiI6IjY2MGE5ODM4YTg4NTg3MDE3Y2U1YzE4ZSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.gEZ4Xx9leF43ydRzOLD2izmhi-DyxaOyChU3i3oceR8',
            'accept' => 'application/json',
        ])
        ->get('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1')
        ->json();
        
        foreach ($response[0] as $response_result) {
            return $response;
        }
}
}
