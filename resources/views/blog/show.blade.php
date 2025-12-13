<x-layout>
    @section('title', $post->title)
    @section('meta_description', $post->meta_description ?? Str::limit(strip_tags($post->content), 160))

    <article class="py-24 min-h-screen">
        <div class="container mx-auto px-6 max-w-4xl">
            <!-- Header -->
            <header class="text-center mb-12" data-aos="fade-down">
                <div class="text-primary-400 text-sm font-semibold mb-4">{{ $post->published_at ? $post->published_at->format('d M, Y') : 'مسودة' }}</div>
                <h1 class="text-4xl md:text-5xl font-bold mb-6 leading-tight gradient-text">{{ $post->title }}</h1>
                <div class="flex justify-center items-center gap-6 text-gray-400 text-sm border-y border-white/10 py-4 max-w-lg mx-auto">
                    <span><i class="fas fa-user me-2 text-accent-500"></i> {{ $post->user->name ?? 'Admin' }}</span>
                    <span><i class="fas fa-clock me-2 text-primary-500"></i> 5 د قراءة</span>
                    <span><i class="fas fa-eye me-2 text-green-500"></i> 120 مشاهدة</span>
                </div>
            </header>

            <!-- Featured Image (Optional) -->
            @if($post->featured_image)
                <div class="rounded-2xl overflow-hidden mb-12 shadow-2xl shadow-primary-900/20 border border-white/10" data-aos="zoom-in">
                    <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-full h-auto object-cover max-h-[500px]">
                </div>
            @endif

            <!-- Content -->
            <div class="glass-effect p-8 md:p-12 rounded-3xl mb-12" data-aos="fade-up">
                <!-- Using a custom class to style the content inside since we don't have typography plugin fully setup -->
                <div class="blog-content text-gray-300 leading-loose text-lg space-y-6">
                    {!! $post->content !!}
                </div>
            </div>

            <!-- Share/Navigation -->
            <div class="flex flex-col md:flex-row justify-between items-center gap-6 border-t border-white/10 pt-8" data-aos="fade-up">
                <a href="{{ route('blog.index') }}" class="btn-secondary text-sm group">
                    <i class="fas fa-arrow-right me-2 group-hover:translate-x-1 transition-transform"></i> العودة للمدونة
                </a>
                
                <div class="flex gap-4">
                    <span class="text-gray-400">{{ __('Share:') }}</span>
                    <a href="https://twitter.com/intent/tweet?text={{ urlencode($post->title) }}&url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}" target="_blank" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </article>
</x-layout>
