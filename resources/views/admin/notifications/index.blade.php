<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
                {{ __('Smart Notification Center') }}
            </h2>
            <form action="{{ route('admin.notifications.read-all') }}" method="POST">
                @csrf
                <button type="submit" class="text-xs font-black uppercase text-indigo-600 hover:underline tracking-widest">
                    {{ __('Mark All as Read') }}
                </button>
            </form>
        </div>
    </x-slot>

    <div class="space-y-6">
        <!-- Filters -->
        <div class="glass p-6 rounded-[2rem] flex flex-wrap items-center gap-4">
            <a href="{{ route('admin.notifications.index', ['type' => 'all', 'status' => request('status')]) }}" 
               class="px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-all {{ request('type', 'all') == 'all' ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-500/20' : 'bg-gray-100 dark:bg-slate-800 text-gray-500 hover:bg-gray-200' }}">
                {{ __('All Types') }}
            </a>
            @foreach(['trend', 'milestone', 'success', 'warning', 'info'] as $type)
                <a href="{{ route('admin.notifications.index', ['type' => $type, 'status' => request('status')]) }}" 
                   class="px-6 py-2.5 rounded-xl text-xs font-black uppercase tracking-wider transition-all {{ request('type') == $type ? 'bg-indigo-600 text-white shadow-lg' : 'bg-gray-100 dark:bg-slate-800 text-gray-500 hover:bg-gray-200' }}">
                    {{ __(ucfirst($type)) }}
                </a>
            @endforeach
            
            <div class="ms-auto flex items-center gap-2 bg-gray-100 dark:bg-slate-800 p-1.5 rounded-2xl">
                <a href="{{ route('admin.notifications.index', ['status' => 'all', 'type' => request('type')]) }}" 
                   class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-wider transition-all {{ request('status', 'all') == 'all' ? 'bg-white dark:bg-slate-700 shadow-sm text-indigo-600' : 'text-gray-400' }}">
                    {{ __('All') }}
                </a>
                <a href="{{ route('admin.notifications.index', ['status' => 'unread', 'type' => request('type')]) }}" 
                   class="px-4 py-2 rounded-xl text-[10px] font-black uppercase tracking-wider transition-all {{ request('status') == 'unread' ? 'bg-white dark:bg-slate-700 shadow-sm text-indigo-600' : 'text-gray-400' }}">
                    {{ __('Unread') }}
                </a>
            </div>
        </div>

        <!-- Notifications List -->
        <div class="space-y-4">
            @forelse($notifications as $notification)
                <div class="glass relative overflow-hidden p-6 rounded-3xl border border-white/40 dark:border-slate-800/40 group transition-all duration-500 {{ !$notification->is_read ? 'ring-2 ring-indigo-500/20 bg-indigo-50/10 dark:bg-indigo-900/10' : '' }}"
                     x-data="{ show: true }" x-show="show">
                    
                    <div class="flex items-start gap-6">
                        <!-- Icon based on type -->
                        <div class="w-14 h-14 rounded-2xl flex items-center justify-center shrink-0 shadow-lg
                            {{ $notification->type == 'trend' ? 'bg-amber-100 text-amber-600' : '' }}
                            {{ $notification->type == 'milestone' ? 'bg-purple-100 text-purple-600' : '' }}
                            {{ $notification->type == 'success' ? 'bg-emerald-100 text-emerald-600' : '' }}
                            {{ $notification->type == 'warning' ? 'bg-rose-100 text-rose-600' : '' }}
                            {{ $notification->type == 'info' ? 'bg-blue-100 text-blue-600' : '' }} ">
                            <i class="fas 
                                {{ $notification->type == 'trend' ? 'fa-chart-line' : '' }}
                                {{ $notification->type == 'milestone' ? 'fa-trophy' : '' }}
                                {{ $notification->type == 'success' ? 'fa-check-circle' : '' }}
                                {{ $notification->type == 'warning' ? 'fa-exclamation-triangle' : '' }}
                                {{ $notification->type == 'info' ? 'fa-info-circle' : '' }} text-2xl"></i>
                        </div>

                        <div class="flex-1">
                            <div class="flex items-center justify-between mb-2">
                                <h4 class="font-black text-gray-800 dark:text-slate-100 {{ !$notification->is_read ? 'text-lg' : 'text-base' }}">
                                    {{ $notification->title }}
                                </h4>
                                <span class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                    {{ $notification->created_at->diffForHumans() }}
                                </span>
                            </div>
                            <p class="text-gray-600 dark:text-slate-400 text-sm leading-relaxed mb-4">
                                {{ $notification->message }}
                            </p>

                            <div class="flex items-center gap-4">
                                @if(!$notification->is_read)
                                    <button @click="fetch('{{ route('admin.notifications.read', $notification) }}', {method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}}).then(() => show = false)" 
                                            class="text-[10px] font-black uppercase text-indigo-600 hover:underline tracking-widest">
                                        {{ __('Mark as read') }}
                                    </button>
                                @endif
                                <button @click="if(confirm('Delete?')) fetch('{{ route('admin.notifications.destroy', $notification) }}', {method: 'DELETE', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'}}).then(() => show = false)" 
                                        class="text-[10px] font-black uppercase text-rose-500 hover:underline tracking-widest">
                                    {{ __('Delete') }}
                                </button>
                            </div>
                        </div>

                        <!-- Sparkle/Badge for trends -->
                        @if($notification->type == 'trend' && !$notification->is_read)
                            <div class="absolute top-4 right-4">
                                <span class="flex h-3 w-3">
                                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-amber-400 opacity-75"></span>
                                    <span class="relative inline-flex rounded-full h-3 w-3 bg-amber-500"></span>
                                </span>
                            </div>
                        @endif
                    </div>
                </div>
            @empty
                <div class="py-20 text-center glass rounded-3xl opacity-50">
                    <i class="fas fa-bell-slash text-6xl mb-6 text-gray-300"></i>
                    <p class="font-black text-gray-400 uppercase tracking-[0.3em]">{{ __('No notifications found') }}</p>
                </div>
            @endforelse

            <div class="mt-8">
                {{ $notifications->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
