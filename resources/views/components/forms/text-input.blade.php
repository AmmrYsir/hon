<div {{ $attributes->merge(['class']) }}>
    <label for="{{ $attributes->get('id') }}" class="block font-medium text-sm text-gray-300">{{ $attributes->get('label') }}</label>
    <input id="{{ $attributes->get('id') }}" class="block mt-2 w-full rounded-lg border border-white/10 bg-white/5 px-4 py-2.5 text-white placeholder-gray-500 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500 sm:text-sm" type="{{ $attributes->get('type') }}" name="{{ $attributes->get('name') }}" value="{{ old($attributes->get('name')) }}" required autofocus placeholder="{{ $attributes->get('placeholder') }}" />
    @error($attributes->get('name'))
        <span class="text-red-400 text-sm mt-2 block">{{ $message }}</span>
    @enderror
</div>