<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\troublePost;
use App\Models\Reply;

class ReplyController extends Controller
{
    public function index ()
    {
        $replies = troublePost::find(1)->replies;
        $posts = Reply::find(1)->troublePost;
    }

    public function create (troublePost $troublePost)
    {
        return view('replies.create', compact('troublePost'));
    }

    public function store(Request $request, troublePost $id)
    {
        
        // 返信を作成する処理
        $reply = Reply::create([
            'message' => $request->message,

        ]);
        $reply->save();

        to_route('trouble_posts.show');

        // 投稿詳細ページにリダイレクトする
        return view('posts.show')->with('success', 'コメントを投稿しました。');
    }
}
