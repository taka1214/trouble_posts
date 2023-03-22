<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\troublePost;
use App\Models\Reply;
use App\Http\Requests\ReplyRequest;

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

    public function store(ReplyRequest $request)
    {
        // 返信を作成する処理
        $reply = Reply::create([
            'trouble_post_id' => $request->troublePost_id,
            'message' => $request->message,

        ]);
        $reply->save();

        return to_route('posts.show', [$reply['trouble_post_id']])->with('success', '返信を投稿しました。');
    }

    public function edit($id)
    {
        $reply = Reply::find($id);
        return view('replies.edit', compact('reply'));
    }

    public function update(ReplyRequest $request, $id)
    {
        $reply = Reply::find($id);
        $reply->message = $request->message;
        $reply->save();

        return to_route('posts.show', [$reply['trouble_post_id']])->with('success', '返信を更新しました。');
    }

    public function destroy($id)
    {
        $reply = Reply::find($id);
        $reply->delete();

        return to_route('posts.show', [$reply['trouble_post_id']])->with('success', '返信を削除しました。');
    }
}
