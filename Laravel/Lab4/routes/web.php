<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Auth\GithubController;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('/auth/github/redirect', [GithubController::class, 'redirect'])->name('github.login');
Route::get('/auth/github/callback', [GithubController::class, 'callback']);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', function (Request $request) {
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        
        
        $user = Auth::user();
        return redirect()->intended('/posts');
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ])->onlyInput('email');
})->name('login.post');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class);
        Route::get('/dashboard', [PostController::class, 'index'])->name('dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware('can:is-admin');





