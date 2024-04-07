<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;

class MovieController extends Controller
{
    public function index(){
        return view('movies.index');
    }

    public function create(){
        return view('movies.create');
    }

    public function store(){
        $moviesInserted = [];
        $moviesNotInserted = [];
        
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
                'accept' => 'application/json',
            ])->get('https://api.themoviedb.org/3/movie/popular?language=en-US&page=1');   
            
            if ($response->successful()) {
                $movies = $response->json()['results'];
                
                foreach($movies as $movie) {
                    $existingRecord = Movie::where('name', $movie['title'])->count();
                    
                    if ($existingRecord > 0) {
                        $moviesNotInserted[] = $movie['title'];
                    } else {
                        Movie::create(['name' => $movie['title']]);
                        $moviesInserted[] = $movie['title'];
                    }
                }
            } else {
                // Handle HTTP request error
                return response()->json(['error' => 'Failed to fetch movies'], 500);
            }
        } catch (Exception $e) {
            // Handle exceptions
            return response()->json(['error' => $e->getMessage()], 500);
        }
    
        return response()->json(['inserted' => $moviesInserted, 'notInserted' => $moviesNotInserted], 200);
    }

    public function cleanup(){
        try {
            Movie::truncate();
            return response()->json(['message' => 'Movies table emptied successfully'], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'Failed to empty movies table: ' . $e->getMessage()], 500);
        }
    }
}
