<form method="POST" action="{{ route('replies.store', ['id' => $troublePost->id]) }}">
  @csrf
  <div>
    <label for="message">返信</label>
    <textarea name="message" required>{{ old('message') }}</textarea>
    @error('content')
    <div>{{ $message }}</div>
    @enderror
  </div>

  <div>
    <button type="submit">投稿</button>
  </div>
</form>