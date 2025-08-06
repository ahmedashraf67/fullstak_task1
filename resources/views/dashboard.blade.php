@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h1 class="mb-4">Dashboard</h1>
    <p class="lead">Welcome, {{ Auth::user()->name }}!</p>
    <a href="{{ route('articles.index') }}" class="btn btn-primary">Manage My Articles</a>
</div>
@endsection

