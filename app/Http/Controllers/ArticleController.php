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
}
