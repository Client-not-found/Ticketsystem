<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;


class CategoryController extends Controller
{
    public function showCategories () {
        return view('knowledgebase', [
            'categories' => Category::where( "catActive", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function admin() {
        return view('acp.knowledgebase',[
            'categories' => Category::all(),
            ]);
    }

    public function categoryDetails(Request $request, int $id)
    {

        return view('acp.categorydetails', [
            'category' => Category::where( "catKey", $id )->first()
        ]);

    }

    public function newCategory () {
        return view('acp.newcategory');
    }

    public function acpSave ( Request $request ) {
        Category::create([
            'catName' => $request->category,
            'catActive' => $request->status,
        ]);

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
            ]);
    }
}
