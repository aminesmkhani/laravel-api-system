<?php

namespace App\Http\Controllers;

use App\Http\Resources\ArticleCollection;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();
        return response()->json(new ArticleCollection($articles),200);
    }


    public function store(Request $request)
    {
        $this->validateArticle($request);

        Article::create([
           'user_id' =>1,
           'title' => $request->title ,
            'description'   => $request->description,
            'image' => $this->uploadImage($request)
        ]);

        return response()->json([
            'message' => 'created'
        ], 201);
    }

    private function validateArticle($request)
    {
            $request->validate([
                'title' => ['required'],
                'image' => ['required']
            ]);
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


    private function uploadImage($request)
    {
        return $request->hasFile('image') ? $request->image->store('public') : null;
    }
}
