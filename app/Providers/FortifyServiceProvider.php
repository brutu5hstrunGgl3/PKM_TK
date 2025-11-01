<?php

namespace App\Providers;

use App\Actions\Fortify\CreateNewUser;
use App\Actions\Fortify\ResetUserPassword;
use App\Actions\Fortify\UpdateUserPassword;
use App\Actions\Fortify\UpdateUserProfileInformation;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Laravel\Fortify\Actions\RedirectIfTwoFactorAuthenticatable;
use Laravel\Fortify\Fortify;


class FortifyServiceProvider extends ServiceProvider
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
        Fortify::createUsersUsing(CreateNewUser::class);
        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);
        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);
        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);
        Fortify::redirectUserForTwoFactorAuthenticationUsing(RedirectIfTwoFactorAuthenticatable::class);

        RateLimiter::for('login', function (Request $request) {
            $throttleKey = Str::transliterate(Str::lower($request->input(Fortify::username())).'|'.$request->ip());

            return Limit::perMinute(5)->by($throttleKey);
        });

        RateLimiter::for('two-factor', function (Request $request) {
            return Limit::perMinute(5)->by($request->session()->get('login.id'));
        });

       

        // Fortify::loginView(function () {
        //         return view('auth.auth-login2');
        //     });
    Fortify::loginView(function () {
    // Simpan flag di session saat pengguna buka /secure-admin-login
    if (session('allow_login') !== true) {
         return response()->view('landing.404', [], 404);
    }

    // Hapus flag agar tidak bisa diakses ulang tanpa /secure-admin-login
    session()->forget('allow_login');

    return view('auth.auth-login2');
});
// Fortify::loginView(function () {
//     // Jika user tidak datang dari /secure-admin-login, arahkan ke halaman 404 custom
//     if (session('allow_login') !== true) {
//         return response()->view('landing.404', [], 404);
//     }

//     // Hapus izin supaya /login tidak bisa diakses lagi tanpa lewat /secure-admin-login
//     session()->forget('allow_login');

//     return view('auth.auth-login2');
// });
    
     Fortify::requestPasswordResetLinkView(function () {
            return view('auth.auth-forgot-password');
        });
    Fortify::resetPasswordView(function( $request ) {
            return view('auth.auth-reset-password', ['request' => request()]);  
        });

    Fortify::verifyEmailView(function () {
            return view('auth.auth-verify-email');
        });
    
 
    // ...

    }
}
