{{ $troublePost->id }}
{{ $troublePost->title }}
{{ $troublePost->body }}
{{ $troublePost->image_file }}
{{ $troublePost->created_at }}
<form method="get" action="{{ route('posts.edit', ['post' => $troublePost->id ]) }}">
  <button>編集</button>
</form>

<form id="delete_{{ $troublePost->id }}" method="post" action="{{ route('posts.destroy', ['post' => $troublePost->id ]) }}">
  @csrf
  @method('DELETE')
  <a href="#" data-id="{{ $troublePost->id }}" onclick="deletePost(this)">削除</a>
</form>


@forelse ($replies as $reply)
{{ $reply->message }}<br>
@empty
<p>まだ返信はありません</p>
@endforelse

<div>
    <a href="{{ route('replies.create', ['troublePost' => $troublePost]) }}" class="btn btn-primary">New Reply</a>
</div>


<a href="{{ route('posts.index') }}">一覧へ戻る</a>

<script>
  function deletePost(e) {
    'use strict'
    if (confirm('Are you sure?')) {
      document.getElementById('delete_' + e.dataset.id).submit()
    }
  }
</script>