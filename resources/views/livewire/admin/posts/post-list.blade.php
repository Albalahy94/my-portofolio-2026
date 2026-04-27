<div>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('المقالات') }}
            </h2>
            <div class="flex gap-2">
                @if($status === 'trashed')
                    <a href="{{ route('admin.posts.index') }}" wire:navigate class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        {{ __('رجوع للقائمة') }}
                    </a>
                @else
                    <a href="{{ route('admin.posts.index', ['status' => 'trashed']) }}" wire:navigate class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        {{ __('سلة المهملات') }}
                    </a>
                    <a href="{{ route('admin.posts.create') }}" wire:navigate class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        {{ __('كتابة مقال') }}
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="premium-card">
                <div class="flex justify-between items-center mb-8 gap-4 flex-wrap">
                    <h3 class="text-2xl font-black text-slate-800 dark:text-white">{{ __('Post Management') }}</h3>
                    <div class="flex items-center gap-3">
                        @if($status === 'trashed')
                            <a href="{{ route('admin.posts.index') }}" wire:navigate class="btn-premium-secondary !px-4 !py-2">
                                <i class="fas fa-arrow-left text-xs"></i> {{ __('Back to List') }}
                            </a>
                        @else
                            <a href="{{ route('admin.posts.index', ['status' => 'trashed']) }}" wire:navigate class="px-4 py-2 bg-rose-500/10 text-rose-600 dark:text-rose-400 border border-rose-500/20 rounded-2xl text-xs font-black hover:bg-rose-500 hover:text-white transition-all">
                                <i class="fas fa-trash-alt me-1"></i> {{ __('Trash') }}
                            </a>
                            <a href="{{ route('admin.posts.create') }}" wire:navigate class="btn-premium-primary !px-6 !py-2.5">
                                <i class="fas fa-plus text-xs"></i> {{ __('Write Post') }}
                            </a>
                        @endif
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Author') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Published Date') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                                <tr wire:key="post-{{ $post->id }}" class="hover:bg-slate-50 dark:hover:bg-slate-800/50 transition-colors">
                                    <td class="font-bold text-slate-800 dark:text-slate-200">
                                        {{ $post->getTrans('title') }}
                                    </td>
                                    <td class="text-slate-500 dark:text-slate-400">{{ $post->user->name ?? 'Unknown' }}</td>
                                    <td>
                                        @if($post->is_published)
                                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-emerald-500/10 text-emerald-600 dark:text-emerald-400">Published</span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-[10px] font-black uppercase tracking-widest bg-amber-500/10 text-amber-600 dark:text-amber-400">Draft</span>
                                        @endif
                                    </td>
                                    <td class="text-[11px] font-bold text-slate-500 dark:text-slate-500 dir-ltr">
                                        {{ $post->published_at ? $post->published_at->format('Y-m-d H:i') : '-' }}
                                    </td>
                                    <td>
                                        <div class="flex items-center gap-4">
                                            @if($status === 'trashed')
                                                <button type="button" wire:click="restore({{ $post->id }})" class="text-emerald-600 hover:text-emerald-700 font-bold transition-colors">{{ __('Restore') }}</button>
                                                <button type="button" onclick="confirmDelete({{ $post->id }}, 'confirm-force-delete')" class="text-rose-600 hover:text-rose-700 font-bold transition-colors">{{ __('Delete Permanently') }}</button>
                                            @else
                                                <a href="{{ route('admin.posts.edit', $post->id) }}" wire:navigate class="text-indigo-600 hover:text-indigo-700 font-bold transition-colors">{{ __('Edit') }}</a>
                                                <button type="button" onclick="confirmDelete({{ $post->id }}, 'confirm-delete')" class="text-rose-600 hover:text-rose-700 font-bold transition-colors">{{ __('Delete') }}</button>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if($posts->isEmpty())
                                <tr>
                                    <td colspan="5" class="py-12 text-center text-slate-400 font-bold">
                                        {{ __('No posts found.') }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-8">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, action) {
            Swal.fire({
                title: '{{ __("هل أنت متأكد؟") }}',
                text: '{{ __("لن تتمكن من التراجع عن هذا!") }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ __("نعم، احذف!") }}',
                cancelButtonText: '{{ __("إلغاء") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch(action, { id: id });
                }
            });
        }
        
        document.addEventListener('livewire:initialized', () => {
            if(!window.toastListenerRegistered) {
                Livewire.on('toast', (event) => {
                    Toast.fire({
                        icon: event[0].icon ?? 'success',
                        title: event[0].title
                    });
                });
                window.toastListenerRegistered = true;
            }
        });
    </script>
</div>
