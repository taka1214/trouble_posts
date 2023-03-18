<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\troublePost;
use App\Http\Requests\StoreTroublePostRequest;

class TroublePostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->search;
        $query = troublePost::search($search);
        $troublePosts = $query->select('id', 'title', 'body', 'image_file')
        ->get();

        return view('posts.index', compact('troublePosts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTroublePostRequest $request)
    {
        troublePost::create([
            'title' => $request->title,
            'body' => $request->body,
            'image_file' => $request->image_file,
        ]);

        return to_route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $troublePost = troublePost::find($id);
        $replies = troublePost::find($id)->replies;
        return view('posts.show', compact('troublePost', 'replies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $troublePost = troublePost::find($id);
        return view('posts.edit', compact('troublePost'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreTroublePostRequest $request, $id)
    {
        $troublePost = troublePost::find($id);
        $troublePost->title = $request->title;
        $troublePost->body = $request->body;
        $troublePost->image_file = $request->image_file;
        $troublePost->save();

        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $troublePost = troublePost::find($id);
        $troublePost->delete();

        return to_route('posts.index');
    }
}
