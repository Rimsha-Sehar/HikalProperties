<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $apiBaseUrl = env('HIKALAPI_BASE_URL');

        $url = $apiBaseUrl . '/listing/search';

        $queryParams = $request->query();

        $response = Http::timeout(30)->get($url, $queryParams);

        if ($response->successful()) {
            // add redirect page here with passing the data
            $page = $request->input('page', 1);

            $perPage = 6;

            // $apiUrl = env('HIKALAPI_BASE_URL') . '/new-listings?per_page=' . $perPage . '&page=' . $page;

            // $response = Http::get($apiUrl);

            $responseData = $response->json();

            $listings = $responseData['data'] ?? [];

            $pagination = $responseData['pagination'] ?? [];

            return view('real_estate.filter', compact('listings', 'pagination'));
            // return response()->json($response->json(), 200);
        }

        // if request fails show the popup something went wrong
        return response()->json([
            'status' => false,
            'message' => 'Error fetching listings from API'
        ], $response->status());
    }
}
