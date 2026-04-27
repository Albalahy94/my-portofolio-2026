<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 max-w-6xl mx-auto space-y-10">

        {{-- Welcome Banner --}}
        <div class="premium-card relative overflow-hidden !p-8 bg-gradient-to-br from-indigo-600/90 to-violet-600/90 text-white border-0">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-white rounded-full -translate-y-1/2 translate-x-1/2"></div>
                <div class="absolute bottom-0 left-0 w-48 h-48 bg-white rounded-full translate-y-1/2 -translate-x-1/2"></div>
            </div>
            <div class="relative z-10 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-6">
                <div>
                    <p class="text-indigo-200 text-sm font-bold uppercase tracking-widest mb-2">{{ __('Welcome back') }} 👋</p>
                    <h1 class="text-3xl md:text-4xl font-black mb-2">{{ $user->name }}</h1>
                    <p class="text-indigo-200 text-sm">{{ $user->email }}</p>
                </div>
                <div class="flex items-center gap-4">
                    <div class="w-20 h-20 rounded-3xl bg-white/20 backdrop-blur-sm flex items-center justify-center text-4xl font-black border-2 border-white/30">
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    </div>
                </div>
            </div>
        </div>

        {{-- Stats Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            <div class="premium-card relative overflow-hidden group/item">
                <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-black uppercase text-indigo-600 dark:text-indigo-400 tracking-[0.2em]">{{ __('My Comments') }}</span>
                        <div class="w-10 h-10 rounded-2xl bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500">
                            <i class="fas fa-comment text-indigo-600 dark:text-indigo-400"></i>
                        </div>
                    </div>
                    <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $stats['total_comments'] }}</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">{{ __('Comments submitted') }}</p>
                </div>
            </div>

            <div class="premium-card relative overflow-hidden group/item">
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-black uppercase text-emerald-600 dark:text-emerald-400 tracking-[0.2em]">{{ __('My Reviews') }}</span>
                        <div class="w-10 h-10 rounded-2xl bg-emerald-100 dark:bg-emerald-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500">
                            <i class="fas fa-star text-emerald-600 dark:text-emerald-400"></i>
                        </div>
                    </div>
                    <h4 class="text-4xl font-black text-slate-800 dark:text-white">{{ $stats['total_reviews'] }}</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">{{ __('Reviews left') }}</p>
                </div>
            </div>

            <div class="premium-card relative overflow-hidden group/item">
                <div class="absolute inset-0 bg-gradient-to-br from-amber-500/10 to-transparent"></div>
                <div class="relative z-10">
                    <div class="flex items-center justify-between mb-4">
                        <span class="text-[10px] font-black uppercase text-amber-600 dark:text-amber-400 tracking-[0.2em]">{{ __('Member Since') }}</span>
                        <div class="w-10 h-10 rounded-2xl bg-amber-100 dark:bg-amber-900/50 flex items-center justify-center group-hover/item:scale-110 transition-transform duration-500">
                            <i class="fas fa-calendar text-amber-600 dark:text-amber-400"></i>
                        </div>
                    </div>
                    <h4 class="text-2xl font-black text-slate-800 dark:text-white">{{ $user->created_at->format('M Y') }}</h4>
                    <p class="text-slate-500 dark:text-slate-400 text-xs mt-1">{{ $user->created_at->diffForHumans() }}</p>
                </div>
            </div>
        </div>

        {{-- Quick Links --}}
        <div class="premium-card">
            <h3 class="text-xl font-black text-slate-800 dark:text-white mb-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-indigo-600 rounded-2xl flex items-center justify-center shadow-lg shadow-indigo-500/20">
                    <i class="fas fa-rocket text-white text-sm"></i>
                </div>
                {{ __('Explore') }}
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                <a href="{{ route('blog.index') }}" wire:navigate
                   class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-300 border border-transparent hover:border-indigo-200 dark:hover:border-indigo-800">
                    <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-newspaper text-indigo-600 dark:text-indigo-400"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-slate-800 dark:text-white text-sm">{{ __('Blog') }}</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ __('Read latest articles') }}</p>
                    </div>
                    <i class="fas fa-arrow-right rtl:rotate-180 ms-auto text-slate-300 dark:text-slate-600 group-hover:text-indigo-500 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all"></i>
                </a>

                <a href="{{ route('projects.index') }}" wire:navigate
                   class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 hover:bg-emerald-50 dark:hover:bg-emerald-900/20 transition-all duration-300 border border-transparent hover:border-emerald-200 dark:hover:border-emerald-800">
                    <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-briefcase text-emerald-600 dark:text-emerald-400"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-slate-800 dark:text-white text-sm">{{ __('Projects') }}</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ __('Browse portfolio') }}</p>
                    </div>
                    <i class="fas fa-arrow-right rtl:rotate-180 ms-auto text-slate-300 dark:text-slate-600 group-hover:text-emerald-500 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all"></i>
                </a>

                <a href="{{ route('admin.profile.edit') }}" wire:navigate
                   class="group flex items-center gap-4 p-4 rounded-2xl bg-slate-50 dark:bg-slate-800/50 hover:bg-violet-50 dark:hover:bg-violet-900/20 transition-all duration-300 border border-transparent hover:border-violet-200 dark:hover:border-violet-800">
                    <div class="w-12 h-12 bg-violet-100 dark:bg-violet-900/50 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform">
                        <i class="fas fa-user-edit text-violet-600 dark:text-violet-400"></i>
                    </div>
                    <div>
                        <h4 class="font-black text-slate-800 dark:text-white text-sm">{{ __('My Profile') }}</h4>
                        <p class="text-xs text-slate-500 dark:text-slate-400">{{ __('Edit your account') }}</p>
                    </div>
                    <i class="fas fa-arrow-right rtl:rotate-180 ms-auto text-slate-300 dark:text-slate-600 group-hover:text-violet-500 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-all"></i>
                </a>
            </div>
        </div>

        {{-- Account Info --}}
        <div class="premium-card">
            <h3 class="text-xl font-black text-slate-800 dark:text-white mb-6 flex items-center gap-3">
                <div class="w-10 h-10 bg-slate-700 dark:bg-slate-600 rounded-2xl flex items-center justify-center shadow-lg">
                    <i class="fas fa-user text-white text-sm"></i>
                </div>
                {{ __('Account Info') }}
            </h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ __('Full Name') }}</label>
                    <p class="text-slate-800 dark:text-white font-bold">{{ $user->name }}</p>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ __('Email Address') }}</label>
                    <p class="text-slate-800 dark:text-white font-bold">{{ $user->email }}</p>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ __('Account Status') }}</label>
                    <p class="inline-flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-black text-sm">{{ __('Active') }}</span>
                    </p>
                </div>
                <div class="space-y-1">
                    <label class="text-[10px] font-black text-slate-400 dark:text-slate-500 uppercase tracking-widest">{{ __('Role') }}</label>
                    <p class="text-slate-800 dark:text-white font-bold capitalize">{{ $user->role ?? 'user' }}</p>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-slate-100 dark:border-slate-800 flex flex-wrap gap-4">
                <a href="{{ route('admin.profile.edit') }}" wire:navigate class="btn-premium-primary !py-2.5 !px-6 text-sm">
                    <i class="fas fa-user-edit"></i>
                    {{ __('Edit Profile') }}
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn-premium-secondary !py-2.5 !px-6 text-sm text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/20">
                        <i class="fas fa-sign-out-alt"></i>
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-app-layout>
