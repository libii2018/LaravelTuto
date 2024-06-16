@extends('base')

@section('title','Creer un artile')

@section('content')
  <form action="" method="post">
    @csrf'
    <div>
      <input type="text" name="title" value="{{ old('title', 'Mon titre') }}">
      @error('title')
        {{ $message }}
      @enderror
    </div>
    <div>
      <textarea name="content" id="" cols="30" rows="10">{{ old('content', 'Contenu de demonstraction') }}</textarea>
      $@error('content')
          {{ $message }}
      @enderror
    </div>
    <button>Enregistrer</button>
  </form>
@endsection
