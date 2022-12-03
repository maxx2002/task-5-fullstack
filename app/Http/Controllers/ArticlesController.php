<?php

namespace App\Http\Controllers;

use App\Models\articles;
use App\Models\categories;
use App\Models\User;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categories::all();
        $users = User::all();

        return view('createArticle', compact('users', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->user_id,
            'category_id' => $request->category_id,
            'image' => $request->file('image')->store('image', 'public')
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = articles::findOrFail($id);
        $users = User::all();
        $categories = categories::all();

        return view('editArticle', compact('article', 'users', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = articles::findOrFail($id);
        $id = $request->id;

        $image = $request->file('image');

        if ($image) {
            unlink('storage/'.$request->oldImage);

            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id,
                'image' => $image->store('image', 'public')
            ]);
        } else {
            $article->update([
                'title' => $request->title,
                'content' => $request->content,
                'user_id' => $request->user_id,
                'category_id' => $request->category_id
            ]);
        }        

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = articles::findOrFail($id);
        unlink('storage/'.$article->image);
        $article->delete();
        
        return redirect('/');
    }
}
