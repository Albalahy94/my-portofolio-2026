<x-layout>
    @section('title', 'المدونة - سعيد البلحي')

    <section class="py-24 min-h-screen">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h1 class="text-4xl font-bold mb-4">المدونة <span class="gradient-text">التقنية</span></h1>
                <p class="text-gray-400 text-lg">أفكار، تجارب، ودروس في عالم البرمجة</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article class="glass-effect rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 group" data-aos="fade-up">
                        <div class="h-48 bg-gray-800 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary-900/50 to-accent-900/50 group-hover:scale-110 transition-transform duration-500"></div>
                            <div class="absolute bottom-0 right-0 p-4">
                                <span class="bg-primary-600/80 text-white text-xs px-2 py-1 rounded-full backdrop-blur-sm">مقال</span>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-center text-xs text-gray-500 mb-3">
                                <span>{{ $post->published_at ? $post->published_at->format('Y-m-d') : '' }}</span>
                                <span><i class="fas fa-user me-1"></i> {{ $post->user->name ?? 'Admin' }}</span>
                            </div>
                            <h2 class="text-xl font-bold mb-3 group-hover:text-primary-400 transition-colors line-clamp-2">
                                <a href="{{ route('blog.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h2>
                            <p class="text-gray-400 text-sm mb-4 line-clamp-3 leading-relaxed">
                                {{ $post->excerpt ?? Str::limit(strip_tags($post->content), 100) }}
                            </p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-primary-400 text-sm font-semibold hover:tracking-wide transition-all inline-flex items-center">
                                اقرأ المزيد <i class="fas fa-arrow-left text-xs mr-2 transition-transform group-hover:-translate-x-1"></i>
                            </a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-3 text-center py-20 bg-white/5 rounded-2xl border border-white/5">
                        <i class="fas fa-pencil-alt text-4xl text-gray-600 mb-4 block"></i>
                        <p class="text-gray-400 text-xl">لا توجد مقالات منشورة حالياً.</p>
                        <p class="text-gray-500 mt-2">عد لاحقاً للاطلاع على جديدنا!</p>
                    </div>
                @endforelse
            </div>

            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>
    </section>
</x-layout>
