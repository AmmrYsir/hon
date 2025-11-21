<x-vibrant-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="font-heading text-3xl font-bold text-white">Create Account</h2>
        <p class="mt-2 text-gray-400">Join our community today</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <x-text-input type="text" name="name" label="Name" placeholder="John Doe" />

        <!-- Email Address -->
        <x-text-input class="mt-6" type="email" name="email" label="Email" placeholder="name@example.com" />

        <!-- Password -->
        <x-text-input class="mt-6" type="password" name="password" label="Password" placeholder="••••••••" />

        <!-- Confirm Password -->
        <x-text-input class="mt-6" type="password" name="password_confirmation" label="Confirm Password" placeholder="••••••••" />

        <div class="mt-8">
            <button type="submit" class="cursor-pointer w-full rounded-full bg-blue-600 px-4 py-3 text-sm font-semibold text-white shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:bg-blue-500 hover:shadow-[0_0_30px_rgba(37,99,235,0.6)] transition-all duration-300 transform hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 focus:ring-offset-[#0f111a]">
                Register
            </button>
        </div>

        <div class="mt-6 text-center text-sm text-gray-400">
            Already have an account? 
            <a href="{{ route('login') }}" class="cursor-pointer font-medium text-blue-400 hover:text-blue-300 transition-colors">
                Log in
            </a>
        </div>
    </form>
</x-vibrant-guest-layout>
