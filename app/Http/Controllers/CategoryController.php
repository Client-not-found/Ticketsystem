<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Article;


class CategoryController extends Controller
{
    public function showCategories () {
        return view('knowledgebase', [
            'categories' => Category::where( "active", '=', 1)->get(),
            'articles' => Article::all(),
        ]);
    }

    public function admin() {
        $this->authorize('create', User::class);
        return view('acp.knowledgebase',[
            'categories' => Category::all(),
            ]);
    }

    public function categoryDetails(Request $request, int $id)
    {
        $this->authorize('create', User::class);
        return view('acp.categorydetails', [
            'category' => Category::where( "key", $id )->first()
        ]);

    }

    public function newCategory () {
        $this->authorize('create', User::class);
        return view('acp.newcategory');
    }

    public function acpEdit ( Request $request ) {
        $this->authorize('update', Category::class);
        $request->validate([
            'category' => 'required',
            'active' => 'required',
        ]);

        DB::table('categories')
            ->where('key', '=', $request->key)
            ->update(['name' => $request->category,
            'active' => $request->active]);

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);

    }

    public function acpDelete ( Request $request ) {
        $this->authorize('delete', Category::class);
        DB::table('categories')->where('key', '=', $request->key )->delete();

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);
    }

    public function acpSave ( Request $request ) {
        $this->authorize('create', Category::class);
        Category::create([
            'name' => $request->category,
            'active' => $request->active,
        ]);

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);
    }
}
