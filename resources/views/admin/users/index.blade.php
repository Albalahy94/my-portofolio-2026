<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="premium-card">
                <div class="flex justify-between items-center mb-8 gap-4 flex-wrap">
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white">{{ __('User Management') }}</h3>
                    <div class="flex items-center gap-3">
                        @if(request('status') === 'trashed')
                            <a href="{{ route('admin.users.index') }}" wire:navigate class="btn-premium-secondary !px-4 !py-2">
                                <i class="fas fa-arrow-left text-xs"></i> {{ __('Back to List') }}
                            </a>
                        @else
                            <a href="{{ route('admin.users.index', ['status' => 'trashed']) }}" wire:navigate class="px-4 py-2 bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 rounded-2xl text-xs font-black hover:bg-rose-500 hover:text-white transition-all">
                                <i class="fas fa-trash-alt me-1"></i> {{ __('Trash') }}
                            </a>
                            <a href="{{ route('admin.users.create') }}" wire:navigate class="btn-premium-primary !px-6 !py-2.5">
                                <i class="fas fa-plus text-xs"></i> {{ __('Add New User') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                    <td>
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-indigo-500/10 flex items-center justify-center text-indigo-600 dark:text-indigo-400 text-xs font-black">
                                                {{ substr($user->name, 0, 1) }}
                                            </div>
                                            <span class="font-bold">{{ $user->name }}</span>
                                        </div>
                                    </td>
                                    <td class="text-slate-500 dark:text-slate-400">{{ $user->email }}</td>
                                    <td>
                                        <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest {{ $user->role === 'admin' || $user->role === 'owner' ? 'bg-rose-500/10 text-rose-600 dark:text-rose-400' : ($user->role === 'moderator' ? 'bg-amber-500/10 text-amber-600 dark:text-amber-400' : 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400') }}">
                                            {{ $user->role }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-4">
                                            @if(request('status') === 'trashed')
                                                <form action="{{ route('admin.users.restore', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-emerald-600 hover:text-emerald-700 font-bold transition-colors">{{ __('Restore') }}</button>
                                                </form>
                                                <form action="{{ route('admin.users.force-delete', $user->id) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-700 font-bold transition-colors">{{ __('Delete Permanently') }}</button>
                                                </form>
                                            @else
                                                <a href="{{ route('admin.users.edit', $user) }}" wire:navigate class="text-indigo-600 hover:text-indigo-700 font-bold transition-colors">{{ __('Edit') }}</a>
                                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" class="delete-form">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-700 font-bold transition-colors">{{ __('Delete') }}</button>
                                                </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-8">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
