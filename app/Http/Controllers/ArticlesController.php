<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();

        return view('articles.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();

        return view('articles.create', ['users' => $users, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateArticleRequest $request)
    {
        $request->validated();

        DB::beginTransaction();
        try {
            $article = new Article();
            $article->title = $request->get('title');
            $article->article_body = $request->get('article_body');
            $article->user_id = $request->get('user');

            $article->save();

            foreach ($request->get('category') as $category) {
                $articleCategory = new ArticleCategory();
                $articleCategory->category_id = $category;
                $articleCategory->article_id = $article->id;

                $articleCategory->save();
            }

            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();

            throw $exception;
        }

        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $article = Article::find($id);

        return view('articles.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);

        return view('articles.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArticleRequest $request, string $id)
    {
        $request->validated();

        $article = Article::find($id);
        $article->title = $request->input('title');
        $article->article_body = $request->input('article_body');

        $article->save();

        return redirect(route('articles.show', $article->id))->with('success', 'Статья была обновлена');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        $article->delete();

        return redirect()->route('articles.index')->with('success', 'Статья была удалена');
    }
}
