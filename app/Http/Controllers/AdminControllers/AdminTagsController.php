<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Tag;

class AdminTagsController extends Controller
{
    public function index()
    {
        return view('admin_dashboard.tags.index', [
            'tags' => Tag::latest()->paginate(10)
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return view('admin_dashboard.tags.show', [
            'tag' => $tag
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin_dashboard.tags.edit', [
            'tag' => $tag
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:3|max:255'
        ]);

        $tag->update($validated);

        return redirect()->route('admin.tags.index')->with('success', 'Tag atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {

        $tag->posts()->detach();
        $tag->delete();
        return redirect()->route('admin.tags.index')->with('success', 'Tag deletada com sucesso!');

    }

}
