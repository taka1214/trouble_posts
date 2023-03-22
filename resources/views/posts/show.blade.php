{{ $troublePost->title }}<br>
{{ $troublePost->body }}<br>
@if ($troublePost['image_file'])
<img src="{{ Storage::url($troublePost['image_file']) }}"><br>
@endif
{{ $troublePost->created_at }}
<form method="get" action="{{ route('posts.edit', ['post' => $troublePost->id ]) }}">
  <button>編集</button>
</form>

<form id="delete_{{ $troublePost->id }}" method="post" action="{{ route('posts.destroy', ['post' => $troublePost->id ]) }}">
  @csrf
  @method('DELETE')
  <a href="#" data-id="{{ $troublePost->id }}" onclick="deletePost(this)">削除</a>
</form>


<ul>
  @forelse ($replies as $reply)
  <li>
    {{ $reply->message }}
    <a href="{{ route('replies.edit', ['reply' => $reply ]) }}">編集</a>
    <form id="destroy_{{ $reply->id }}" method="post" action="{{ route('replies.destroy', ['reply' => $reply->id ]) }}" style="display: inline-block;">
      @csrf
      @method('DELETE')
      <a href="#" data-id="{{ $reply->id }}" onclick="deleteReply(this)">削除</a>
    </form>
    @empty
    <p>まだ返信はありません</p>
  </li>
  @endforelse
</ul>

<div>
  <a href="{{ route('replies.create', ['troublePost' => $troublePost]) }}" class="btn btn-primary">New Reply</a>
</div>

@if (session('success'))
<div>
  {{ session('success') }}
</div>
@endif


<a href="{{ route('posts.index') }}">一覧へ戻る</a>

<script>
  function deletePost(e) {
    'use strict'
    if (confirm('Are you sure?')) {
      document.getElementById('delete_' + e.dataset.id).submit()
    }
  }

  function deleteReply(e) {
    'use strict'
    if (confirm('Are you sure?')) {
      document.getElementById('destroy_' + e.dataset.id).submit()
    }
  }
</script>