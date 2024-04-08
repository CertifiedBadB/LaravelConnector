<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Series;
use App\Models\Season;
use App\Models\Episode;

class SeriesController extends Controller
{
    public function index(){
        return view('series.index');
    }

    public function create(){
        return view('series.create');
    }

    public function store(){
        $seriesInserted = [];
        $seriesNotInserted = [];

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
                'accept' => 'application/json',
            ])->get('https://api.themoviedb.org/3/tv/top_rated');

            if ($response->successful()) {
                $series = $response->json()['results'];

                foreach($series as $serie) {
                    $existingRecord = Series::where('name', $serie['name'])->count();

                    if ($existingRecord > 0) {
                        $seriesNotInserted[] = $serie['id'];
                    } else {
                        Series::create([
                            'id' => $serie['id'],
                            'name' => $serie['name']]);
                        $seriesInserted[] = $serie['id'];
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
        $this->storeSeasonsAndEpisodes($seriesInserted);
        //return response()->json(['inserted' => $seriesInserted, 'notInserted' => $seriesNotInserted], 200);
    }



    function storeSeasonsAndEpisodes($seriesInserted) {
        if (empty($seriesInserted)) {
            echo 'No series inserted.';
            return; // Return early if no series are inserted
        }
    
        foreach ($seriesInserted as $seriesId) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
                'accept' => 'application/json',
            ])->get('https://api.themoviedb.org/3/tv/' . $seriesId);
    
            $responseData = $response->json();
            $number_of_seasons = $responseData['number_of_seasons'];
    
            for ($season_number = $number_of_seasons; $season_number > 0; $season_number--) {
                $seasonResponse = Http::withHeaders([
                    'Authorization' => 'Bearer ' . env('TMDB_API_TOKEN'),
                    'accept' => 'application/json',
                ])->get('https://api.themoviedb.org/3/tv/' . $seriesId . '/season/' . $season_number);
    
                $seasonData = $seasonResponse->json();
                $season_name = $seasonData['name'];
                $episodes = $seasonData['episodes'];
                $seasonId = $seasonData['id'];

                // Create the season with the series_id
                Season::create([
                    'id'=> $seasonId,
                    'series_id' => $seriesId, // Ensure series_id is provided
                    'name' => $season_name
                ]);

    
                // Create episodes for the season
                foreach ($episodes as $episode) {
                    Episode::create([
                        'name' => $episode['name'],
                        'series_id' => $seriesId,
                        'season_id' => $seasonId
                    ]);
                }
            }
        }
    }


    public function cleanup(){
        try {
            Series::truncate();
            return response()->json(['message' => 'Series table emptied successfully'], 200);
        } catch (\Exception $e) {
            // Handle exceptions
            return response()->json(['error' => 'Failed to empty series table: ' . $e->getMessage()], 500);
        }
    }
    
}
