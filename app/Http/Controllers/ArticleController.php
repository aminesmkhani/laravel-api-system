<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return response()->json([
           'data'   => $articles,
            'meta'  => [
                'count' => $articles->count()
            ]
        ],200);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $article = Article::FindOrFail($id);
        return response()->json([
           'data' => new ArticleResource($article)
        ], 200);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
