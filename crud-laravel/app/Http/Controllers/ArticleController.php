<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index() {
        return view('article.index', [
            'articles' => Article::get()
        ]);
    }

    public function create() {
        return view('article.form');
    }

    public function store(Request $request) {
        $inputs = $request->only(['title', 'description']);
        $create = Article::create($inputs);

        if($create) {
            return redirect()->route('article.index');
        }

        return abort(500);
    }
}
