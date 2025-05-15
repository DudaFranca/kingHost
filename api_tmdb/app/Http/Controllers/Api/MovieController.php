<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieController extends Controller
{
    public function index()
    {
        $response = Http::withHeaders([
            'accept' => 'application/json'
        ])->get('https://api.themoviedb.org/3/discover/movie', [
            'api_key'       => '84653e4663ec36cd834823697dcc42ee',
            'query'         => '',
            'language'      => 'pt-BR',
            'page'          => 1,
            'include_adult' => false,
        ]);

        return response()->json([
            'data' => $response->json()['results']
        ]);
    }

    public function searchMovie(Request $request)
    {
        $response = Http::withHeaders([
            'accept' => 'application/json'
        ])->get('https://api.themoviedb.org/3/search/movie', [
            'api_key'       => '84653e4663ec36cd834823697dcc42ee',
            'query'         => $request->search,
            'language'      => 'pt-BR',
            'page'          => 1,
            'include_adult' => false,
        ]);

        return response()->json([
            'data' => $response->json()['results']
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
