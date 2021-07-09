<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function newArticle () {
        return view('newarticle',[
            'categories' => Category::all(),
            ]);
    }

    
    public function save ( Request $request ) {
        $this->authorize('create', Article::class);
        //dd($request->category);
        Article::create([
            'useId' => $request->user,
            'catId' => $request->category,
            'topic' => $request->title, 
            'message' => $request->message,
        ]);   


        return view('knowledgebase', [
            'categories' => Category::where( "status", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function artDelete ( Request $request ) {

    $this->authorize('delete', Article::class);
        DB::table('articles')->where('key', '=', $request->key )->delete();

        return view('knowledgebase', [
            'categories' => Category::where( "status", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function articleDetails(Request $request, int $id)
    {

        return view('article', [
            'article' => Article::where( "key", $id )->join('users', 'articles.key', '=', 'users.key')->join('groups', 'users.groId', '=', 'groups.key')->first()
        ]);

    }
}
