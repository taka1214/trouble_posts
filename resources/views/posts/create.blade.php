<a href="{{ route('posts.index') }}">一覧</a>

<form method="post" action="{{ route('posts.store') }}">
  @csrf
  @if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="form-group">
    <label for="title">タイトル</label>
    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
  </div>

  <div class="form-group">
    <label for="body">本文</label>
    <textarea class="form-control" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
  </div>

  <div class="form-group">
    <label for="image_file">画像</label>
    <input type="file" class="form-control-file" id="image_file" name="image_file">
  </div>

  <button type="submit" class="btn btn-primary">投稿</button>

</form>