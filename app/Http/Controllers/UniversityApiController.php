<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversityApiController extends Controller
{
    public function fetchUniversities()
    {
        // Fetch data from API
        $response = Http::get('https://datausa.io/api/data?drilldowns=Nation&measures=Population');
        
        // Decode JSON response and extract 'data' array
        $data = $response->json()['data'] ?? [];

        return view('api.index', compact('data'));
    }
}
