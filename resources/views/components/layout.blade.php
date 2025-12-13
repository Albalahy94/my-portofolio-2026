<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))">
    <title>@yield('title', __('Said Albalahy'))</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- AOS -->
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <style>
        :root {
            --color-primary-500: {{ $activeTheme['colors']['primary'] }};
            --color-accent-500: {{ $activeTheme['colors']['accent'] }};
            --color-bg-950: {{ $activeTheme['colors']['bg'] }};
        }
    </style>
</head>
<body class="bg-dark-950 text-white font-cairo antialiased overflow-x-hidden">
    <canvas id="particles-canvas" class="fixed inset-0 -z-40 pointer-events-none"></canvas>

    <!-- Calm Background Animation -->
    <div class="fixed inset-0 -z-50 overflow-hidden pointer-events-none">
        <div class="absolute top-0 start-1/4 w-96 h-96 bg-primary-900/20 rounded-full blur-[100px] animate-pulse" style="animation-duration: 10s;"></div>
        <div class="absolute bottom-0 end-1/4 w-96 h-96 bg-accent-900/20 rounded-full blur-[100px] animate-pulse" style="animation-duration: 15s; animation-delay: 2s;"></div>
    </div>

    <!-- Header -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="main-header">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-2xl font-bold gradient-text hover:scale-105 transition-transform">
                {{ __('Said Albalahy') }}
            </a>
            
            <div class="hidden md:flex gap-8 items-center">
                <a href="{{ route('home') }}#about" class="nav-link text-gray-300 hover:text-primary-400 transition-colors">{{ __('About') }}</a>
                <a href="{{ route('home') }}#skills" class="nav-link text-gray-300 hover:text-primary-400 transition-colors">{{ __('Skills') }}</a>
                <a href="{{ route('home') }}#projects" class="nav-link text-gray-300 hover:text-primary-400 transition-colors">{{ __('Projects') }}</a>
                <a href="{{ route('blog.index') }}" class="nav-link text-gray-300 hover:text-primary-400 transition-colors">{{ __('Blog') }}</a>
                <a href="{{ route('home') }}#contact" class="btn-primary py-2 px-4 !rounded-full text-sm">{{ __('Contact') }}</a>
                
                <!-- Language Switcher -->
                @if(app()->getLocale() == 'ar')
                    <a href="{{ route('lang.switch', 'en') }}" class="text-gray-300 hover:text-white font-bold">EN</a>
                @else
                    <a href="{{ route('lang.switch', 'ar') }}" class="text-gray-300 hover:text-white font-bold">عربي</a>
                @endif
            </div>

            <!-- Mobile Menu Button -->
            <button class="md:hidden text-2xl text-gray-300">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>

    <main id="swup" class="transition-opacity duration-500">
        {{ $slot }}
    </main>

    <!-- Floating Contact Widget -->
    <x-floating-widget />

    <!-- Footer -->
    <footer class="bg-dark-900/50 border-t border-white/5 py-12 mt-20">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center gap-6 mb-8">
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all">
                    <i class="fab fa-github"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-primary-500 hover:text-white transition-all">
                    <i class="fab fa-twitter"></i>
                </a>
            </div>
            <p class="text-gray-400">
                {{ __('Made with') }} <i class="fas fa-heart text-accent-500 mx-1"></i> {{ __('by') }} <span class="gradient-text font-bold">{{ __('Said Albalahy') }}</span>
            </p>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 800,
            once: true,
            offset: 50
        });

        // Header Scroll Effect
        window.addEventListener('scroll', () => {
            const header = document.getElementById('main-header');
            if (window.scrollY > 50) {
                header.classList.add('bg-dark-950/80', 'backdrop-blur-md', 'border-b', 'border-white/5');
            } else {
                header.classList.remove('bg-dark-950/80', 'backdrop-blur-md', 'border-b', 'border-white/5');
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const canvas = document.getElementById('particles-canvas');
            if (!canvas) {
                console.error('Canvas not found');
                return;
            }

            const ctx = canvas.getContext('2d');
            let width, height;
            let particles = [];
            
            // Configuration
            const particleCount = 100; // Increased count
            const colors = ['#0ea5e9', '#d946ef', '#6366f1']; // Primary, Accent, Indigo

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
                    this.size = Math.random() * 2 + 1; // Slightly larger
                    this.color = colors[Math.floor(Math.random() * colors.length)];
                }

                update() {
                    this.x += this.vx;
                    this.y += this.vy;

                    // Bounce off edges
                    if (this.x < 0 || this.x > width) this.vx *= -1;
                    if (this.y < 0 || this.y > height) this.vy *= -1;
                }

                draw() {
                    ctx.beginPath();
                    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                    ctx.fillStyle = this.color;
                    ctx.globalAlpha = 0.6; // More beneficial
                    ctx.fill();
                }
            }

            function init() {
                resize();
                particles = [];
                for (let i = 0; i < particleCount; i++) {
                    particles.push(new Particle());
                }
            }

            function animate() {
                ctx.clearRect(0, 0, width, height);
                particles.forEach(p => {
                    p.update();
                    p.draw();
                });
                requestAnimationFrame(animate);
            }

            window.addEventListener('resize', () => {
                resize();
                // Optionally re-init particles or just let them be
            });

            init();
            animate();
            console.log('Particles started');
        });
    </script>
</body>
</html>
