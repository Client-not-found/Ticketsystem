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
            'artUseId' => $request->user,
            'artCatId' => $request->category,
            'artTopic' => $request->title, 
            'artMessage' => $request->message,
        ]);   


        return view('knowledgebase', [
            'categories' => Category::where( "catActive", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function artDelete ( Request $request ) {

    $this->authorize('delete', Article::class);
        DB::table('articles')->where('artKey', '=', $request->artKey )->delete();

        return view('knowledgebase', [
            'categories' => Category::where( "catActive", '=', 1)->get(),
            'articles' => Article::all()
        ]);
    }

    public function articleDetails(Request $request, int $id)
    {

        return view('article', [
            'article' => Article::where( "artKey", $id )->join('users', 'articles.artKey', '=', 'users.useKey')->join('groups', 'users.useGroId', '=', 'groups.groKey')->first()
        ]);

    }
}
