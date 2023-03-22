<form method="post" action="{{ route('replies.update', ['reply' => $reply->id]) }}">
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
  <div>
    <label for="message">返信</label>
    <textarea name="message" required>{{ $reply->message }}</textarea>
    @error('content')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div>
    <button type="submit">投稿</button>
  </div>
</form>