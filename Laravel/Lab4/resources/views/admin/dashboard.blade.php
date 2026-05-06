@extends('layouts.app')

@section('content')
<div class="bg-blue-100 p-8 rounded-lg border-2 border-blue-500">
    <h1 class="text-3xl font-bold text-blue-800">Admin Dashboard</h1>
    <p class="mt-4 text-blue-700">Hello Admin</p>
    
    <div class="mt-6 bg-white p-4 rounded shadow">
        <h2 class="font-bold mb-2"> quick statistics</h2>
        <ul>
            <li> posts count: {{ \App\Models\Post::count() }}</li>
            <li> users count: {{ \App\Models\User::count() }}</li>
        </ul>
    </div>
</div>
@endsection