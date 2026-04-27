<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-black text-2xl text-gray-800 dark:text-white leading-tight flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-indigo-500/10 flex items-center justify-center text-indigo-500">
                    <i class="fas fa-comments"></i>
                </div>
                {{ __('Incoming Comments') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="glass p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-white/40 dark:border-white/5 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-indigo-500/5 rounded-full blur-[80px] pointer-events-none"></div>

                <div class="overflow-x-auto relative z-10">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-800/50 dark:text-gray-400 rounded-t-2xl">
                            <tr>
                                <th scope="col" class="px-6 py-4 rounded-tl-xl">{{ __('User/Guest') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('Comment') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('On') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('Status') }}</th>
                                <th scope="col" class="px-6 py-4 rounded-tr-xl">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($comments as $comment)
                                <tr class="bg-white dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-800 hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $comment->name ?? ($comment->user->name ?? 'Anonymous') }}
                                        <div class="text-[10px] text-gray-500">{{ $comment->email ?? ($comment->user->email ?? '') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="line-clamp-2" title="{{ $comment->body }}">{{ $comment->body }}</p>
                                        <span class="text-[10px] text-gray-400">{{ $comment->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($comment->commentable)
                                            <span class="text-xs font-semibold px-2 py-1 rounded bg-gray-100 dark:bg-slate-800">{{ class_basename($comment->commentable_type) }}</span>
                                            <div class="text-xs mt-1 truncate w-32" title="{{ $comment->commentable->title ?? $comment->commentable->getTrans('title') }}">
                                                {{ $comment->commentable->title ?? $comment->commentable->getTrans('title') }}
                                            </div>
                                        @else
                                            <span class="text-red-500 text-xs">{{ __('Deleted Item') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($comment->is_approved)
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-emerald-900/30 dark:text-emerald-300">{{ __('Approved') }}</span>
                                        @else
                                            <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-amber-900/30 dark:text-amber-300">{{ __('Pending') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if(!$comment->is_approved)
                                                <form action="{{ route('admin.comments.approve', $comment) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-emerald-500 hover:text-emerald-700 transition-colors" title="{{ __('Approve') }}">
                                                        <i class="fas fa-check-circle text-lg"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.comments.destroy', $comment) }}" method="POST" class="inline delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-rose-500 hover:text-rose-700 transition-colors" title="{{ __('Delete') }}">
                                                    <i class="fas fa-trash-alt text-lg"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center text-gray-500 dark:text-gray-400">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fas fa-check-double text-4xl mb-4 opacity-30"></i>
                                            <p class="text-lg font-bold">{{ __('No comments yet') }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6 relative z-10">
                    {{ $comments->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
