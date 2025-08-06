@extends('layouts.app')

@section('content')
<div class="container">
  <h1 class="mb-4">My Articles</h1>

  <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">+ New Article</a>

  @foreach ($articles as $article)
    <div class="card mb-3">
      <div class="card-body">
        <h5>{{ $article->title }}</h5>
        <p>{{ $article->body }}</p>

        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-sm btn-warning">Edit</a>

        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
          @csrf
          @method('DELETE')
          <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
        </form>
      </div>
    </div>
  @endforeach
</div>
@endsection
