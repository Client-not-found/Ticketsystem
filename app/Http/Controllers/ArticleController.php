<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function newArticle () {
        return view('newarticle',[
            'categories' => Category::all(),
            ]);
    }

    public function save ( Request $request ) {
        Ticket::create([
            'artUseId' => '1',
            'ArtCatId' => $request->category,
            'artTopic' => $request->title, 
            'artMessage' => $request->message,
        ]);   
    }
}
