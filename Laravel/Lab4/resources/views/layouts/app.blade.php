<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab 4 - Laravel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow-lg mb-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a href="/" class="text-xl font-bold text-blue-600">Lab4 Proj</a>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700">welcome {{ Auth::user()->name }} 
                            <span class="text-xs bg-blue-100 text-blue-800 px-2 py-1 rounded">({{ Auth::user()->role }})</span>
                        </span>
                        @can('is-admin')
                            <div>
                                <a href="/admin/dashboard" class="bg-purple-600 text-white rounded p-2">
                                    Go to Admin Dashboard 
                                </a>
                            </div>
                        @endcan
                        <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white rounded p-2">New Post</a>
                        <form action="/logout" method="POST"> @csrf <button class="bg-red-500 text-white rounded p-2">Logout</button> </form>
                    @else
                        <a href="/login" class="text-gray-700">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-6xl mx-auto px-4">
        @yield('content')
    </div>
</body>
</html>