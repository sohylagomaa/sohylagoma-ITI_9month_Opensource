@extends('layouts.main')

@section('main-content')
    <h2 class="mb-4">All Posts</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr class="table-light">
                <th>Title</th> <th>Description</th> <th>View</th> <th>Edit</th> <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>{{ $post['title'] }}</td>
                <td>{{ $post['description'] }}</td>
                <td>
                    <a href="/posts/show/{{ $post['id'] }}" class="btn btn-primary btn-sm">Show</a>
                </td>
                <td><button class="btn btn-warning btn-sm text-white">Edit</button></td>
                <td><button class="btn btn-danger btn-sm">Delete</button></td>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection