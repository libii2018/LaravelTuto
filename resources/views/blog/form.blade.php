<form action="" method="post" class="vstack gap-2">
  @csrf'
  @method($post->id ? "PATCH" : "POST")
  <div class="form-group">
    <label for="title">Titre</label>
    <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
    @error('title')
      {{ $message }}
    @enderror
  </div>
  <div class="form-group">
    <label for="slug">Slug</label>
    <input class="form-control" type="text" id="slug" name="slug" value="{{ old('slug', $post->slug) }}">
    @error('slug')
      {{ $message }}
    @enderror
  </div>
  <div class="form-group">
    <label for="content">Contenu</label>
    <textarea class="form-control" name="content" id="" cols="30" rows="10">{{ old('title', $post->content) }}</textarea>
    @error('content')
        {{ $message }}
    @enderror
  </div>
  <button class="btn btn-primary">
    @if ($post->id)
      Modifier
    @else
      Creer
    @endif
  </button>
</form>