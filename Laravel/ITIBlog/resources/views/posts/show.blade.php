@extends('layouts.main')

@section('main-content')
<div class="card mx-auto" style="max-width: 600px;">
    <div class="card-header">Post details</div>
    <div class="card-body">
        <h5 class="card-title">{{ $post['title'] }}</h5>
        <p class="card-text text-muted">{{ $post['description'] }}</p>
        <a href="/posts" class="btn btn-info text-white btn-sm">All Posts</a>
    </div>
</div>
@endsection