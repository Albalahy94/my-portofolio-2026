<div class="mt-16 glass-effect p-8 rounded-3xl" id="comments">
    <h3 class="text-2xl font-bold mb-8 flex items-center gap-3">
        <i class="fas fa-comments text-primary-500"></i> {{ __('Comments') }} <span class="bg-primary-500/20 text-primary-400 text-sm py-1 px-3 rounded-full">{{ $comments->count() }}</span>
    </h3>

    <!-- Comments List -->
    <div class="space-y-6 mb-12">
        @forelse($comments as $comment)
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 flex gap-4">
                <div class="w-12 h-12 rounded-full bg-primary-500/20 flex items-center justify-center shrink-0 border border-primary-500/30">
                    <span class="text-xl font-bold text-primary-400 uppercase">{{ substr($comment->name ?? ($comment->user->name ?? 'U'), 0, 1) }}</span>
                </div>
                <div class="flex-1">
                    <div class="flex items-center justify-between mb-2">
                        <h4 class="font-bold text-gray-200">{{ $comment->name ?? ($comment->user->name ?? 'Anonymous') }}</h4>
                        <span class="text-xs text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $comment->body }}</p>
                </div>
            </div>
        @empty
            <div class="text-center py-8 text-gray-500">
                <i class="fas fa-comment-dots text-4xl mb-3 opacity-50"></i>
                <p>{{ __('No comments yet. Be the first to share your thoughts!') }}</p>
            </div>
        @endforelse
    </div>

    <!-- Comment Form -->
    <div class="bg-gray-900/50 p-6 md:p-8 rounded-2xl border border-white/5">
        <h4 class="text-lg font-bold mb-6 text-gray-300">{{ __('Leave a Comment') }}</h4>
        
        @if (session()->has('message'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-3">
                <i class="fas fa-check-circle"></i>
                {{ session('message') }}
            </div>
        @endif

        <form wire:submit.prevent="submitComment" class="space-y-4">
            @if(!auth()->check())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">{{ __('Name') }}</label>
                        <input type="text" wire:model="name" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary-500 transition-colors" placeholder="{{ __('Your name') }}">
                        @error('name') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block text-sm text-gray-400 mb-1">{{ __('Email') }}</label>
                        <input type="email" wire:model="email" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary-500 transition-colors" placeholder="{{ __('Your email (hidden)') }}">
                        @error('email') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>
            @else
                <div class="flex items-center gap-3 text-sm text-gray-400 mb-4 pb-4 border-b border-white/10">
                    <div class="w-8 h-8 rounded-full bg-primary-500/20 border border-primary-500/30 flex items-center justify-center">
                        <i class="fas fa-user text-primary-400 text-xs"></i>
                    </div>
                    {{ __('Commenting as') }} <span class="text-white font-semibold">{{ auth()->user()->name }}</span>
                </div>
            @endif

            <div>
                <label class="block text-sm text-gray-400 mb-1">{{ __('Message') }}</label>
                <textarea wire:model="body" rows="4" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-primary-500 transition-colors resize-none" placeholder="{{ __('What do you think?') }}"></textarea>
                @error('body') <span class="text-red-400 text-xs mt-1">{{ $message }}</span> @enderror
            </div>

            <div class="flex justify-end pt-2">
                <button type="submit" class="btn-primary" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submitComment">{{ __('Post Comment') }}</span>
                    <span wire:loading wire:target="submitComment"><i class="fas fa-spinner fa-spin me-2"></i> {{ __('Submitting...') }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

