<div class="mt-16 glass-effect p-8 rounded-3xl" id="reviews">
    <!-- Header & Average Rating -->
    <div class="flex flex-col md:flex-row items-center justify-between mb-10 gap-6">
        <h3 class="text-3xl font-bold flex items-center gap-3">
            <i class="fas fa-star text-amber-500"></i> {{ __('Reviews') }}
            <span class="bg-amber-500/20 text-amber-400 text-sm font-black px-3 py-1 rounded-full">{{ $reviews->count() }}</span>
        </h3>
        
        @if($reviews->count() > 0)
            <div class="flex items-center gap-4 bg-black/30 px-6 py-3 rounded-2xl border border-white/5 shadow-inner">
                <div class="text-4xl font-black text-white">{{ number_format($averageRating, 1) }}</div>
                <div>
                    <div class="flex text-amber-500 mb-1">
                        @for($i = 1; $i <= 5; $i++)
                            @if($i <= round($averageRating))
                                <i class="fas fa-star text-lg"></i>
                            @else
                                <i class="far fa-star text-lg opacity-30"></i>
                            @endif
                        @endfor
                    </div>
                    <div class="text-xs text-gray-500 font-semibold">{{ __('Average Rating') }}</div>
                </div>
            </div>
        @endif
    </div>

    <!-- Reviews Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-12">
        @forelse($reviews as $review)
            <div class="p-6 rounded-2xl bg-white/5 border border-white/10 relative group hover:border-amber-500/30 transition-colors">
                <div class="absolute top-6 rtl:left-6 ltr:right-6 flex text-amber-500 text-xs">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $review->rating)
                            <i class="fas fa-star"></i>
                        @else
                            <i class="far fa-star opacity-30"></i>
                        @endif
                    @endfor
                </div>
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-10 rounded-full bg-amber-500/20 flex items-center justify-center border border-amber-500/30">
                        <span class="font-bold text-amber-400">{{ substr($review->name ?? ($review->user->name ?? 'A'), 0, 1) }}</span>
                    </div>
                    <div>
                        <h4 class="font-bold text-gray-200">{{ $review->name ?? ($review->user->name ?? 'Anonymous') }}</h4>
                        <span class="text-[10px] text-gray-500">{{ $review->created_at->format('M d, Y') }}</span>
                    </div>
                </div>
                @if($review->body)
                    <p class="text-gray-400 text-sm leading-relaxed">{{ $review->body }}</p>
                @endif
            </div>
        @empty
            <div class="col-span-full text-center py-12 text-gray-500 bg-white/5 rounded-3xl border border-dashed border-white/10">
                <i class="fas fa-star-half-alt text-5xl mb-4 opacity-50 text-amber-500/50"></i>
                <h4 class="text-xl font-bold text-gray-300 mb-2">{{ __('No reviews yet') }}</h4>
                <p>{{ __('Have you worked with this project? Leave the first review!') }}</p>
            </div>
        @endforelse
    </div>

    <!-- Review Form -->
    <div class="bg-gray-900/50 p-6 md:p-8 rounded-2xl border border-white/5 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-amber-500/5 rounded-full blur-[80px] pointer-events-none"></div>

        <h4 class="text-xl font-bold mb-2 text-gray-200">{{ __('Write a Review') }}</h4>
        <p class="text-sm text-gray-500 mb-8">{{ __('Your feedback helps me improve and helps others understand the value of this project.') }}</p>
        
        @if (session()->has('message'))
            <div class="mb-6 p-4 rounded-xl bg-emerald-500/20 border border-emerald-500/30 text-emerald-400 text-sm flex items-center gap-3">
                <i class="fas fa-check-circle text-lg"></i>
                {{ session('message') }}
            </div>
        @endif
        
        @if (session()->has('error'))
            <div class="mb-6 p-4 rounded-xl bg-rose-500/20 border border-rose-500/30 text-rose-400 text-sm flex items-center gap-3">
                <i class="fas fa-exclamation-circle text-lg"></i>
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="submitReview" class="space-y-6 relative z-10">
            <!-- Star Rating Input -->
            <div>
                <label class="block text-sm text-gray-400 mb-2 font-semibold">{{ __('Your Rating') }} <span class="text-rose-500">*</span></label>
                <div class="flex gap-2">
                    @for($i = 1; $i <= 5; $i++)
                        <button type="button" wire:click="setRating({{ $i }})" class="focus:outline-none transition-transform hover:scale-110">
                            <i class="{{ $rating >= $i ? 'fas text-amber-500' : 'far text-gray-600 hover:text-amber-500/50' }} fa-star text-3xl transition-colors drop-shadow-lg"></i>
                        </button>
                    @endfor
                </div>
                @error('rating') <span class="text-red-400 text-xs mt-2 block">{{ $message }}</span> @enderror
            </div>

            @if(!auth()->check())
                <div>
                    <label class="block text-sm text-gray-400 mb-1 font-semibold">{{ __('Name') }} <span class="text-rose-500">*</span></label>
                    <input type="text" wire:model="name" class="w-full md:w-1/2 bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-amber-500 transition-colors" placeholder="{{ __('Your name') }}">
                    @error('name') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
                </div>
            @else
                <div class="flex items-center gap-3 text-sm text-gray-400 mb-4 pb-4 border-b border-white/10">
                    <div class="w-8 h-8 rounded-full bg-amber-500/20 border border-amber-500/30 flex items-center justify-center">
                        <i class="fas fa-user text-amber-400 text-xs"></i>
                    </div>
                    {{ __('Reviewing as') }} <span class="text-white font-bold">{{ auth()->user()->name }}</span>
                </div>
            @endif

            <div>
                <label class="block text-sm text-gray-400 mb-1 font-semibold">{{ __('Review Detail (Optional)') }}</label>
                <textarea wire:model="body" rows="4" class="w-full bg-black/50 border border-white/10 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-amber-500 transition-colors resize-none" placeholder="{{ __('What did you like or dislike?') }}"></textarea>
                @error('body') <span class="text-red-400 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-black font-bold py-3 px-8 rounded-full shadow-lg shadow-amber-500/20 transition-all hover:scale-105" wire:loading.attr="disabled">
                    <span wire:loading.remove wire:target="submitReview">{{ __('Submit Review') }}</span>
                    <span wire:loading wire:target="submitReview"><i class="fas fa-spinner fa-spin me-2"></i> {{ __('Submitting...') }}</span>
                </button>
            </div>
        </form>
    </div>
</div>

