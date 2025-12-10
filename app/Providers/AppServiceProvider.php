<?php

namespace App\Providers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }

    protected function authenticated(Request $request, $user)
{
    switch ($user->role) {
        case 'admin':
            return redirect()->route('admin.dashboard');
        case 'pemimpin':
            return redirect()->route('pemimpin.dashboard');
        case 'user':
            return redirect()->route('user.dashboard');
        default:
            return redirect('/');
    }
}

}
