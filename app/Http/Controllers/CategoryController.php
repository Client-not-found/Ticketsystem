<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;


class CategoryController extends Controller
{
    public function showCategories () {
        return view('knowledgebase', [
            'categories' => Category::all(),
            'articles' => Article::all()
        ]);
    }

}
