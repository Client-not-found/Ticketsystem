<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function newArticle () {
        return view('newarticle',[
            'categories' => Category::all(),
            ]);
    }

    public function save ( Request $request ) {
        //dd($request->category);
        Article::create([
            'artUseId' => '1',
            'artCatId' => $request->category,
            'artTopic' => $request->title, 
            'artMessage' => $request->message,
        ]);   

        return view('knowledgebase', [
            'categories' => Category::where( "catActive", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function articleDetails(Request $request, int $id)
    {

        return view('article', [
            'article' => Article::where( "artKey", $id )->first()
        ]);

    }
}
