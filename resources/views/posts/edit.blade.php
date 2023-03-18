<form method="post" action="{{ route('posts.update', ['post' => $troublePost->id ]) }}">
  @csrf
  @method('PUT')
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
      <input type="text" value="{{ $troublePost->title }}" id="title" name="title" required>
  </div>

  <div class="form-group">
      <label for="body">本文</label>
      <textarea id="body" name="body" rows="5" required>{{ $troublePost->body }}</textarea>
  </div>

  <div class="form-group">
      <label for="image_file">画像</label>
      <input type="file" value="{{ $troublePost->image_file }}" id="image_file" name="image_file">
  </div>

  <button type="submit" class="btn btn-primary">更新</button>

</form>