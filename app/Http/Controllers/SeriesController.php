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


    }

    function storeSeasons($seriesId){

    }

    function storeEpisodes($seriesId, $seasonId){

    }


    public function cleanup(){

    }
}
