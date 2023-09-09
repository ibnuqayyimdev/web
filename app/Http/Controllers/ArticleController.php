<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['articles'] = Article::with('user')->get();
        // dd($data);
        return view('backsite.pages.article.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['categories'] = Category::where('status',Helper::STATUS['ACTIVE'])->get();
        $data['tags'] = Tag::where('status',Helper::STATUS['ACTIVE'])->get();
        $data['types'] = Article::TYPE;
        $data['status'] = Helper::STATUS;
        return view('backsite.pages.article.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $existsType = implode(',',Article::TYPE);
        $request->validate([
            'title'             => 'required|string|max:255',
            'body'             => 'required|string',
            'status'           => 'in:0,1',
            'category' => 'exists:categories,id',
            'tags' => 'exists:tags,id',
            'type' => "in:$existsType",
            'thumbnail' => 'required|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $article = new Article();
            $article->title = $request->title;
            $article->body = $request->body;
            $article->user_id = auth()->user()->id;
            $article->type = $request->type;
            $article->status = $request->status;
            $article->category_id = $request->category;

            $thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
            $article->thumbnail = $thumbnail;
            $article->save();

            foreach ($request->tags as $key => $tag) {
                ArticleTag::create([
                    'article_id' => $article->id,
                    'tag_id' => $tag
                ]);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('article.index')->with(['message' => 'Article created successfull', 'alert-type' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $data['categories'] = Category::where('status',Helper::STATUS['ACTIVE'])->get();
        $data['tags'] = Tag::where('status',Helper::STATUS['ACTIVE'])->get();
        $data['types'] = Article::TYPE;
        $data['status'] = Helper::STATUS;
        $data['article'] = $article;

        // dd($article->tags()->get(),$article->tags()->get()->pluck('id'));
        return view('backsite.pages.article.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        // dd($request->all());
        $existsType = implode(',',Article::TYPE);
        $request->validate([
            'title'             => 'string|max:255',
            'body'             => 'string',
            'status'           => 'in:0,1',
            'category' => 'exists:categories,id',
            'tags' => 'exists:tags,id',
            'type' => "in:$existsType",
            'thumbnail' => 'mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $article->title = $request->title;
            $article->body = $request->body;
            $article->user_id = auth()->user()->id;
            $article->type = $request->type;
            $article->status = $request->status;
            $article->category_id = $request->category;

            if($request->file('thumbnail')){
                $thumbnail = $request->file('thumbnail')->store('thumbnail', 'public');
                $article->thumbnail = $thumbnail;
            }
            $article->save();

            $article->tags()->sync($request->tags);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('article.index')->with(['message' => 'Article updated successfull', 'alert-type' => 'success']);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        try {
            if($article){
                $article->delete();
            }
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('article.index')->with(['message' => 'Tag deleted successfull', 'alert-type' => 'success']);
    }

    public function updateStatus($id)
    {
        try {
            $tag = Article::findOrFail($id);
            $tag->status = !$tag->status;
            $tag->save();
        } catch (\Exception $e) {
            if (env('APP_ENV') == 'local') {
                dd($e);
            }
            return back()->with(['message' => 'Something went wrong!', 'alert-type' => 'error']);
        }

        return to_route('article.index')->with(['message' => 'Status updated successfull', 'alert-type' => 'success']);
    }
}
