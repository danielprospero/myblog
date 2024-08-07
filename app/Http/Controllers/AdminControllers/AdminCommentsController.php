<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;

class AdminCommentsController extends Controller
{
    private $rules = [
        'post_id' => 'required|exists:posts,id',
        'the_comment' => 'required|string|min:3|max:1000'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin_dashboard.comments.index', [
            'comments' => Comment::latest()->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin_dashboard.comments.create', [
            'posts' => Post::pluck('title', 'id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = $request->validate($this->rules);
        $validated['user_id'] = auth()->id();

        Comment::create($validated);
        return redirect()->route('admin.comments.create')->with('success', 'Comentário adicionado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('admin_dashboard.comments.edit', [
            'posts' => Post::pluck('title', 'id'),
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {

        $validated = $request->validate($this->rules);
        $comment->update($validated);
        return redirect()->route('admin.comments.edit', $comment)->with('success', 'Comentário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index')->with('success', 'Comentário deletado com sucesso!');
    }
}
