<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Maintenance & Health Hub') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <!-- CPU Load -->
                <div class="glass p-6 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-indigo-100 dark:bg-indigo-900/30 flex items-center justify-center text-indigo-600 dark:text-indigo-400">
                            <i class="fas fa-microchip text-xl"></i>
                        </div>
                        <span class="text-xs font-bold px-2 py-1 rounded-lg {{ $stats['cpu']['load'] > 80 ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                            {{ $stats['cpu']['load'] }}%
                        </span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">{{ __('CPU Load') }}</h3>
                    <div class="mt-4 w-full bg-gray-100 dark:bg-slate-800 rounded-full h-2">
                        <div class="bg-indigo-600 h-2 rounded-full transition-all duration-500" style="width: {{ $stats['cpu']['load'] }}%"></div>
                    </div>
                </div>

                <!-- RAM Usage -->
                <div class="glass p-6 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-blue-100 dark:bg-blue-900/30 flex items-center justify-center text-blue-600 dark:text-blue-400">
                            <i class="fas fa-memory text-xl"></i>
                        </div>
                        <span class="text-xs font-bold px-2 py-1 rounded-lg {{ $stats['ram']['percentage'] > 80 ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                            {{ $stats['ram']['percentage'] }}%
                        </span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">{{ __('RAM Usage') }}</h3>
                    <p class="text-xs text-gray-400 mt-1">{{ $stats['ram']['used'] }} / {{ $stats['ram']['total'] }}</p>
                    <div class="mt-4 w-full bg-gray-100 dark:bg-slate-800 rounded-full h-2">
                        <div class="bg-blue-600 h-2 rounded-full transition-all duration-500" style="width: {{ $stats['ram']['percentage'] }}%"></div>
                    </div>
                </div>

                <!-- Disk Space -->
                <div class="glass p-6 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-white/5">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 rounded-2xl bg-emerald-100 dark:bg-emerald-900/30 flex items-center justify-center text-emerald-600 dark:text-emerald-400">
                            <i class="fas fa-hdd text-xl"></i>
                        </div>
                        <span class="text-xs font-bold px-2 py-1 rounded-lg {{ $stats['disk']['percentage'] > 90 ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                            {{ $stats['disk']['percentage'] }}%
                        </span>
                    </div>
                    <h3 class="text-gray-500 dark:text-gray-400 text-sm font-medium">{{ __('Disk Usage') }} (C:)</h3>
                    <p class="text-xs text-gray-400 mt-1">{{ $stats['disk']['used'] }} / {{ $stats['disk']['total'] }}</p>
                    <div class="mt-4 w-full bg-gray-100 dark:bg-slate-800 rounded-full h-2">
                        <div class="bg-emerald-600 h-2 rounded-full transition-all duration-500" style="width: {{ $stats['disk']['percentage'] }}%"></div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- System Actions -->
                <div class="glass p-8 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-white/5">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                        <i class="fas fa-tools text-indigo-500"></i>
                        {{ __('System Actions') }}
                    </h3>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 hover:border-indigo-500/30 transition-all group">
                            <div>
                                <h4 class="font-bold text-gray-800 dark:text-white">{{ __('Clear System Cache') }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Forces a refresh of all cached optimization files.') }}</p>
                            </div>
                            <form action="{{ route('admin.health.clear-cache') }}" method="POST">
                                @csrf
                                <button type="submit" class="p-3 rounded-xl bg-indigo-600 text-white hover:bg-indigo-700 shadow-lg shadow-indigo-600/20 transition-all hover:scale-110">
                                    <i class="fas fa-sync-alt"></i>
                                </button>
                            </form>
                        </div>

                        <!-- Placeholder for more actions -->
                        <div class="flex items-center justify-between p-4 bg-white/5 rounded-2xl border border-white/5 opacity-50 cursor-not-allowed">
                            <div>
                                <h4 class="font-bold text-gray-800 dark:text-white">{{ __('Optimize Database') }}</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">{{ __('Run VACUUM and ANALYZE on DB (Coming Soon)') }}</p>
                            </div>
                            <div class="p-3 rounded-xl bg-gray-600 text-white">
                                <i class="fas fa-database"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Server Environment -->
                <div class="glass p-8 rounded-[2.5rem] shadow-sm border border-gray-100 dark:border-white/5">
                    <h3 class="text-xl font-bold mb-6 flex items-center gap-3">
                        <i class="fas fa-server text-emerald-500"></i>
                        {{ __('Environment') }}
                    </h3>
                    
                    <div class="space-y-3">
                        <div class="flex justify-between items-center py-2 border-b border-white/5 text-sm">
                            <span class="text-gray-500">{{ __('OS') }}</span>
                            <span class="font-medium">{{ PHP_OS_FAMILY }} ({{ PHP_OS }})</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5 text-sm">
                            <span class="text-gray-500">{{ __('PHP Version') }}</span>
                            <span class="font-medium text-emerald-500">{{ PHP_VERSION }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5 text-sm">
                            <span class="text-gray-500">{{ __('Laravel Version') }}</span>
                            <span class="font-medium text-indigo-500">{{ app()->version() }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 border-b border-white/5 text-sm">
                            <span class="text-gray-500">{{ __('Server Software') }}</span>
                            <span class="font-medium">{{ $_SERVER['SERVER_SOFTWARE'] ?? 'N/A' }}</span>
                        </div>
                        <div class="flex justify-between items-center py-2 text-sm">
                            <span class="text-gray-500">{{ __('Database') }}</span>
                            <span class="font-medium">{{ config('database.default') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
