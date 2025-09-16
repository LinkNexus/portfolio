<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonalDataRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class DashboardController extends Controller
{
    public function login()
    {
        if (request()->method() === 'POST') {
            $this->checkTooManyFailedAttempts(request());
            $password = request()->input('password');

            if ($password === config('dashboard.password')) {
                request()->session()->put('dashboard_authenticated', true);
                request()->session()->regenerate();

                RateLimiter::clear($this->throttleKey(request()));

                return redirect()->route('dashboard');
            }

            RateLimiter::hit($this->throttleKey(request()));

            return back()->withErrors([
                'password' => 'The provided password is incorrect.',
            ])->onlyInput('password');
        }

        return view('dashboard.login');
    }

    protected function checkTooManyFailedAttempts(Request $request): void
    {
        $key = $this->throttleKey($request);

        if (! RateLimiter::tooManyAttempts($key, 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($key);

        throw ValidationException::withMessages([
            'email' => [
                trans(
                    'auth.throttle',
                    [
                        'seconds' => $seconds,
                        'minutes' => ceil($seconds / 60),
                    ]
                ),
            ],
        ]);
    }

    /**
     * Get the rate-limiting throttle key for the request.
     *
     * @param  \Illuminate\Http\Request  $request  the incoming request
     */
    protected function throttleKey(Request $request): string
    {
        return Str::transliterate('dashboard_login|' . $request->ip());
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function handleSubmit(PersonalDataRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $data = [
            ...$validated,
            'workExperience' => json_decode($validated['workExperience'], true),
            'skills' => json_decode($validated['skills'], true),
            'projects' => json_decode($validated['projects'], true),
            'education' => json_decode($validated['education'], true),
        ];

        $file = resource_path('data/data.' . app()->environment() . '.json');
        file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return back()->with('status', 'Profile updated successfully!');
    }
}
