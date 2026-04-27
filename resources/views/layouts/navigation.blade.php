<nav class="relative glass border-b border-white/20 dark:border-white/5 z-50 transition-all duration-500" style="z-index: 999;">
    <div class="px-6 sm:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center gap-6">
                <!-- Sidebar Toggle -->
                <div class="-ms-2 me-2 flex items-center md:hidden">
                    <button @click="sidebarOpen = !sidebarOpen" class="inline-flex items-center justify-center p-3 rounded-2xl text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-300">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- Live Counter -->
                @php
                    $liveCount = \App\Models\Visit::real()->where('created_at', '>=', now()->subMinutes(5))->distinct('ip_address')->count();
                @endphp
                <div class="hidden sm:flex items-center gap-3 px-4 py-2 rounded-2xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-600 dark:text-emerald-400 text-[10px] font-black tracking-widest animate-pulse">
                    <span class="relative flex h-2 w-2">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                    </span>
                    <span>{{ strtoupper(__('Live')) }} {{ $liveCount }}</span>
                </div>
            </div>

            <div class="flex items-center space-x-4 rtl:space-x-reverse">
                <!-- Zen Mode (Focus) Toggle -->
                <button @click="focusMode = true" class="p-3 rounded-2xl text-gray-400 hover:text-amber-600 dark:hover:text-amber-400 hover:bg-amber-50 dark:hover:bg-amber-900/20 transition-all duration-300 group" title="Zen Mode">
                    <i class="fas fa-compress-arrows-alt text-lg group-hover:scale-110"></i>
                </button>

                <!-- Smart Notifications Bell -->
                <div class="relative" x-data="{ 
                    open: false, 
                    count: 0, 
                    latest: [],
                    async fetchUnread() {
                        const res = await fetch('{{ route('admin.notifications.unread-count') }}');
                        const data = await res.json();
                        this.count = data.count;
                        this.latest = data.latest;
                    }
                }" x-init="fetchUnread(); setInterval(() => fetchUnread(), 60000)">
                    <button @click="open = !open" class="p-3 rounded-2xl text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-300 relative group">
                        <i class="fas fa-bell text-lg group-hover:rotate-12 transition-transform"></i>
                        <template x-if="count > 0">
                            <span class="absolute top-2 right-2 flex h-4 w-4">
                                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                                <span class="relative inline-flex rounded-full h-4 w-4 bg-rose-500 text-[8px] font-black text-white items-center justify-center" x-text="count"></span>
                            </span>
                        </template>
                    </button>

                    <div x-show="open" @click.away="open = false" x-cloak class="absolute end-0 mt-4 w-80 premium-card !p-4 z-50 animate-in fade-in slide-in-from-top-2">
                        <div class="flex items-center justify-between mb-4 px-2">
                            <h4 class="font-black text-sm uppercase tracking-widest text-gray-400">{{ __('Latest Alerts') }}</h4>
                            <a href="{{ route('admin.notifications.index') }}" class="text-[10px] font-black text-indigo-600 dark:text-indigo-400 hover:underline">{{ __('View All') }}</a>
                        </div>
                        
                        <div class="space-y-2 max-h-96 overflow-y-auto custom-scrollbar pr-1">
                            <template x-for="n in latest" :key="n.id">
                                <div class="p-3 rounded-2xl bg-white/50 dark:bg-slate-800/50 border border-transparent hover:border-indigo-500/20 transition-all">
                                    <div class="flex gap-3">
                                        <div :class="{
                                            'text-amber-500': n.type === 'trend',
                                            'text-purple-500': n.type === 'milestone',
                                            'text-emerald-500': n.type === 'success',
                                            'text-rose-500': n.type === 'warning'
                                        }" class="mt-1">
                                            <i class="fas" :class="{
                                                'fa-chart-line': n.type === 'trend',
                                                'fa-trophy': n.type === 'milestone',
                                                'fa-check-circle': n.type === 'success',
                                                'fa-exclamation-triangle': n.type === 'warning'
                                            }"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-xs font-bold text-slate-800 dark:text-slate-200" x-text="n.title"></p>
                                            <p class="text-[10px] text-gray-500 mt-0.5 line-clamp-2" x-text="n.message"></p>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>

                <!-- Theme Switcher -->
                <button @click="
                    document.documentElement.classList.toggle('dark');
                    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
                " class="p-3 rounded-2xl text-gray-400 hover:text-indigo-600 dark:hover:text-indigo-400 hover:bg-indigo-50 dark:hover:bg-indigo-900/20 transition-all duration-300 group">
                    <i class="fas fa-sun block dark:hidden text-lg text-amber-500 group-hover:rotate-45 transition-transform duration-500"></i>
                    <i class="fas fa-moon hidden dark:block text-lg text-indigo-400 group-hover:-rotate-12 transition-transform duration-500"></i>
                </button>

                <!-- Language Switcher -->
                <div class="flex items-center">
                     @if(app()->getLocale() == 'ar')
                        <a href="{{ route('lang.switch', 'en') }}" class="px-4 py-2 text-xs font-black text-gray-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 border border-white/20 dark:border-white/5 rounded-2xl bg-white/50 dark:bg-slate-800/50 shadow-sm hover:shadow-md">EN</a>
                    @else
                        <a href="{{ route('lang.switch', 'ar') }}" class="px-4 py-2 text-sm font-black font-cairo text-gray-500 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400 transition-all duration-300 border border-white/20 dark:border-white/5 rounded-2xl bg-white/50 dark:bg-slate-800/50 shadow-sm hover:shadow-md">عربي</a>
                    @endif
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center gap-3 px-4 py-2 border border-white/20 dark:border-white/5 text-sm font-bold rounded-2xl text-slate-700 dark:text-slate-200 bg-white/50 dark:bg-slate-800/50 hover:bg-white dark:hover:bg-slate-800 transition-all duration-300 shadow-sm hover:shadow-md">
                            <div class="w-8 h-8 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                                <i class="fas fa-user-circle"></i>
                            </div>
                            <div class="hidden sm:block text-start">
                                <div class="text-xs font-black leading-none mb-0.5">{{ Auth::user()->name }}</div>
                                <div class="text-[9px] text-gray-400 dark:text-slate-500 uppercase tracking-tighter">{{ Auth::user()->role }}</div>
                            </div>
                            <i class="fas fa-chevron-down text-[10px] opacity-30"></i>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <div class="p-2 space-y-1">
                            <x-dropdown-link :href="route('admin.profile.edit')" class="rounded-xl font-bold">
                                <i class="fas fa-user-edit me-2 opacity-50"></i> {{ __('Profile') }}
                            </x-dropdown-link>

                            <div class="border-t border-gray-100 dark:border-slate-800 my-1"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                        class="rounded-xl font-bold text-rose-600 dark:text-rose-400 hover:bg-rose-50 dark:hover:bg-rose-900/20"
                                        onclick="event.preventDefault(); this.closest('form').submit();">
                                    <i class="fas fa-sign-out-alt me-2 opacity-50"></i> {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </div>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
    <!-- Mobile Menu -->
    <div x-show="sidebarOpen" class="md:hidden border-t border-gray-200 bg-white">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <!-- Blog Dropdown for Mobile -->
            <div x-data="{ open: {{ request()->routeIs('admin.posts.*') || request()->routeIs('admin.categories.*') || request()->routeIs('admin.tags.*') ? 'true' : 'false' }} }" class="border-t border-gray-100 border-b">
                <button @click="open = !open" class="w-full flex items-center justify-between pl-3 pr-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none transition duration-150 ease-in-out">
                    <span>{{ __('Blog') }}</span>
                    <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="open ? 'transform rotate-180' : ''"></i>
                </button>
                <div x-show="open" class="space-y-1 pl-4 rtl:pr-4 rtl:pl-0 bg-gray-50">
                    <x-responsive-nav-link :href="route('admin.posts.index')" :active="request()->routeIs('admin.posts.*')">
                        {{ __('Manage Posts') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.categories.index')" :active="request()->routeIs('admin.categories.*')">
                        {{ __('Categories') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.tags.index')" :active="request()->routeIs('admin.tags.*')">
                        {{ __('Tags') }}
                    </x-responsive-nav-link>
                </div>
            </div>

            <x-responsive-nav-link :href="route('admin.projects.index')" :active="request()->routeIs('admin.projects.*')">
                {{ __('Projects') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.skills.index')" :active="request()->routeIs('admin.skills.*')">
                {{ __('Skills') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                {{ __('Manage Users') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('admin.settings.index')" :active="request()->routeIs('admin.settings.*')">
                {{ __('Settings') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
