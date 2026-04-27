<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Maintenance & Health Hub') }}
        </h2>
    </x-slot>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- System Stats Cards -->
        <div class="lg:col-span-2 space-y-8">
            <div class="glass p-8 rounded-[2.5rem]">
                <h3 class="text-xl font-black mb-6 text-gray-800 dark:text-white flex items-center gap-3">
                    <i class="fas fa-server text-indigo-500"></i>
                    {{ __('Server Information') }}
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach([
                        ['label' => 'PHP Version', 'value' => $stats['php_version'], 'icon' => 'fab fa-php'],
                        ['label' => 'Laravel Version', 'value' => $stats['laravel_version'], 'icon' => 'fab fa-laravel'],
                        ['label' => 'Server', 'value' => $stats['server_software'], 'icon' => 'fas fa-microchip'],
                        ['label' => 'Memory Limit', 'value' => $stats['memory_limit'], 'icon' => 'fas fa-memory'],
                        ['label' => 'Max Upload', 'value' => $stats['upload_max'], 'icon' => 'fas fa-upload'],
                        ['label' => 'Debug Mode', 'value' => $stats['debug_mode'] ? 'Enabled' : 'Disabled', 'icon' => 'fas fa-bug', 'color' => $stats['debug_mode'] ? 'text-rose-500' : 'text-emerald-500'],
                    ] as $item)
                        <div class="bg-gray-50/50 dark:bg-slate-800/50 p-6 rounded-3xl border border-white/20">
                            <div class="flex items-center gap-4">
                                <div class="w-12 h-12 rounded-2xl bg-white dark:bg-slate-700 flex items-center justify-center shadow-sm">
                                    <i class="{{ $item['icon'] }} text-lg text-indigo-500"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">{{ __($item['label']) }}</p>
                                    <p class="text-sm font-bold {{ $item['color'] ?? 'text-gray-700 dark:text-slate-200' }}">{{ $item['value'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="glass p-8 rounded-[2.5rem]">
                <h3 class="text-xl font-black mb-6 text-gray-800 dark:text-white flex items-center gap-3">
                    <i class="fas fa-hdd text-emerald-500"></i>
                    {{ __('Storage Analysis') }}
                </h3>
                
                <div class="space-y-6">
                    <div>
                        <div class="flex justify-between mb-2">
                            <span class="text-xs font-bold text-gray-500">{{ __('Disk Usage') }}</span>
                            <span class="text-xs font-black text-indigo-600">{{ $stats['disk_free'] }} {{ __('free of') }} {{ $stats['disk_total'] }}</span>
                        </div>
                        <div class="h-4 bg-gray-100 dark:bg-slate-800 rounded-full overflow-hidden">
                            <div class="h-full bg-gradient-to-r from-indigo-500 to-purple-500" style="width: {{ 100 - ( (float)$stats['disk_free'] / (float)$stats['disk_total'] * 100 ) }}%"></div>
                        </div>
                    </div>

                    <div class="p-6 bg-amber-50 dark:bg-amber-900/10 rounded-3xl border border-amber-200/50 flex items-center justify-between">
                        <div class="flex items-center gap-4">
                            <i class="fas fa-broom text-amber-500 text-xl"></i>
                            <div>
                                <p class="text-sm font-bold text-amber-800 dark:text-amber-400">{{ __('Framework Cache Size') }}</p>
                                <p class="text-xs text-amber-700/60 dark:text-amber-500/60">{{ __('Temporary files that can be safely cleared.') }}</p>
                            </div>
                        </div>
                        <span class="text-lg font-black text-amber-600">{{ $stats['cache_size'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Actions Panel -->
        <div class="space-y-8">
            <div class="glass p-8 rounded-[2.5rem] sticky top-24">
                <h3 class="text-xl font-black mb-6 text-gray-800 dark:text-white flex items-center gap-3">
                    <i class="fas fa-magic text-purple-500"></i>
                    {{ __('Optimization Tools') }}
                </h3>
                
                <div class="space-y-4">
                    @foreach([
                        ['type' => 'view', 'label' => 'Clear View Cache', 'desc' => 'Recompiled Blade templates.', 'icon' => 'fas fa-eye'],
                        ['type' => 'config', 'label' => 'Clear Config Cache', 'desc' => 'Refresh environment variables.', 'icon' => 'fas fa-cogs'],
                        ['type' => 'route', 'label' => 'Clear Route Cache', 'desc' => 'Refresh URL routing table.', 'icon' => 'fas fa-route'],
                        ['type' => 'optimize', 'label' => 'Full Optimization', 'desc' => 'Combined cache clearing.', 'icon' => 'fas fa-bolt', 'color' => 'bg-indigo-600'],
                    ] as $action)
                        <form action="{{ route('admin.health.clear') }}" method="POST">
                            @csrf
                            <input type="hidden" name="type" value="{{ $action['type'] }}">
                            <button type="submit" class="w-full p-4 rounded-2xl border border-gray-100 dark:border-slate-800 hover:border-indigo-500/30 hover:bg-white dark:hover:bg-slate-800 transition-all group text-start">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-xl {{ $action['color'] ?? 'bg-gray-50 dark:bg-slate-700' }} flex items-center justify-center group-hover:scale-110 transition-transform">
                                        <i class="{{ $action['icon'] }} {{ isset($action['color']) ? 'text-white' : 'text-gray-400 group-hover:text-indigo-500' }}"></i>
                                    </div>
                                    <div>
                                        <p class="text-sm font-bold text-gray-700 dark:text-slate-200">{{ __($action['label']) }}</p>
                                        <p class="text-[10px] text-gray-400 uppercase font-black tracking-tighter">{{ __($action['desc']) }}</p>
                                    </div>
                                </div>
                            </button>
                        </form>
                    @endforeach
                </div>

                <div class="mt-8 pt-8 border-t border-gray-100 dark:border-slate-800">
                    <div class="flex items-center gap-3 p-4 bg-rose-50 dark:bg-rose-900/10 rounded-2xl border border-rose-200/50">
                        <i class="fas fa-shield-alt text-rose-500"></i>
                        <p class="text-[10px] font-black text-rose-700 dark:text-rose-400 leading-tight uppercase tracking-widest">
                            {{ __('Use these tools only if you notice synchronization issues after updating code or environment variables.') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
