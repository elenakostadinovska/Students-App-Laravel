<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UniversityApiController extends Controller
{
    public function fetchUniversities()
    {
        $response = Http::get('http://universities.hipolabs.com/search?country=United+States');
        $data = $response->json();
        
        return view('api.index', compact('data'));
    }
}
