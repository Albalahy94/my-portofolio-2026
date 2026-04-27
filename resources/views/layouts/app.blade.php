<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Said Albalahy') }}</title>
        <link rel="icon" type="image/png" href="{{ asset('logo.png') }}">
        <link rel="shortcut icon" href="{{ asset('logo.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Custom Styles for Modern Dashboard -->
    <style>
        [x-cloak] { display: none !important; }
        @font-face {
            font-family: 'Cairo';
            font-display: swap;
        }
        @font-face {
            font-family: 'Outfit';
            font-display: swap;
        }
    </style>

    <script>
        // Theme Management
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="font-sans antialiased bg-zinc-50 dark:bg-slate-950 text-slate-900 dark:text-slate-200 transition-colors duration-500">
        <div class="min-h-screen bg-zinc-50/50 dark:bg-slate-950 flex transition-all duration-500" 
             x-data="{ 
                sidebarOpen: window.innerWidth >= 768,
                focusMode: false,
                darkMode: localStorage.getItem('theme') === 'dark',
                toggleTheme() {
                    this.darkMode = !this.darkMode;
                    if (this.darkMode) {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('theme', 'light');
                    }
                },
                init() {
                    window.addEventListener('resize', () => {
                        if (window.innerWidth < 768) {
                            this.sidebarOpen = false;
                        } else {
                            this.sidebarOpen = true;
                        }
                    });
                }
             }">
            
            <!-- Sidebar -->
            <div x-show="!focusMode" x-cloak>
                @include('layouts.sidebar')
            </div>

            <!-- Main Content Area -->
            <div class="flex-1 flex flex-col min-w-0 overflow-hidden bg-zinc-50 dark:bg-slate-950">
                
                <!-- Top Header (Navigation) -->
                <div x-show="!focusMode" x-cloak>
                    @include('layouts.navigation')
                </div>

                <!-- Main Content -->
                <main class="flex-1 overflow-y-auto p-4 md:p-8 page-entry">
                    <!-- Page Heading -->
                    @isset($header)
                        <header class="premium-card mb-8 !p-6 shadow-indigo-500/5">
                            <div class="max-w-7xl mx-auto">
                                {{ $header }}
                            </div>
                        </header>
                    @endisset

                    <div class="max-w-7xl mx-auto">
                        {{ $slot }}
                    </div>
                </main>
            </div>

            <!-- Exit Focus Mode Button -->
            <button x-show="focusMode" 
                    @click="focusMode = false" 
                    class="fixed bottom-8 right-8 bg-indigo-600 hover:bg-indigo-700 text-white p-4 rounded-full shadow-2xl z-50 transition-all duration-300 hover:scale-110 group flex items-center gap-2"
                    x-cloak>
                <i class="fas fa-expand-arrows-alt text-xl group-hover:rotate-12"></i>
                <span class="ms-2 font-bold hidden group-hover:inline">{{ __('Exit Zen Mode') }}</span>
            </button>
        </div>
        
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.onmouseenter = Swal.stopTimer;
                        toast.onmouseleave = Swal.resumeTimer;
                    }
                });

                @if(session('success'))
                    Toast.fire({
                        icon: 'success',
                        title: "{{ session('success') }}"
                    });
                @endif

                @if(session('error'))
                    Toast.fire({
                        icon: 'error',
                        title: "{{ session('error') }}"
                    });
                @endif

                // Global Delete Confirmation
                document.body.addEventListener('submit', function(e) {
                    const form = e.target;
                    if (form.classList.contains('delete-form')) {
                        e.preventDefault();
                        Swal.fire({
                            title: '{{ __("Are you sure?") }}',
                            text: '{{ __("You wont be able to revert this!") }}',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#d33',
                            cancelButtonColor: '#3085d6',
                            confirmButtonText: '{{ __("Yes, delete it!") }}',
                            cancelButtonText: '{{ __("Cancel") }}'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    }
                });
            });
        </script>
        <!-- Cropper.js -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.6.1/cropper.min.js"></script>
        @livewireScripts
    </body>
</html>
