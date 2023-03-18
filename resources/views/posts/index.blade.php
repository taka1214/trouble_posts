<a href="{{ route('posts.create') }}">Add new</a><br>
<form method="get" action="{{ route('posts.index') }}">
  <input type="text" name="search" placeholder="同じような投稿がないか検索" style="width: 15%">
  <button type="submit" value="検索">Search</button>
</form>
@foreach ($troublePosts as $troublePost)
  {{ $troublePost->id }}
  {{ $troublePost->title }}
  {{ $troublePost->body }}
  {{ $troublePost->image_file }}
  <a href="{{ route('posts.show', ['post' => $troublePost->id ]) }}">show</a><br>
@endforeach
