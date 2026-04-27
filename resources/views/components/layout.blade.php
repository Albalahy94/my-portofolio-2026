<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))">
    <title>@yield('title', __('Said Albalahy'))</title>
    <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', __('Said Albalahy'))">
    <meta property="og:description" content="@yield('meta_description', __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))">
    <meta property="og:image" content="@yield('meta_image', asset('images/personal_preview.png'))">

    <!-- Schema.org for Google -->
    <meta itemprop="name" content="@yield('title', __('Said Albalahy'))">
    <meta itemprop="description" content="@yield('meta_description', __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))">
    <meta itemprop="image" content="@yield('meta_image', asset('images/personal_preview.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', __('Said Albalahy'))">
    <meta property="twitter:description" content="@yield('meta_description', __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))">
    <meta property="twitter:image" content="@yield('meta_image', asset('images/personal_preview.png'))">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    
    <style>
        :root {
            --color-primary-500: {{ $activeTheme['colors']['primary'] }};
            --color-accent-500: {{ $activeTheme['colors']['accent'] }};
            --color-bg-950: {{ $activeTheme['colors']['bg'] }};
        }
    </style>
    <script>
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-slate-50 dark:bg-dark-950 text-slate-800 dark:text-white font-cairo antialiased overflow-x-hidden ltr:text-left rtl:text-right transition-colors duration-500">
    <canvas id="particles-canvas" class="fixed inset-0 -z-40 pointer-events-none"></canvas>

    <!-- Calm Background Animation -->
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        <div class="absolute top-0 start-1/4 w-96 h-96 bg-primary-900/20 rounded-full blur-[100px] animate-pulse" style="animation-duration: 10s;"></div>
        <div class="absolute bottom-0 end-1/4 w-96 h-96 bg-accent-900/20 rounded-full blur-[100px] animate-pulse" style="animation-duration: 15s; animation-delay: 2s;"></div>
    </div>

    <!-- Header -->
    <header x-data="{ mobileMenuOpen: false }" class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text hover:scale-105 transition-transform">
                {{ __('Said Albalahy') }}
            </a>
            
            <div class="hidden md:flex gap-8 items-center">
                <a href="{{ route('home') }}#about" class="nav-link text-slate-600 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('About') }}</a>
                <a href="{{ route('home') }}#skills" class="nav-link text-slate-600 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Skills') }}</a>
                <a href="{{ route('home') }}#projects" class="nav-link text-slate-600 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Projects') }}</a>
                <a href="{{ route('blog.index') }}" class="nav-link text-slate-600 dark:text-gray-300 hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Blog') }}</a>
                <a href="{{ route('home') }}#contact" class="btn-primary py-2 px-4 !rounded-full text-sm">{{ __('Contact') }}</a>
                
                <div class="w-px h-6 bg-slate-200 dark:bg-white/10 mx-2"></div>
                
                <!-- Authentication Links -->
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isEditor() || auth()->user()->isModerator())
                        <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('dashboard') }}" class="text-sm font-bold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300">{{ __('Dashboard') }}</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="text-sm font-bold text-slate-600 dark:text-gray-300 hover:text-primary-500">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}" class="text-sm font-bold text-slate-600 dark:text-gray-300 hover:text-primary-500">{{ __('Register') }}</a>
                @endauth
                
                <div class="w-px h-6 bg-slate-200 dark:bg-white/10 mx-2"></div>

                <!-- Theme Toggle -->
                <button onclick="toggleTheme()" class="text-slate-600 dark:text-gray-300 hover:text-primary-500 transition-colors w-8 h-8 flex items-center justify-center rounded-full hover:bg-slate-100 dark:hover:bg-white/5">
                    <i class="fas fa-moon hidden dark:block"></i>
                    <i class="fas fa-sun block dark:hidden"></i>
                </button>

                <!-- Language Switcher -->
                @if(app()->getLocale() == 'ar')
                    <a href="{{ route('lang.switch', 'en') }}" class="text-slate-600 dark:text-gray-300 hover:text-primary-500 font-bold">EN</a>
                @else
                    <a href="{{ route('lang.switch', 'ar') }}" class="text-slate-600 dark:text-gray-300 hover:text-primary-500 font-bold">عربي</a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button @click="mobileMenuOpen = !mobileMenuOpen" class="md:hidden text-2xl text-slate-800 dark:text-gray-300 focus:outline-none">
                <i class="fas fa-bars" x-show="!mobileMenuOpen"></i>
                <i class="fas fa-times" x-show="mobileMenuOpen" x-cloak></i>
            </button>
        </nav>

        <!-- Mobile Menu Dropdown -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             @click.away="mobileMenuOpen = false"
             class="md:hidden absolute top-full left-0 right-0 bg-white dark:bg-slate-900 border-b border-slate-200 dark:border-white/5 shadow-xl"
             x-cloak>
            <div class="container mx-auto px-6 py-4 flex flex-col gap-4">
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#about" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('About') }}</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#skills" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('Skills') }}</a>
                <a @click="mobileMenuOpen = false" href="{{ route('home') }}#projects" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('Projects') }}</a>
                <a @click="mobileMenuOpen = false" href="{{ route('blog.index') }}" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('Blog') }}</a>
                
                <div class="h-px bg-slate-200 dark:bg-white/10 w-full my-2"></div>
                
                @auth
                    @if(auth()->user()->isAdmin() || auth()->user()->isEditor() || auth()->user()->isModerator())
                        <a @click="mobileMenuOpen = false" href="{{ route('admin.dashboard') }}" class="text-lg font-bold text-primary-600 dark:text-primary-400">{{ __('Dashboard') }}</a>
                    @else
                        <a @click="mobileMenuOpen = false" href="{{ route('dashboard') }}" class="text-lg font-bold text-primary-600 dark:text-primary-400">{{ __('Dashboard') }}</a>
                    @endif
                @else
                    <a @click="mobileMenuOpen = false" href="{{ route('login') }}" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('Login') }}</a>
                    <a @click="mobileMenuOpen = false" href="{{ route('register') }}" class="text-lg font-bold text-slate-800 dark:text-white">{{ __('Register') }}</a>
                @endauth

                <div class="h-px bg-slate-200 dark:bg-white/10 w-full my-2"></div>
                
                <div class="flex items-center gap-4">
                    <button onclick="toggleTheme(); document.querySelector('[x-data]').__x.$data.mobileMenuOpen = false" class="text-slate-800 dark:text-white flex items-center gap-2">
                        <i class="fas fa-moon hidden dark:block"></i>
                        <i class="fas fa-sun block dark:hidden"></i>
                        <span class="font-bold">{{ __('Toggle Theme') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </header>

    <main class="transition-opacity duration-500">
        {{ $slot }}
    </main>

    <!-- Floating Contact Widget -->
    <x-floating-widget />

    <!-- Footer -->
    <footer class="bg-white dark:bg-dark-900/50 border-t border-slate-200 dark:border-white/5 py-12 mt-20 transition-colors duration-500">
        <div class="container mx-auto px-6 text-center">
            <div class="flex flex-wrap justify-center gap-6 mb-8 text-sm text-slate-500 dark:text-gray-400">
                <a href="{{ route('privacy') }}" wire:navigate class="hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Privacy Policy') }}</a>
                <a href="{{ route('terms') }}" wire:navigate class="hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Terms') }}</a>
                <a href="{{ route('contact') }}" wire:navigate class="hover:text-primary-500 dark:hover:text-primary-400 transition-colors">{{ __('Contact') }}</a>
            </div>
            <div class="flex justify-center gap-6 mb-8">
                <a href="https://github.com/Albalahy94" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white text-slate-600 dark:text-gray-300 transition-all">
                    <i class="fab fa-github"></i>
                </a>
                <a href="https://www.linkedin.com/in/said-albalahy-266466216/" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white text-slate-600 dark:text-gray-300 transition-all">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="https://x.com/SaidAlbalahy" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white text-slate-600 dark:text-gray-300 transition-all">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="https://www.facebook.com/said.elbalahy" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white text-slate-600 dark:text-gray-300 transition-all">
                    <i class="fab fa-facebook"></i>
                </a>
                <a href="https://www.youtube.com/@saidalbalahy" class="w-10 h-10 rounded-full bg-slate-100 dark:bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white text-slate-600 dark:text-gray-300 transition-all">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <p class="text-slate-500 dark:text-gray-400">
                {{ __('Made with') }} <i class="fas fa-heart text-accent-500 mx-1"></i> {{ __('by') }} <span class="gradient-text font-bold">{{ __('Said Albalahy') }}</span>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        // Initialize AOS
        function initAOS() {
            AOS.init({
                duration: 800,
                once: true,
                offset: 50
            });
        }

        // Initialize Particles
        function initParticles() {
            const canvas = document.getElementById('particles-canvas');
            if (!canvas) return;

            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            
            // Configuration
            const particleCount = 100;
            const colors = ['#0ea5e9', '#d946ef', '#6366f1'];

            function resize() {
                width = window.innerWidth;
                height = window.innerHeight;
                canvas.width = width;
                canvas.height = height;
            }

            class Particle {
                constructor() {
                    this.x = Math.random() * width;
                    this.y = Math.random() * height;
                    this.vx = (Math.random() - 0.5) * 0.5;
                    this.vy = (Math.random() - 0.5) * 0.5;
                    this.size = Math.random() * 2 + 1;
                    this.color = colors[Math.floor(Math.random() * colors.length)];
                }

                update() {
                    this.x += this.vx;
                    this.y += this.vy;

                    if (this.x < 0 || this.x > width) this.vx *= -1;
                    if (this.y < 0 || this.y > height) this.vy *= -1;
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fillStyle = this.color;
                    ctx.globalAlpha = 0.6;
                    ctx.fill();
                }
            }

            function initAndAnimate() {
                resize();
                particles = [];
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
                
                // Cancel previous animation frame if exists? 
                // Simple implementation: just start loop. 
                // Note: In a robust SPA, we might want to clean up old loops, but for this lightweight script it's okay 
                // provided we don't multiply loops. 
                // Better: assign ID to window to cancel it.
            }

            if (window.particleAnimationId) {
                cancelAnimationFrame(window.particleAnimationId);
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                particles.forEach(p => {
                    p.update();
                    p.draw();
                });
                window.particleAnimationId = requestAnimationFrame(animate);
            }

            window.addEventListener('resize', resize);
            initAndAnimate();
            animate();
        }

        // Header Scroll Effect
        function initHeaderScroll() {
            window.addEventListener('scroll', () => {
                const header = document.getElementById('main-header');
                if (!header) return;
                if (window.scrollY > 50) {
                    header.classList.add('bg-white/90', 'dark:bg-dark-950/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-slate-200', 'dark:border-white/5');
                } else {
                    header.classList.remove('bg-white/90', 'dark:bg-dark-950/80', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-slate-200', 'dark:border-white/5');
                }
            });
        }
        
        // Theme Toggle Function
        window.toggleTheme = function() {
            if (document.documentElement.classList.contains('dark')) {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }
        }

        // Initial Load
        document.addEventListener('DOMContentLoaded', () => {
            initAOS();
            initParticles();
            initHeaderScroll();
        });

        // Livewire Navigation Handling
        document.addEventListener('livewire:navigated', () => {
            initAOS(); 
            // Particles are on the body/fixed background, they might persist, 
            // but if the canvas is wiped or we want to ensure they are there:
            // initParticles(); // Canvas is outside main slot, so it should persist.
            // Header scroll listener might need re-attaching if header was re-rendered, 
            // but header is also outside main slot.
            
            // However, AOS definitely needs re-init for new elements.
        });
    </script>
    @livewireScripts
</body>
</html>
