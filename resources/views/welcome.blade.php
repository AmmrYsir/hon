<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Hon - Discover Your Next Favorite Book</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@500;600;700;800&display=swap" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <script src="https://cdn.tailwindcss.com"></script>
            <script>
                tailwind.config = {
                    darkMode: 'class',
                    theme: {
                        extend: {
                            fontFamily: {
                                sans: ['Inter', 'sans-serif'],
                                heading: ['Outfit', 'sans-serif'],
                            },
                            colors: {
                                brand: {
                                    50: '#f0f9ff',
                                    100: '#e0f2fe',
                                    500: '#0ea5e9',
                                    600: '#0284c7',
                                    700: '#0369a1',
                                    900: '#0c4a6e',
                                }
                            }
                        }
                    }
                }
            </script>
        @endif
    </head>
    <body class="bg-[#0f111a] text-white font-sans antialiased selection:bg-blue-500 selection:text-white">
        
        <!-- Navbar -->
        <nav class="fixed top-0 z-50 w-full border-b border-white/10 bg-[#0f111a]/80 backdrop-blur-md">
            <div class="mx-auto flex h-16 max-w-7xl items-center justify-between px-4 sm:px-6 lg:px-8">
                <!-- Left Side -->
                <div class="flex items-center gap-8">
                    <a href="/" class="flex items-center gap-2">
                        <div class="flex h-8 w-8 items-center justify-center rounded-lg bg-blue-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-5 w-5">
                                <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.477V5.25c0-.142.189-.25.42-.25H21.75a.75.75 0 00.5-.707V4.262a9.735 9.735 0 00-3.25-.555 9.707 9.707 0 00-5.25 1.533v16.103z" />
                            </svg>
                        </div>
                        <span class="font-heading text-xl font-bold tracking-tight">Hon</span>
                    </a>
                    
                    <div class="hidden md:flex items-center gap-6 text-sm font-medium text-gray-300">
                        <a href="#" class="text-white hover:text-blue-400 transition-colors">Home</a>
                        <a href="#" class="hover:text-blue-400 transition-colors">My Library</a>
                        <a href="#" class="hover:text-blue-400 transition-colors">Genres</a>
                    </div>
                </div>

                <!-- Right Side -->
                <div class="flex items-center gap-4">
                    <!-- Search -->
                    <div class="relative hidden md:block">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-gray-400">
                            <path fill-rule="evenodd" d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z" clip-rule="evenodd" />
                        </svg>
                        <input type="text" placeholder="Search books..." class="h-9 w-64 rounded-full border border-white/10 bg-white/5 pl-9 pr-4 text-sm text-white placeholder-gray-400 focus:border-blue-500 focus:bg-white/10 focus:outline-none focus:ring-1 focus:ring-blue-500">
                    </div>

                    <!-- Auth -->
                    @if (Route::has('login'))
                        <div class="flex items-center gap-3">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="rounded-full bg-blue-600 px-4 py-1.5 text-sm font-medium text-white hover:bg-blue-500 transition-colors">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="rounded-full bg-blue-600 px-5 py-1.5 text-sm font-medium text-white hover:bg-blue-500 transition-colors shadow-[0_0_15px_rgba(37,99,235,0.5)]">Log In</a>
                                <div class="h-8 w-8 rounded-full bg-orange-100 flex items-center justify-center text-orange-600">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM3.751 20.105a8.25 8.25 0 0116.498 0 .75.75 0 01-.437.695A18.683 18.683 0 0112 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 01-.437-.695z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative pt-16">
            <!-- Background Image with Overlay -->
            <div class="absolute inset-0 z-0 h-[600px] w-full overflow-hidden">
                <img src="{{ asset('images/hero-bg.png') }}" alt="Background" class="h-full w-full object-cover opacity-60">
                <div class="absolute inset-0 bg-gradient-to-b from-[#0f111a]/30 via-[#0f111a]/80 to-[#0f111a]"></div>
                <div class="absolute inset-0 bg-[url('https://grainy-gradients.vercel.app/noise.svg')] opacity-20"></div>
            </div>

            <div class="relative z-10 mx-auto max-w-7xl px-4 pt-20 pb-32 sm:px-6 lg:px-8 text-center">
                <h1 class="font-heading text-5xl font-extrabold tracking-tight text-white sm:text-6xl md:text-7xl drop-shadow-lg">
                    Discover Your Next <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-400">Favorite Book</span>
                </h1>
                <p class="mx-auto mt-6 max-w-2xl text-lg text-gray-300">
                    Dive into a world of stories, knowledge, and adventure. Your next literary journey starts here with our vast catalog.
                </p>
                <div class="mt-10 flex justify-center gap-4">
                    <a href="#" class="rounded-full bg-blue-600 px-8 py-3 text-base font-semibold text-white shadow-[0_0_20px_rgba(37,99,235,0.4)] hover:bg-blue-500 hover:shadow-[0_0_30px_rgba(37,99,235,0.6)] transition-all duration-300 transform hover:-translate-y-1">
                        Explore the Catalog
                    </a>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="relative z-10 mx-auto max-w-7xl px-4 pb-20 sm:px-6 lg:px-8 -mt-20">
            
            <!-- New Releases -->
            <section class="mb-16">
                <x-section-header title="New Releases" link="#" />
                
                <div class="flex gap-6 overflow-x-auto pb-8 scrollbar-hide snap-x">
                    <x-book-card 
                        title="The Midnight Library" 
                        author="Matt Haig" 
                        rating="5" 
                        image="{{ asset('images/book-1.png') }}" 
                    />
                    <x-book-card 
                        title="Project Hail Mary" 
                        author="Andy Weir" 
                        rating="5" 
                        image="{{ asset('images/book-2.png') }}" 
                    />
                    <x-book-card 
                        title="Klara and the Sun" 
                        author="Kazuo Ishiguro" 
                        rating="4" 
                        image="{{ asset('images/book-3.png') }}" 
                    />
                    <x-book-card 
                        title="The Four Winds" 
                        author="Kristin Hannah" 
                        rating="5" 
                        image="{{ asset('images/book-4.png') }}" 
                    />
                     <x-book-card 
                        title="The Lincoln Highway" 
                        author="Amor Towles" 
                        rating="4" 
                        image="{{ asset('images/book-4.png') }}" 
                    />
                </div>
            </section>

            <!-- Recommended for You -->
            <section class="mb-16">
                <x-section-header title="Recommended for You" link="#" />
                
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                     <x-book-card 
                        title="Crying in H Mart" 
                        author="Michelle Zauner" 
                        rating="5" 
                        image="{{ asset('images/book-3.png') }}" 
                    />
                    <x-book-card 
                        title="The Lincoln Highway" 
                        author="Amor Towles" 
                        rating="4" 
                        image="{{ asset('images/book-4.png') }}" 
                    />
                     <x-book-card 
                        title="Project Hail Mary" 
                        author="Andy Weir" 
                        rating="5" 
                        image="{{ asset('images/book-2.png') }}" 
                    />
                     <x-book-card 
                        title="The Midnight Library" 
                        author="Matt Haig" 
                        rating="5" 
                        image="{{ asset('images/book-1.png') }}" 
                    />
                </div>
            </section>

            <!-- All Time Popular -->
            <section>
                <x-section-header title="All Time Popular" link="#" />
                
                <div class="grid grid-cols-2 gap-6 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
                    <x-book-card 
                        title="Dune" 
                        author="Frank Herbert" 
                        rating="5" 
                        image="{{ asset('images/book-2.png') }}" 
                    />
                    <x-book-card 
                        title="The Hobbit" 
                        author="J.R.R. Tolkien" 
                        rating="5" 
                        image="{{ asset('images/book-4.png') }}" 
                    />
                     <x-book-card 
                        title="1984" 
                        author="George Orwell" 
                        rating="5" 
                        image="{{ asset('images/book-1.png') }}" 
                    />
                     <x-book-card 
                        title="The Great Gatsby" 
                        author="F. Scott Fitzgerald" 
                        rating="4" 
                        image="{{ asset('images/book-3.png') }}" 
                    />
                </div>
            </section>

        </div>

        <!-- Footer -->
        <footer class="border-t border-white/10 bg-[#0f111a] py-12">
            <div class="mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 px-4 sm:flex-row sm:px-6 lg:px-8">
                <div class="flex items-center gap-2">
                    <div class="flex h-6 w-6 items-center justify-center rounded bg-blue-600 text-white">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="h-4 w-4">
                            <path d="M11.25 4.533A9.707 9.707 0 006 3a9.735 9.735 0 00-3.25.555.75.75 0 00-.5.707v14.25a.75.75 0 001 .707A8.237 8.237 0 016 18.75c1.995 0 3.823.707 5.25 1.886V4.533zM12.75 20.636A8.214 8.214 0 0118 18.75c.966 0 1.89.166 2.75.477V5.25c0-.142.189-.25.42-.25H21.75a.75.75 0 00.5-.707V4.262a9.735 9.735 0 00-3.25-.555 9.707 9.707 0 00-5.25 1.533v16.103z" />
                        </svg>
                    </div>
                    <span class="font-heading text-lg font-bold text-white">Hon</span>
                </div>
                
                <p class="text-sm text-gray-500">© 2025 Hon Inc. All rights reserved.</p>
                
                <div class="flex gap-6 text-sm text-gray-400">
                    <a href="#" class="hover:text-white transition-colors">About Us</a>
                    <a href="#" class="hover:text-white transition-colors">Contact</a>
                    <a href="#" class="hover:text-white transition-colors">Privacy Policy</a>
                </div>
            </div>
        </footer>
    </body>
</html>
