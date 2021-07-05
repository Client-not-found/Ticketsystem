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
            'categories' => Category::where( "catActive", '=', 1)->get(),
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
            'category' => Category::where( "catKey", $id )->first()
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
            'status' => 'required',
        ]);

        DB::table('categories')
            ->where('catKey', '=', $request->catKey)
            ->update(['catName' => $request->category,
            'catActive' => $request->status]);

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);

    }

    public function acpDelete ( Request $request ) {
        $this->authorize('delete', Category::class);
        DB::table('categories')->where('catKey', '=', $request->catKey )->delete();

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);
    }

    public function acpSave ( Request $request ) {
        $this->authorize('create', Category::class);
        Category::create([
            'catName' => $request->category,
            'catActive' => $request->status,
        ]);

        return view('acp.knowledgebase',[
            'categories' => Category::all(),
        ]);
    }
}
