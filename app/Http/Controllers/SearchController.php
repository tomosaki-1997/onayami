<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Searchable\Search;
use App\Models\Text;

class SearchController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function result( Request $request)
    {
        $searchResults = (new Search())
                    // C 検索するモデル名と、カラムを指定
                    ->registerModel(Text::class, 'body')
                    ->perform($request->input('query'));

        return view('search.result', compact('searchResults'));
    }
}
