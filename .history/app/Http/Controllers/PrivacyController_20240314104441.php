<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PrivacyController extends Controller
{
    public function privacypolicy()
    {
        $page_data['blogs'] = Blog::where('is_popular', 1)->get();
        $page_data['listings'] = Listing::where('is_featured', 1)->get();
        $page_data['faqs'] = Faq::all();

}
