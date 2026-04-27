<div class="hidden md:flex glass dark:bg-slate-900/80 text-slate-800 dark:text-slate-200 flex-col transition-all duration-500 ease-in-out z-50 flex-shrink-0 overflow-hidden w-72 border-e border-white/20 dark:border-white/5"
     :style="sidebarOpen ? 'margin-inline-start: 0' : 'margin-inline-start: -18rem'"
>
    <!-- Logo & Close Button -->
    <div class="h-20 flex items-center justify-between px-8 border-b border-white/20 dark:border-white/5 whitespace-nowrap">
        <a href="{{ route('admin.dashboard') }}" wire:navigate class="flex items-center gap-3 group">
            <div class="p-2 bg-white dark:bg-slate-800 rounded-2xl shadow-lg group-hover:scale-110 transition-transform duration-500">
                <img src="{{ asset('logo.png') }}" class="h-8 w-auto" alt="Logo">
            </div>
            <span class="font-black text-2xl tracking-tight bg-gradient-to-r from-indigo-600 to-violet-600 bg-clip-text text-transparent">Admin</span>
        </a>
    </div>

    <!-- Nav Links -->
    <nav class="flex-1 overflow-y-auto py-8 space-y-2 px-4 custom-scrollbar">
        
        <x-sidebar-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')" icon="fas fa-tachometer-alt">
            {{ __('Dashboard') }}
        </x-sidebar-link>

        @if(auth()->user()->isEditor() || auth()->user()->isModerator())
        <x-sidebar-link :href="route('admin.tasks.index')" :active="request()->routeIs('admin.tasks.index')" icon="fas fa-tasks">
            {{ __('Task Manager') }}
        </x-sidebar-link>
        @endif

        @if(auth()->user()->isAdmin())
        <x-sidebar-link :href="route('admin.analytics.index')" :active="request()->routeIs('admin.analytics.index')" icon="fas fa-chart-line">
            {{ __('Analytics') }}
        </x-sidebar-link>
        @endif

        @if(auth()->user()->isEditor())
        <div class="pt-4 pb-2 px-4">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 dark:text-slate-500">{{ __('Content') }}</span>
        </div>
        
        <x-sidebar-link :href="route('admin.short-links.index')" :active="request()->routeIs('admin.short-links.index')" icon="fas fa-link">
            {{ __('Short Links') }}
        </x-sidebar-link>

        <div x-data="{ open: {{ request()->routeIs('admin.posts.*') || request()->routeIs('admin.categories.*') || request()->routeIs('admin.tags.*') ? 'true' : 'false' }} }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl text-gray-500 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-newspaper w-5 text-center transition-transform duration-300 group-hover:scale-110"></i>
                    <span class="font-bold">{{ __('Blog') }}</span>
                </div>
                <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open ? 'transform rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="mt-1 space-y-1 px-2">
                <x-sidebar-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')" icon="fas fa-circle text-[6px]" class="text-sm">
                    {{ __('Manage Posts') }}
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')" icon="fas fa-circle text-[6px]" class="text-sm">
                    {{ __('Categories') }}
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.tags.index')" :active="request()->routeIs('admin.tags.*')" icon="fas fa-circle text-[6px]" class="text-sm">
                    {{ __('Tags') }}
                </x-sidebar-link>
            </div>
        </div>

        <x-sidebar-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')" icon="fas fa-briefcase">
            {{ __('Projects') }}
        </x-sidebar-link>
        @endif

        @if(auth()->user()->isAdmin())
        <div class="pt-4 pb-2 px-4">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 dark:text-slate-500">{{ __('System') }}</span>
        </div>

        <x-sidebar-link :href="route('admin.skills.index')" :active="request()->routeIs('admin.skills.*')" icon="fas fa-code">
            {{ __('Skills') }}
        </x-sidebar-link>
        
        <x-sidebar-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')" icon="fas fa-users">
            {{ __('Manage Users') }}
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*')" icon="fas fa-cog">
            {{ __('Settings') }}
        </x-sidebar-link>

        <x-sidebar-link :href="route('admin.health.index')" :active="request()->routeIs('admin.health.index')" icon="fas fa-heartbeat">
            {{ __('Health Hub') }}
        </x-sidebar-link>
        @endif

        @if(auth()->user()->isModerator())
        <div class="pt-4 pb-2 px-4">
            <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 dark:text-slate-500">{{ __('Community') }}</span>
        </div>

        <!-- Community Dropdown -->
        <div x-data="{ open: {{ request()->routeIs('admin.comments.*') || request()->routeIs('admin.reviews.*') ? 'true' : 'false' }} }">
            <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3.5 rounded-2xl text-gray-500 dark:text-slate-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 group">
                <div class="flex items-center gap-3">
                    <i class="fas fa-users w-5 text-center transition-transform duration-300 group-hover:scale-110"></i>
                    <span class="font-bold">{{ __('Community') }}</span>
                </div>
                <i class="fas fa-chevron-down text-[10px] transition-transform duration-300" :class="open ? 'transform rotate-180' : ''"></i>
            </button>
            <div x-show="open" x-cloak class="mt-1 space-y-1 px-2">
                <x-sidebar-link :href="route('admin.comments.index')" :active="request()->routeIs('admin.comments.*')" icon="fas fa-circle text-[6px]" class="text-sm">
                    {{ __('Comments') }}
                </x-sidebar-link>
                <x-sidebar-link :href="route('admin.reviews.index')" :active="request()->routeIs('admin.reviews.*')" icon="fas fa-circle text-[6px]" class="text-sm">
                    {{ __('Reviews') }}
                </x-sidebar-link>
            </div>
        </div>
        @endif

    </nav>

    <!-- User & Logout -->
    <div class="border-t border-white/20 dark:border-white/5 p-6 bg-gray-50/50 dark:bg-slate-900/50">
        <div class="flex items-center gap-4 mb-6 px-4 py-3 rounded-[1.5rem] bg-white dark:bg-slate-800 shadow-xl shadow-indigo-500/5">
            <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-indigo-600 to-violet-600 flex items-center justify-center text-white font-black shadow-lg shadow-indigo-500/20">
                {{ substr(Auth::user()->name, 0, 1) }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-black text-slate-800 dark:text-white truncate">{{ Auth::user()->name }}</p>
                <p class="text-[10px] font-bold text-gray-500 dark:text-slate-500 truncate uppercase tracking-wider">{{ Auth::user()->role }}</p>
            </div>
        </div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full flex items-center gap-3 px-6 py-3.5 text-gray-500 dark:text-slate-400 hover:text-rose-600 dark:hover:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/10 rounded-2xl transition-all duration-300 font-bold group">
                <i class="fas fa-sign-out-alt w-5 text-center group-hover:translate-x-1 transition-transform rtl:group-hover:-translate-x-1"></i>
                <span>{{ __('Log Out') }}</span>
            </button>
        </form>
    </div>
</div>
