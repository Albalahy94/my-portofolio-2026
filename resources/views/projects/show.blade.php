<x-layout>
    @section('title', $project->getTrans('title') . ' - ' . __('Projects'))

    <!-- Project Header -->
    <section class="pt-32 pb-10 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-primary-900/10 to-transparent pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div data-aos="fade-down" class="text-center max-w-4xl mx-auto">
                <div class="flex justify-center">
                    <a href="{{ route('projects.index') }}" class="inline-flex items-center text-gray-400 hover:text-white mb-6 transition-colors">
                        <i class="fas fa-arrow-{{ app()->getLocale() == 'ar' ? 'right' : 'left' }} mx-2"></i> 
                        {{ __('Back to Projects') }}
                    </a>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold mb-6 gradient-text">{{ $project->getTrans('title') }}</h1>
                <div class="flex flex-wrap justify-center gap-3 mb-8">
                    @if(is_array($project->technologies))
                        @foreach($project->technologies as $tech)
                            <span class="px-4 py-2 rounded-full glass-effect text-primary-400 text-sm font-semibold">{{ $tech }}</span>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Project Content -->
    <section class="pb-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 gap-12">
                <!-- Main Content -->
                <div class="col-span-full space-y-8" data-aos="fade-up">
                    
                    <!-- Image Slider -->
                    @php
                        $slides = [];
                        if($project->image) {
                            $slides[] = asset('storage/' . $project->image);
                        }
                        foreach($project->images as $img) {
                            $slides[] = asset('storage/' . $img->image);
                        }
                    @endphp

                    <div class="glass-effect rounded-3xl overflow-hidden p-1 shadow-2xl" x-data="{ 
                            activeSlide: 0, 
                            slides: {{ \Illuminate\Support\Js::from($slides) }},
                            timer: null,
                            isTransitioning: false,
                            goToSlide(index) {
                                if (this.activeSlide === index || this.isTransitioning) return;
                                
                                this.isTransitioning = true;
                                setTimeout(() => {
                                    this.activeSlide = index;
                                    this.isTransitioning = false;
                                }, 300);
                            },
                            next() {
                                let nextSlide = (this.activeSlide === this.slides.length - 1) ? 0 : this.activeSlide + 1;
                                this.goToSlide(nextSlide);
                            },
                            prev() {
                                let prevSlide = (this.activeSlide === 0) ? this.slides.length - 1 : this.activeSlide - 1;
                                this.goToSlide(prevSlide);
                            },
                            startAutoPlay() {
                                if (this.slides.length > 1) {
                                    this.timer = setInterval(() => {
                                        this.next();
                                    }, 4000);
                                }
                            },
                            stopAutoPlay() {
                                clearInterval(this.timer);
                            }
                        }" x-init="startAutoPlay()">
                        
                        <div class="relative w-full h-[400px] md:h-[600px] bg-gray-900 group rounded-2xl overflow-hidden shadow-inner" style="height: 600px;" @mouseenter="stopAutoPlay()" @mouseleave="startAutoPlay()">
                            
                            <!-- Main Image -->
                            <div class="w-full h-full flex items-center justify-center">
                                <img :src="slides[activeSlide]" 
                                     class="w-full h-full object-cover rounded-2xl shadow-lg transition-opacity duration-300 ease-in-out" 
                                     :class="{ 'opacity-0 scale-95': isTransitioning, 'opacity-100 scale-100': !isTransitioning }"
                                     alt="{{ $project->getTrans('title') }}">
                            </div>
                            
                            <!-- Controls & Indicators -->
                            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex items-center gap-6 z-20 px-6 py-3 bg-black/40 backdrop-blur-md rounded-full border border-white/10 shadow-lg" x-show="slides.length > 1">
                                <!-- Prev Button -->
                                <button @click="prev()" class="text-white/70 hover:text-white hover:scale-110 transition-all focus:outline-none">
                                    <i class="fas fa-chevron-left text-xl"></i>
                                </button>

                                <!-- Indicators -->
                                <div class="flex gap-3">
                                    <template x-for="(slide, index) in slides" :key="index">
                                        <button @click="goToSlide(index)" 
                                                class="h-2.5 rounded-full transition-all duration-300"
                                                :class="activeSlide === index ? 'w-8 bg-primary-500' : 'w-2.5 bg-white/40 hover:bg-white/60'">
                                        </button>
                                    </template>
                                </div>

                                <!-- Next Button -->
                                <button @click="next()" class="text-white/70 hover:text-white hover:scale-110 transition-all focus:outline-none">
                                    <i class="fas fa-chevron-right text-xl"></i>
                                </button>
                            </div>
                        </div>
                    </div>


                    
                    <div class="glass-effect p-8 md:p-12 rounded-3xl mx-auto max-w-5xl w-full overflow-hidden">
                         <div class="prose prose-invert prose-lg max-w-none text-right break-all whitespace-pre-wrap w-[90%] mx-auto">
                             <!-- Content -->
                                {!! $project->getTrans('content') !!}
                        </div>    @if($project->getTrans('description'))
                                <div class="mb-8 font-semibold text-xl leading-relaxed">
                                    {{ $project->getTrans('description') }}
                                </div>
                            @endif

                            <div class="blog-content leading-loose text-gray-300">
                                {!! $project->getTrans('content') !!}
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <!-- Sidebar information (now part of the flow or at bottom) -->
                <div class="space-y-6 max-w-4xl mx-auto w-full" data-aos="fade-up">
                    <!-- Links -->
                    @if(!empty($project->links))
                        <div class="glass-effect p-6 rounded-2xl">
                            <h3 class="text-xl font-bold mb-4 border-b border-white/10 pb-2">{{ __('Links') }}</h3>
                            <div class="space-y-4">
                                @foreach($project->links as $key => $link)
                                    <a href="{{ $link }}" target="_blank" class="flex items-center justify-between p-3 rounded-xl bg-white/5 hover:bg-primary-500/20 transition-all group">
                                        <span class="capitalize">{{ $key }}</span>
                                        <i class="fas fa-external-link-alt text-gray-400 group-hover:text-primary-400"></i>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Related Post -->
                    @if($project->relatedPost)
                        <div class="glass-effect p-6 rounded-2xl relative overflow-hidden group">
                            <div class="absolute inset-0 bg-gradient-to-br from-accent-900/20 to-transparent pointer-events-none"></div>
                            <h3 class="text-xl font-bold mb-4">{{ __('Related Post') }}</h3>
                            <a href="{{ route('blog.show', $project->relatedPost->slug) }}" class="block">
                                <h4 class="text-lg font-semibold group-hover:text-accent-400 transition-colors mb-2">
                                    {{ $project->relatedPost->getTrans('title') }}
                                </h4>
                                <p class="text-sm text-gray-400 line-clamp-2">
                                    {{ Str::limit(strip_tags($project->relatedPost->getTrans('excerpt')), 80) }}
                                </p>
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
</x-layout>
