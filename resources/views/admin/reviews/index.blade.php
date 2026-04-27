<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <h2 class="font-black text-2xl text-gray-800 dark:text-white leading-tight flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-500/10 flex items-center justify-center text-amber-500">
                    <i class="fas fa-star"></i>
                </div>
                {{ __('Incoming Reviews') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="glass p-6 sm:p-8 rounded-3xl shadow-xl shadow-slate-200/50 dark:shadow-none border border-white/40 dark:border-white/5 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/5 rounded-full blur-[80px] pointer-events-none"></div>

                <div class="overflow-x-auto relative z-10">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-slate-800/50 dark:text-gray-400 rounded-t-2xl">
                            <tr>
                                <th scope="col" class="px-6 py-4 rounded-tl-xl">{{ __('User/Guest') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('Review') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('Project') }}</th>
                                <th scope="col" class="px-6 py-4">{{ __('Status') }}</th>
                                <th scope="col" class="px-6 py-4 rounded-tr-xl">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($reviews as $review)
                                <tr class="bg-white dark:bg-slate-900/50 border-b border-gray-100 dark:border-slate-800 hover:bg-gray-50 dark:hover:bg-slate-800/80 transition-colors">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $review->name ?? ($review->user->name ?? 'Anonymous') }}
                                        <div class="text-[10px] text-gray-500 mt-1">
                                            @for($i = 1; $i <= 5; $i++)
                                                @if($i <= $review->rating)
                                                    <i class="fas fa-star text-amber-500"></i>
                                                @else
                                                    <i class="far fa-star text-amber-500 opacity-30"></i>
                                                @endif
                                            @endfor
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <p class="line-clamp-2" title="{{ $review->body }}">{{ $review->body ?? __('No text provided') }}</p>
                                        <span class="text-[10px] text-gray-400">{{ $review->created_at->diffForHumans() }}</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($review->reviewable)
                                            <div class="text-xs font-semibold truncate w-32" title="{{ $review->reviewable->getTrans('title') }}">
                                                {{ $review->reviewable->getTrans('title') }}
                                            </div>
                                        @else
                                            <span class="text-red-500 text-xs">{{ __('Deleted Project') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($review->is_approved)
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-emerald-900/30 dark:text-emerald-300">{{ __('Approved') }}</span>
                                        @else
                                            <span class="bg-amber-100 text-amber-800 text-xs font-semibold px-2.5 py-0.5 rounded dark:bg-amber-900/30 dark:text-amber-300">{{ __('Pending') }}</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center gap-3">
                                            @if(!$review->is_approved)
                                                <form action="{{ route('admin.reviews.approve', $review) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-emerald-500 hover:text-emerald-700 transition-colors" title="{{ __('Approve') }}">
                                                        <i class="fas fa-check-circle text-lg"></i>
                                                    </button>
                                                </form>
                                            @endif
                                            
                                            <form action="{{ route('admin.reviews.destroy', $review) }}" method="POST" class="inline delete-form">
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
                                            <p class="text-lg font-bold">{{ __('No reviews yet') }}</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                <div class="mt-6 relative z-10">
                    {{ $reviews->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
