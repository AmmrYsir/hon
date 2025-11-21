<x-vibrant-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="font-heading text-3xl font-bold text-white">Welcome Back</h2>
        <p class="mt-2 text-gray-400">Sign in to continue your journey</p>
    </div>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <x-text-input class="mt-6" type="email" name="email" label="Email" placeholder="name@example.com" />

        <!-- Password -->
        <x-text-input class="mt-6" type="password" name="password" label="Password" placeholder="••••••••" />

        <div class="flex items-center justify-between mt-6">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-white/10 bg-white/5 text-blue-600 shadow-sm focus:ring-blue-500/50 focus:ring-offset-0" name="remember">
                <span class="cursor-pointer ml-2 text-sm text-gray-400">Remember me</span>
            </label>

            @if (Route::has('password.request'))
                <a class="cursor-pointer text-sm text-blue-400 hover:text-blue-300 transition-colors" href="{{ route('password.request') }}">
                    Forgot password?
                </a>
            @endif
        </div>

        <div class="mt-8">
            <button type="submit" class="cursor-pointer w-full rounded-full bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:bg-blue-500 hover:shadow-[0_0_30px_rgba(37,99,235,0.6)] transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#0f111a]">
                Log in
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-400">
            Don't have an account? 
            <a href="{{ route('register') }}" class="cursor-pointer font-medium text-blue-400 hover:text-blue-300 transition-colors">
                Sign up
            </a>
        </div>
    </form>
</x-vibrant-guest-layout>
