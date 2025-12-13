<x-layout>
    @section('title', __('Said Albalahy - Home'))

    <!-- Hero Section -->
    <section class="min-h-screen flex items-center justify-center relative pt-20 overflow-hidden">
        <!-- Floating Graphics (Moved & Refined) -->
        <div class="absolute inset-0 pointer-events-none">
            <!-- Left Side -->
            <div class="absolute top-1/3 ltr:left-10 rtl:right-10 text-6xl md:text-8xl text-primary-500/20 animate-bounce delay-1000">
                <i class="fas fa-code"></i>
            </div>
            <div class="absolute bottom-1/4 ltr:left-20 rtl:right-20 text-4xl md:text-6xl text-indigo-500/10 rotate-12 animate-pulse">
                <i class="fab fa-php"></i>
            </div>

            <!-- Right Side -->
            <div class="absolute top-1/3  ltr:right-10 rtl:left-10 text-6xl md:text-8xl text-accent-500/20 animate-bounce delay-700">
                <i class="fas fa-terminal"></i>
            </div>
            <div class="absolute bottom-1/4 ltr:right-20 rtl:left-20 text-6xl md:text-[8rem] text-red-500/10 -rotate-12 animate-pulse delay-500">
                <i class="fab fa-laravel"></i>
            </div>
        </div>
        <div class="container mx-auto px-6 text-center z-10">
            <div class="mb-8" data-aos="fade-down">
                <div class="relative w-40 md:w-60 aspect-square mx-auto" style="max-width: 240px!important; max-height: 240px!important;">
                    <div class="absolute inset-0 bg-gradient-to-tr from-primary-500 to-accent-500 rounded-full blur-lg opacity-50 animate-pulse"></div>
                    <img src="{{ asset('images/profile.png') }}" alt="{{ __('Said Albalahy') }}" class="relative w-full h-full object-cover rounded-full border-4 border-white/10 shadow-2xl">
                </div>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-effect text-primary-400 mb-8" data-aos="fade-down" data-aos-delay="100">
                <i class="fas fa-rocket animate-bounce"></i>
                <span>{{ __('Welcome to my coding world') }}</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">
                {{ __('I am') }} <span class="gradient-text">{{ __('Said Albalahy') }}</span>
            </h1>

            <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed" data-aos="fade-up" data-aos-delay="200">
                {{ __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.') }}
            </p>

            <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#projects" class="btn-primary">
                    <i class="fas fa-code me-2"></i> {{ __('Browse My Work') }}
                </a>
                <a href="{{ route('blog.index') }}" class="btn-secondary">
                    <i class="fas fa-book-open me-2"></i> {{ __('Read My Blog') }}
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 relative overflow-hidden">


        <div class="container mx-auto px-6 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div data-aos="fade-left">
                    <h2 class="text-3xl font-bold mb-6">{{ __('Who') }} <span class="gradient-text">{{ __('Am I?') }}</span></h2>
                    <p class="text-gray-300 leading-loose mb-4">
                        {{ __('about_description') }}
                    </p>
                    <div class="grid grid-cols-2 gap-4 mt-8">
                        <div class="p-4 glass-effect rounded-xl text-center">
                            <i class="fas fa-project-diagram text-2xl text-primary-400 mb-2"></i>
                            <div class="text-2xl font-bold">50+</div>
                            <div class="text-sm text-gray-400">{{ __('Project') }}</div>
                        </div>
                        <div class="p-4 glass-effect rounded-xl text-center">
                            <i class="fas fa-clock text-2xl text-accent-400 mb-2"></i>
                            <div class="text-2xl font-bold">3+</div>
                            <div class="text-sm text-gray-400">{{ __('Years of Experience') }}</div>
                        </div>
                    </div>
                </div>
                <div class="relative" data-aos="fade-right">
                    <div class="absolute inset-0 bg-gradient-to-r from-primary-500 to-accent-500 rounded-2xl rotate-3 blur opacity-30"></div>
                    <div class="glass-effect p-8 rounded-2xl relative">
                        <h3 class="text-xl font-bold mb-4 border-b border-white/10 pb-4">{{ __('Technical Skills') }}</h3>
                        <div class="space-y-4">
                            @forelse($skills as $skill)
                                <div x-data="{ width: 0 }" x-init="setTimeout(() => width = {{ $skill->proficiency }}, 200)">
                                    <div class="flex justify-between mb-1">
                                        <div class="flex items-center gap-2">
                                            @if($skill->icon)
                                                <i class="{{ $skill->icon }} text-primary-400"></i>
                                            @endif
                                            <span>{{ $skill->getTrans('name') }}</span>
                                        </div>
                                        <span class="text-primary-400">{{ $skill->proficiency }}%</span>
                                    </div>
                                    <div class="h-2 bg-white/10 rounded-full overflow-hidden">
                                        <div class="h-full bg-gradient-to-r from-primary-500 to-primary-400 transition-all duration-1000 ease-out" :style="'width: ' + width + '%'"></div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center text-gray-400 py-4">
                                    {{ __('No skills added yet.') }}
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles Preview -->
    <section class="py-20 bg-dark-900/30">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">{{ __('Latest') }} <span class="gradient-text">{{ __('Articles') }}</span></h2>
                <p class="text-gray-400">{{ __('articles_intro') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article class="glass-effect rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 group" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="h-48 bg-gray-800 relative overflow-hidden">
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary-900/50 to-accent-900/50 group-hover:scale-110 transition-transform duration-500"></div>
                            @if($post->featured_image)
                                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->getTrans('title') }}" class="absolute inset-0 w-full h-full object-cover -z-10 group-hover:scale-110 transition-transform duration-500">
                            @endif
                            @if($post->categories->isNotEmpty())
                                <span class="absolute top-4 end-4 px-3 py-1 bg-primary-500 text-xs rounded-full">{{ $post->categories->first()->getTrans('name') }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 group-hover:text-primary-400 transition-colors">{{ $post->getTrans('title') }}</h3>
                            <p class="text-gray-400 text-sm mb-4 line-clamp-2">{{ Str::limit($post->getTrans('excerpt'), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-primary-400 text-sm font-semibold hover:tracking-wide transition-all">{{ __('Read More') }} <i class="fas fa-arrow-right text-xs rtl:rotate-180"></i></a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-4">
                            <i class="fas fa-newspaper text-2xl text-gray-500"></i>
                        </div>
                        <p class="text-gray-400">{{ __('No articles available yet.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-20 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-dark-900/50 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-effect text-accent-400 mb-4">
                    <i class="fas fa-code"></i>
                    <span>{{ __('Portfolio') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6">{{ __('Featured') }} <span class="gradient-text">{{ __('Projects') }}</span></h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    {{ __('projects_intro') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 gap-8">
                @forelse($projects as $project)
                    <div class="glass-effect rounded-3xl p-2 group hover:bg-white/5 transition-colors" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden rounded-2xl aspect-video">
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary-600 to-accent-600 opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="absolute inset-0 flex items-center justify-center bg-dark-950/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('projects.show', $project) }}" class="btn-primary transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="{{ $project->getTrans('title') }}">
                            @else
                                <div class="w-full h-full bg-dark-800 flex items-center justify-center text-gray-600">
                                    <i class="fas fa-laptop-code text-6xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2">{{ $project->getTrans('title') }}</h3>
                                    <div class="flex gap-2">
                                        @if(is_array($project->technologies))
                                            @foreach(array_slice($project->technologies, 0, 3) as $tech) 
                                                <span class="px-3 py-1 rounded-full bg-primary-500/10 text-primary-400 text-xs border border-primary-500/20">{{ $tech }}</span>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                                @if(!empty($project->links['github']))
                                    <a href="{{ $project->links['github'] }}" class="text-gray-400 hover:text-white transition-colors"><i class="fab fa-github text-xl"></i></a>
                                @endif
                            </div>
                            <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ $project->getTrans('description') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        {{ __('No projects to display yet.') }}
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}" class="btn-secondary">
                    <span>{{ __('View All Projects') }}</span>
                    <i class="fas fa-arrow-right me-2 rtl:rotate-180"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-dark-900/20">
        <div class="container mx-auto px-6">
            <div class="glass-effect rounded-3xl p-8 md:p-12 overflow-hidden relative">
                <!-- Background Decorative Elements -->
                <div class="absolute top-0 end-0 w-64 h-64 bg-primary-500/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="grid md:grid-cols-2 gap-12 relative z-10">
                    <div data-aos="fade-left">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('Lets Start Something') }} <span class="gradient-text">{{ __('Great') }}</span> {{ __('Together') }}</h2>
                        <p class="text-gray-400 mb-8 leading-relaxed">
                            {{ __('contact_intro') }}
                        </p>
                        
                        <div class="space-y-6">
                            <a href="mailto:sh.elbalahy@gmail.com" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-primary-400 group-hover:bg-primary-500 group-hover:text-white transition-all">
                                    <i class="fas fa-envelope text-xl"></i>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">{{ __('Email') }}</span>
                                    <span class="text-lg font-semibold group-hover:text-primary-400 transition-colors">sh.elbalahy@gmail.com</span>
                                </div>
                            </a>
                            
                             <a href="https://wa.me/201067481561" target="_blank" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 rounded-full glass-effect flex items-center justify-center text-accent-400 group-hover:bg-accent-500 group-hover:text-white transition-all">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </div>
                                <div>
                                    <span class="block text-sm text-gray-500">{{ __('WhatsApp') }}</span>
                                    <span class="text-lg font-semibold group-hover:text-accent-400 transition-colors">01067481561</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="glass-effect bg-dark-950/30 rounded-2xl p-6" data-aos="fade-right">
                        @if(session('success'))
                            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">{{ __('Name') }}</label>
                                    <input type="text" name="name" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Your Name') }}">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-400 mb-2">{{ __('Email') }}</label>
                                    <input type="email" name="email" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="email@example.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">{{ __('Subject') }}</label>
                                <input type="text" name="subject" class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('What to discuss') }}">
                            </div>
                            <div>
                                <label class="block text-sm text-gray-400 mb-2">{{ __('Message') }}</label>
                                <textarea name="message" rows="4" required class="w-full bg-dark-900/50 border border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Write message here') }}"></textarea>
                            </div>
                            <button type="submit" class="w-full btn-primary py-3 rounded-lg flex justify-center items-center gap-2 group">
                                <span>{{ __('Send Message') }}</span>
                                <i class="fas fa-paper-plane group-hover:-translate-y-1 group-hover:translate-x-1 rtl:group-hover:-translate-x-1 transition-transform"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-layout>
