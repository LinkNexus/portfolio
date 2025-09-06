<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
  public function login()
  {
    if (request()->method() === "POST") {
      $this->checkTooManyFailedAttempts(request());
      $password = request()->input("password");

      if ($password === config("dashboard.password")) {
        request()->session()->put("dashboard_authenticated", true);
        request()->session()->regenerate();

        RateLimiter::clear($this->throttleKey(request()));

        return redirect()->route("dashboard");
      }

      RateLimiter::hit($this->throttleKey(request()));

      return back()->withErrors([
        'password' => 'The provided password is incorrect.'
      ])->onlyInput('password');
    }

    return view('dashboard.login');
  }

  protected function checkTooManyFailedAttempts(Request $request)
  {
    $key = $this->throttleKey($request);

    if (!RateLimiter::tooManyAttempts($key, 5)) {
      return;
    }

    $seconds = RateLimiter::availableIn($key);

    throw ValidationException::withMessages([
      'email' => [
        trans('auth.throttle', [
          'seconds' => $seconds,
          'minutes' => ceil($seconds / 60),
        ])
      ],
    ]);
  }

  /**
   * Get the rate-limiting throttle key for the request.
   */
  protected function throttleKey(Request $request): string
  {
    return Str::transliterate('dashboard_login|' . $request->ip());
  }

  /**
   * Show the dashboard.
   */
  public function index()
  {
    if (request()->method() === "POST") {
      dump(request()->all());
    }
    return view('dashboard.index');
  }
}
