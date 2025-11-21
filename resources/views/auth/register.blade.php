<x-vibrant-guest-layout>
    <div class="mb-8 text-center">
        <h2 class="font-heading text-3xl font-bold text-white">Create Account</h2>
        <p class="mt-2 text-gray-400">Join our community today</p>
    </div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <label for="name" class="block font-medium text-sm text-gray-300">Name</label>
            <input id="name" class="block mt-2 w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-white placeholder-gray-500 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="John Doe" />
            @error('name')
                <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Email Address -->
        <div class="mt-6">
            <label for="email" class="block font-medium text-sm text-gray-300">Email</label>
            <input id="email" class="block mt-2 w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-white placeholder-gray-500 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" type="email" name="email" value="{{ old('email') }}" required placeholder="name@example.com" />
            @error('email')
                <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Password -->
        <div class="mt-6">
            <label for="password" class="block font-medium text-sm text-gray-300">Password</label>
            <input id="password" class="block mt-2 w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-white placeholder-gray-500 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" type="password" name="password" required autocomplete="new-password" placeholder="••••••••" />
            @error('password')
                <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
            @enderror
        </div>

        <!-- Confirm Password -->
        <div class="mt-6">
            <label for="password_confirmation" class="block font-medium text-sm text-gray-300">Confirm Password</label>
            <input id="password_confirmation" class="block mt-2 w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-white placeholder-gray-500 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" type="password" name="password_confirmation" required placeholder="••••••••" />
        </div>

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
