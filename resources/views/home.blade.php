<x-layout>
    @section('title', __('Said Albalahy - Home'))
    @section('meta_description', __('hero_tagline') . ' - ' . __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.'))
    @section('meta_image', asset('images/personal_preview.png') . '?v=' . time())

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
                    <img src="{{ asset('images/profile.png') }}" alt="{{ __('Said Albalahy') }}" class="relative w-full h-full object-cover rounded-full border-4 border-slate-200 dark:border-white/10 shadow-2xl">
                </div>
            </div>

            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full premium-card text-primary-400 mb-8" data-aos="fade-down" data-aos-delay="100">
                <i class="fas fa-rocket animate-bounce"></i>
                <span>{{ __('hero_tagline') }}</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">
                {{ __('I am') }} <span class="gradient-text">{{ __('Said Albalahy') }}</span>
            </h1>

            <div class="text-xl text-slate-600 dark:text-gray-400 max-w-3xl mx-auto mb-10 leading-relaxed space-y-4" data-aos="fade-up" data-aos-delay="200">
                <p class="font-semibold text-accent-400">
                    {{ __('Co-founder of Pharmakheir') }} & {{ __('Founder of Octukheir') }}
                </p>
                <p>
                    {{ __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.') }}
                </p>
                <p class="text-base text-slate-500 dark:text-gray-500">
                    {{ __('Also proficient in Flutter, C++, C#, and other technologies.') }}
                </p>
            </div>

            <div class="flex justify-center gap-4" data-aos="fade-up" data-aos-delay="300">
                <a href="#projects" class="btn-primary">
                    <i class="fas fa-code me-2"></i> {{ __('Browse My Work') }}
                </a>
                <a href="{{ route('blog.index') }}" wire:navigate class="btn-secondary">
                    <i class="fas fa-book-open me-2"></i> {{ __('Read My Blog') }}
                </a>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 relative overflow-hidden">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800 dark:text-white"> <span class="gradient-text"> {{ __('About Me') }} </span></h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- Education Card -->
                <div class="premium-card p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400 mb-4">
                            <i class="fas fa-graduation-cap text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">{{ __('Education') }}</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                            {{ __('Bachelor of Pharmacy - Transitioned from the medical field to the world of technology.') }}
                        </p>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="premium-card p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300 md:row-span-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-4 text-slate-800 dark:text-white border-b border-slate-200 dark:border-white/10 pb-4">{{ __('My Professional Vision') }}</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed space-y-4">
                            {{ __('I believe in the power of technology to improve people\'s lives and develop businesses. I moved from pharmacy to programming driven by my passion for solving problems and building innovative solutions.') }}
                            <br><br>
                            {{ __('I focus on developing robust and scalable web applications, ensuring clean code that is easy to maintain and develop. My goal is to provide technical solutions that meet client needs and exceed their expectations.') }}
                        </p>
                    </div>
                </div>

                <!-- Specialization Card -->
                <div class="premium-card p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                     <div class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                     <div class="relative z-10">
                        <div class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center text-pink-400 mb-4">
                            <i class="fas fa-laptop-code text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">{{ __('Current Specialization') }}</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                            {{ __('Backend Developer specializing in PHP, Laravel, and Livewire.') }}
                        </p>
                     </div>
                </div>

                <!-- Experience Card -->
                <div class="premium-card p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center text-green-400 mb-4">
                            <i class="fas fa-briefcase text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-slate-800 dark:text-white">{{ __('Experience') }}</h3>
                        <p class="text-slate-600 dark:text-gray-400 leading-relaxed">
                            {{ __('Practical experience in building advanced content management systems and control panels.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Counters Section -->
             <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20" x-data="{ shown: false }" x-intersect="shown = true">
                <div class="p-6 premium-card rounded-2xl text-center group hover:scale-105 transition-transform duration-300">
                     <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-2" x-show="shown" x-transition>
                        <span x-data="{ count: 0 }" x-intersect="let interval = setInterval(() => { if (count < 3) count++; else clearInterval(interval) }, 500)">+<span x-text="count"></span></span>
                     </div>
                     <div class="text-slate-600 dark:text-gray-400 text-sm">{{ __('Years of Experience') }}</div>
                </div>
                <div class="p-6 premium-card rounded-2xl text-center group hover:scale-105 transition-transform duration-300">
                     <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-400 to-pink-500 mb-2" x-show="shown" x-transition>
                        <span x-data="{ count: 0 }" x-intersect="let interval = setInterval(() => { if (count < 20) count++; else clearInterval(interval) }, 40)">+<span x-text="count"></span></span>
                     </div>
                     <div class="text-slate-600 dark:text-gray-400 text-sm">{{ __('Project') }}</div>
                </div>
                 <!-- Add more counters if needed, keeping it balanced with 2 for now based on image -->
            </div>

            <!-- Skills Section -->
            <div id="skills" class="space-y-16">
                 <!-- Technical Skills -->
                <div>
                     <h3 class="text-3xl font-bold mb-8 text-center text-blue-400">{{ __('Technical Skills') }}</h3>
                     <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @forelse($technicalSkills as $skill)
                            <div class="premium-card p-6 rounded-2xl hover:bg-white/5 transition-all duration-300" data-aos="fade-up">
                                <div class="flex items-center gap-4 mb-4">
                                     <div class="w-12 h-12 rounded-lg bg-slate-200 dark:bg-dark-800 flex items-center justify-center text-3xl">
                                        @if($skill->icon)
                                            <i class="{{ $skill->icon }} text-blue-400"></i>
                                        @else
                                            <i class="fas fa-code text-blue-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-slate-800 dark:text-white">{{ $skill->getTrans('name') }}</h4>
                                    </div>
                                </div>
                                
                                <div class="w-full bg-slate-100 dark:bg-dark-900 rounded-full h-2.5 overflow-hidden" x-data="{ width: 0 }" x-intersect="width = {{ $skill->proficiency }}">
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2.5 rounded-full transition-all duration-1000 ease-out" :style="'width: ' + width + '%'"></div>
                                </div>
                                <div class="flex justify-end mt-2">
                                     <span class="text-sm text-blue-400 font-bold" x-data="{ count: 0 }" x-intersect="let interval = setInterval(() => { if(count < {{ $skill->proficiency }}) count++; else clearInterval(interval) }, 20)"><span x-text="count"></span>%</span>
                                </div>
                            </div>
                        @empty
                             <div class="col-span-full text-center text-slate-500 dark:text-gray-500">{{ __('No technical skills added yet.') }}</div>
                        @endforelse
                     </div>
                </div>

                <!-- General Skills -->
                @if($generalSkills->isNotEmpty())
                <div>
                     <h3 class="text-3xl font-bold mb-8 text-center text-green-400">{{ __('General Skills') }}</h3>
                     <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($generalSkills as $skill)
                            <div class="premium-card p-6 rounded-2xl hover:bg-white/5 transition-all duration-300 border border-green-500/20" data-aos="fade-up">
                                <div class="flex items-center gap-4 mb-4">
                                     <div class="w-12 h-12 rounded-lg bg-slate-200 dark:bg-dark-800 flex items-center justify-center text-3xl">
                                        @if($skill->icon)
                                            <i class="{{ $skill->icon }} text-green-400"></i>
                                        @else
                                            <i class="fas fa-star text-green-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-slate-800 dark:text-white">{{ $skill->getTrans('name') }}</h4>
                                    </div>
                                </div>
                                 <div class="w-full bg-slate-100 dark:bg-dark-900 rounded-full h-2.5 overflow-hidden" x-data="{ width: 0 }" x-intersect="width = {{ $skill->proficiency }}">
                                    <div class="bg-gradient-to-r from-green-500 to-teal-500 h-2.5 rounded-full transition-all duration-1000 ease-out" :style="'width: ' + width + '%'"></div>
                                </div>
                                 <div class="flex justify-end mt-2">
                                     <span class="text-sm text-green-400 font-bold" x-data="{ count: 0 }" x-intersect="let interval = setInterval(() => { if(count < {{ $skill->proficiency }}) count++; else clearInterval(interval) }, 20)"><span x-text="count"></span>%</span>
                                </div>
                            </div>
                        @endforeach
                     </div>
                </div>
                @endif
            </div>

        </div>
    </section>

    <!-- Project Timeline Section -->
    <section id="timeline" class="py-24 relative overflow-hidden">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full premium-card text-amber-400 mb-4">
                    <i class="fas fa-history"></i>
                    <span>{{ __('Career Story') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800 dark:text-white">{{ __('How I') }} <span class="gradient-text">{{ __('Started & Evolved') }}</span></h2>
            </div>

            <div class="relative">
                <!-- Vertical Line -->
                <div class="absolute left-1/2 transform -translate-x-1/2 h-full w-0.5 bg-gradient-to-b from-primary-500/50 via-purple-500/50 to-transparent hidden md:block"></div>

                <div class="space-y-12">
                    @foreach($timelineProjects as $project)
                        <div class="relative flex flex-col md:flex-row items-center gap-8 {{ $loop->even ? 'md:flex-row-reverse' : '' }}" data-aos="{{ $loop->even ? 'fade-left' : 'fade-right' }}">
                            <!-- Timeline Dot -->
                            <div class="absolute left-1/2 transform -translate-x-1/2 w-4 h-4 rounded-full bg-primary-500 shadow-[0_0_15px_rgba(99,102,241,0.5)] border-4 border-dark-950 z-20 hidden md:block"></div>
                            
                            <!-- Year/Date -->
                            <div class="md:w-1/2 flex {{ $loop->even ? 'md:justify-start md:ps-12' : 'md:justify-end md:pe-12' }}">
                                <span class="px-4 py-1 rounded-full bg-white/5 border border-slate-200 dark:border-white/10 text-primary-400 font-bold text-sm">
                                    {{ $project->created_at->format('Y') }}
                                </span>
                            </div>

                            <!-- Content Card -->
                            <div class="md:w-1/2">
                                <div class="premium-card p-8 rounded-[2.5rem] hover:bg-white/5 transition-all duration-500 group relative overflow-hidden">
                                    <div class="absolute top-0 right-0 w-32 h-32 bg-primary-500/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                                    
                                    <div class="flex items-center gap-4 mb-4">
                                        <div class="w-12 h-12 rounded-2xl bg-primary-500/20 flex items-center justify-center text-primary-400 group-hover:scale-110 transition-transform">
                                            <i class="fas fa-rocket"></i>
                                        </div>
                                        <h3 class="text-xl font-bold text-slate-800 dark:text-white">{{ $project->getTrans('title') }}</h3>
                                    </div>
                                    
                                    <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed line-clamp-3 mb-6">
                                        {{ strip_tags($project->getTrans('description')) }}
                                    </p>
                                    
                                    <a href="{{ route('projects.show', $project) }}" wire:navigate class="inline-flex items-center gap-2 text-primary-400 font-bold text-xs uppercase tracking-widest hover:gap-3 transition-all">
                                        {{ __('View Milestone') }}
                                        <i class="fas fa-arrow-right rtl:rotate-180"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Articles Preview -->
    <section class="py-20 bg-slate-100 dark:bg-dark-900/30">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12" data-aos="fade-up">
                <h2 class="text-3xl font-bold mb-4">{{ __('Latest') }} <span class="gradient-text">{{ __('Articles') }}</span></h2>
                <p class="text-slate-600 dark:text-gray-400">{{ __('articles_intro') }}</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                @forelse($posts as $post)
                    <article class="premium-card rounded-2xl overflow-hidden hover:-translate-y-2 transition-transform duration-300 group" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                        <div class="h-48 bg-gray-800 relative overflow-hidden">
                            @if($post->featured_image)
                                <img src="{{ Str::startsWith($post->featured_image, 'http') ? $post->featured_image : asset('storage/' . $post->featured_image) }}" alt="{{ $post->getTrans('title') }}" class="absolute inset-0 w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary-900/50 to-accent-900/50 group-hover:scale-110 transition-transform duration-500"></div>
                            @if($post->categories->isNotEmpty())
                                <span class="absolute top-4 end-4 px-3 py-1 bg-primary-500 text-xs rounded-full">{{ $post->categories->first()->getTrans('name') }}</span>
                            @endif
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3 group-hover:text-primary-400 transition-colors">{{ $post->getTrans('title') }}</h3>
                            <p class="text-slate-600 dark:text-gray-400 text-sm mb-4 line-clamp-2">{{ Str::limit($post->getTrans('excerpt'), 100) }}</p>
                            <a href="{{ route('blog.show', $post->slug) }}" wire:navigate class="text-primary-400 text-sm font-semibold hover:tracking-wide transition-all">{{ __('Read More') }} <i class="fas fa-arrow-right text-xs rtl:rotate-180"></i></a>
                        </div>
                    </article>
                @empty
                    <div class="col-span-full text-center py-12">
                        <div class="inline-flex items-center justify-center w-16 h-16 rounded-full bg-white/5 mb-4">
                            <i class="fas fa-newspaper text-2xl text-slate-500 dark:text-gray-500"></i>
                        </div>
                        <p class="text-slate-600 dark:text-gray-400">{{ __('No articles available yet.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Programming Projects Section -->
    <section id="projects" class="py-20 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-dark-900/50 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full premium-card text-accent-400 mb-4">
                    <i class="fas fa-code"></i>
                    <span>{{ __('Portfolio') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">{{ __('Programming') }} <span class="gradient-text">{{ __('Projects') }}</span></h2>
                <p class="text-slate-600 dark:text-gray-400 max-w-2xl mx-auto">
                    {{ __('Some projects I have implemented using the latest technologies') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programmingProjects as $project)
                    <div class="premium-card rounded-3xl p-2 group hover:bg-white/5 transition-colors" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden rounded-2xl aspect-video">
                            <div class="absolute inset-0 bg-gradient-to-tr from-primary-600 to-accent-600 opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="absolute inset-0 flex items-center justify-center bg-slate-50 dark:bg-dark-950/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('projects.show', $project) }}" wire:navigate class="btn-primary transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="{{ $project->getTrans('title') }}">
                            @else
                                <div class="w-full h-full bg-slate-200 dark:bg-dark-800 flex items-center justify-center text-gray-600">
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
                                    <a href="{{ $project->links['github'] }}" class="text-slate-600 dark:text-gray-400 hover:text-slate-800 dark:text-white transition-colors"><i class="fab fa-github text-xl"></i></a>
                                @endif
                            </div>
                            <div class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-6 line-clamp-2">
                                {!! $project->getTrans('description') !!}
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-slate-500 dark:text-gray-500">
                        {{ __('No programming projects to display yet.') }}
                    </div>
                @endforelse
            </div>
            
            <div class="text-center mt-12">
                <a href="{{ route('projects.index') }}" wire:navigate class="btn-secondary">
                    <span>{{ __('View All Projects') }}</span>
                    <i class="fas fa-arrow-right me-2 rtl:rotate-180"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Life Works Section -->
    <section id="life-works" class="py-20 relative bg-slate-100 dark:bg-dark-900/30">
         <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full premium-card text-green-400 mb-4">
                    <i class="fas fa-star"></i>
                    <span>{{ __('Achievements') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-teal-500">
                    {{ __('Life Works') }} & <span class="text-slate-800 dark:text-white">{{ __('Other Projects') }}</span>
                </h2>
                <p class="text-slate-600 dark:text-gray-400 max-w-2xl mx-auto">
                    {{ __('Outside of code, I have founded initiatives using my other skills') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($lifeProjects as $project)
                    <div class="premium-card rounded-3xl p-2 group hover:bg-white/5 transition-colors border border-green-500/10 hover:border-green-500/30" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden rounded-2xl aspect-video">
                            <div class="absolute inset-0 bg-gradient-to-tr from-green-600 to-teal-600 opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="absolute inset-0 flex items-center justify-center bg-slate-50 dark:bg-dark-950/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('projects.show', $project) }}" wire:navigate class="px-6 py-2 rounded-full bg-green-600 text-slate-800 dark:text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-green-500">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="{{ $project->getTrans('title') }}">
                            @else
                                <div class="w-full h-full bg-slate-200 dark:bg-dark-800 flex items-center justify-center text-gray-600">
                                    <i class="fas fa-trophy text-6xl"></i>
                                </div>
                            @endif
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-2xl font-bold mb-2 group-hover:text-green-400 transition-colors">{{ $project->getTrans('title') }}</h3>
                                    <div class="flex gap-2">
                                        <!-- Optional: tags for life works if any -->
                                    </div>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ $project->getTrans('description') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-slate-500 dark:text-gray-500">
                        {{ __('No life works to display yet.') }}
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Offers Section -->
    <section id="offers" class="py-24 relative overflow-hidden bg-slate-50 dark:bg-dark-950 border-y border-slate-200 dark:border-white/5 transition-colors duration-500">
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full premium-card text-accent-400 mb-4">
                    <i class="fas fa-tags"></i>
                    <span>{{ __('Special Offers') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-slate-800 dark:text-white">
                    {{ __('Project') }} <span class="gradient-text">{{ __('Offers & Prices') }}</span>
                </h2>
                <p class="text-slate-600 dark:text-slate-300 max-w-2xl mx-auto text-lg">
                    {{ __('عروض برمجية متكاملة بأسعار تنافسية، مصممة لتلبية احتياجات أعمالك بأحدث التقنيات.') }}
                </p>
            </div>

            @php
                $offers = [
                    [
                        'title' => 'منصة Abuelkhair 365',
                        'subtitle' => 'Laravel + Flutter',
                        'desc' => 'منصة تعليمية متكاملة بتقدم كورسات لغة إنجليزية بأدوات تفاعلية ذكية.',
                        'icon' => 'fas fa-graduation-cap',
                        'color' => 'from-blue-500 to-indigo-500',
                        'text_color' => 'text-blue-400',
                        'slug' => 'abuelkhair-proposal',
                        'features' => ['Flutter iOS + Android', 'Laravel 11 Backend', 'تسليم 18 أسبوع']
                    ],
                    [
                        'title' => 'أكاديمية OctuKheir',
                        'subtitle' => 'Laravel + Flutter',
                        'desc' => 'أكاديمية طبية شاملة لإدارة الكورسات، الامتحانات التفاعلية، وبنك الأسئلة.',
                        'icon' => 'fas fa-user-md',
                        'color' => 'from-purple-500 to-pink-500',
                        'text_color' => 'text-purple-400',
                        'slug' => 'octukheir-proposal',
                        'features' => ['Flutter iOS + Android', 'React Admin Panel', 'تسليم 14 أسبوع']
                    ],
                    [
                        'title' => 'تطبيق Breadfast Clone',
                        'subtitle' => 'Laravel + Flutter',
                        'desc' => 'تطبيق لتوصيل الطلبات والمقاضي بسرعة، بنظام إدارة مخزون وتتبع مناديب.',
                        'icon' => 'fas fa-shopping-basket',
                        'color' => 'from-orange-400 to-red-500',
                        'text_color' => 'text-orange-400',
                        'slug' => 'breadfast-proposal-v2',
                        'features' => ['Flutter App', 'Driver Tracking', 'تسليم 12 أسبوع']
                    ],
                    [
                        'title' => 'إدارة صيدلية POS',
                        'subtitle' => 'Desktop / Web',
                        'desc' => 'برنامج إدارة صيدليات متكامل، جرد، مبيعات، روشتات، وتنبيهات نواقص.',
                        'icon' => 'fas fa-pills',
                        'color' => 'from-green-400 to-emerald-600',
                        'text_color' => 'text-green-400',
                        'slug' => 'pharmacy-pos-proposal',
                        'features' => ['Web-based POS', 'Inventory Alerts', 'تسليم 8 أسابيع']
                    ],
                    [
                        'title' => 'إدارة مخزن ومستودع',
                        'subtitle' => 'Web App',
                        'desc' => 'نظام متكامل لإدارة المخازن، حركات الأصناف، الجرد، وتقارير الموردين.',
                        'icon' => 'fas fa-boxes',
                        'color' => 'from-blue-400 to-cyan-500',
                        'text_color' => 'text-cyan-400',
                        'slug' => 'warehouse-proposal',
                        'features' => ['Stock Management', 'Barcode Support', 'تسليم 6 أسابيع']
                    ],
                    [
                        'title' => 'برنامج محاسبة',
                        'subtitle' => 'للشركات الصغيرة',
                        'desc' => 'نظام محاسبي مبسط، قيود يومية، شجرة حسابات، وتقارير مالية.',
                        'icon' => 'fas fa-calculator',
                        'color' => 'from-teal-400 to-green-500',
                        'text_color' => 'text-teal-400',
                        'slug' => 'accounting-proposal',
                        'features' => ['General Ledger', 'Invoices', 'تسليم 10 أسابيع']
                    ],
                    [
                        'title' => 'تطبيقات الأطفال التعليمية',
                        'subtitle' => 'Arabic + English + Math',
                        'desc' => 'مجموعة تطبيقات تعليمية تفاعلية للأطفال لتعلم الحروف والرياضيات بأسلوب ممتع.',
                        'icon' => 'fas fa-child',
                        'color' => 'from-indigo-500 to-purple-600',
                        'text_color' => 'text-indigo-400',
                        'slug' => 'kids-proposal',
                        'features' => ['Flutter iOS + Android', '3 تطبيقات مستقلة', 'تسليم 14 أسبوع']
                    ],
                    [
                        'title' => 'تطبيق Brainquests',
                        'subtitle' => 'ألغاز وكويزات ذكية',
                        'desc' => 'تطبيق كويزات وتحديات بذكاء اصطناعي ونظام Gamification كامل.',
                        'icon' => 'fas fa-brain',
                        'color' => 'from-blue-600 to-indigo-700',
                        'text_color' => 'text-blue-400',
                        'slug' => 'brainquests-proposal',
                        'features' => ['1vs1 Real-time Challenge', 'Leagues System', 'تسليم 12 أسبوع']
                    ],
                    [
                        'title' => 'AI Study Planner',
                        'subtitle' => 'مخطط دراسي بالذكاء الاصطناعي',
                        'desc' => 'تطبيق يساعد الطلاب على تنظيم وقتهم ومذاكرتهم باستخدام تقنيات AI.',
                        'icon' => 'fas fa-robot',
                        'color' => 'from-emerald-500 to-teal-600',
                        'text_color' => 'text-emerald-400',
                        'slug' => 'ai-planner-proposal',
                        'features' => ['AI Study Planning', 'Subscription Model', 'تسليم 13 أسبوع']
                    ],
                    [
                        'title' => 'VideoCutterPro',
                        'subtitle' => 'تحرير فيديو احترافي',
                        'desc' => 'تطبيق تعديل فيديو سريع وسلس مع ميزات احترافية وبدون علامة مائية.',
                        'icon' => 'fas fa-video',
                        'color' => 'from-rose-500 to-orange-600',
                        'text_color' => 'text-rose-400',
                        'slug' => 'videocutter-proposal',
                        'features' => ['FFmpeg Engine', 'بدون واترمارك مجاناً', 'تسليم 14 أسبوع']
                    ],
                ];
            @endphp

            <!-- Swiper Container -->
            <div x-data="{
                    initSwiper() {
                        if(typeof Swiper !== 'undefined') {
                            new Swiper(this.$refs.swiper, {
                                slidesPerView: 1,
                                spaceBetween: 24,
                                loop: true,
                                autoplay: {
                                    delay: 3500,
                                    disableOnInteraction: false,
                                    pauseOnMouseEnter: true,
                                },
                                pagination: {
                                    el: '.swiper-pagination',
                                    clickable: true,
                                    dynamicBullets: true,
                                },
                                breakpoints: {
                                    640: { slidesPerView: 1.5, spaceBetween: 20 },
                                    768: { slidesPerView: 2, spaceBetween: 24 },
                                    1024: { slidesPerView: 3, spaceBetween: 30 },
                                }
                            });
                        } else {
                            setTimeout(() => this.initSwiper(), 100);
                        }
                    }
                }"
                x-init="initSwiper"
                x-ref="swiper"
                class="swiper offersSwiper !pb-16" 
                data-aos="fade-up" 
                data-aos-delay="100">
                
                <div class="swiper-wrapper">
                    @foreach($offers as $offer)
                        <div class="swiper-slide h-auto">
                            <div class="premium-card p-8 rounded-3xl h-full flex flex-col group hover:bg-white/5 transition-all duration-300 relative overflow-hidden border border-slate-200 dark:border-white/10 hover:border-primary-500/50 hover:-translate-y-2 dark:bg-dark-900/40 backdrop-blur-md">
                                <div class="absolute top-0 end-0 w-32 h-32 bg-gradient-to-br {{ $offer['color'] }} rounded-full blur-3xl opacity-10 group-hover:opacity-20 transition-opacity -translate-y-1/2 translate-x-1/2"></div>
                                
                                <div class="w-14 h-14 rounded-2xl bg-slate-100 dark:bg-dark-800 flex items-center justify-center text-2xl mb-6 shadow-inner {{ $offer['text_color'] }} group-hover:scale-110 transition-transform">
                                    <i class="{{ $offer['icon'] }}"></i>
                                </div>
                                
                                <h3 class="text-xl font-bold mb-2 text-slate-800 dark:text-white">{{ $offer['title'] }}</h3>
                                <p class="text-sm font-semibold {{ $offer['text_color'] }} mb-4 opacity-80">{{ $offer['subtitle'] }}</p>
                                
                                <p class="text-slate-600 dark:text-gray-400 text-sm leading-relaxed mb-6 flex-grow">
                                    {{ $offer['desc'] }}
                                </p>
                                
                                <ul class="space-y-3 mb-8">
                                    @foreach($offer['features'] as $feature)
                                        <li class="flex items-center gap-3 text-sm text-slate-600 dark:text-gray-400">
                                            <i class="fas fa-check-circle {{ $offer['text_color'] }} text-xs opacity-80"></i>
                                            <span>{{ $feature }}</span>
                                        </li>
                                    @endforeach
                                    <li class="flex items-center gap-3 text-sm text-slate-800 dark:text-gray-300 mt-2 p-2 rounded-lg bg-accent-500/10 dark:bg-accent-500/20 border border-accent-500/20 dark:border-accent-500/30">
                                        <i class="fas fa-handshake text-accent-500"></i>
                                        <span class="font-bold">{{ __('الأسعار والعروض قابلة للتفاوض') }}</span>
                                    </li>
                                </ul>
                                
                                <a href="{{ route('offers.show', $offer['slug']) }}" class="btn-primary w-full text-center py-3 rounded-xl mt-auto transition-all flex items-center justify-center gap-2 group-hover:shadow-[0_4px_20px_rgba(37,99,235,0.25)]">
                                    <span>{{ __('عرض تفاصيل المشروع') }}</span>
                                    <i class="fas fa-arrow-left text-sm rtl:rotate-180 group-hover:-translate-x-1 rtl:group-hover:translate-x-1 transition-transform"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                
                <!-- Add Pagination -->
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-slate-100 dark:bg-dark-900/20">
        <div class="container mx-auto px-6">
            <div class="premium-card rounded-3xl p-8 md:p-12 overflow-hidden relative">
                <!-- Background Decorative Elements -->
                <div class="absolute top-0 end-0 w-64 h-64 bg-primary-500/10 rounded-full blur-[80px] -translate-y-1/2 translate-x-1/2"></div>
                
                <div class="grid md:grid-cols-2 gap-12 relative z-10">
                    <div data-aos="fade-left">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">{{ __('Lets Start Something') }} <span class="gradient-text">{{ __('Great') }}</span> {{ __('Together') }}</h2>
                        <p class="text-slate-600 dark:text-gray-400 mb-8 leading-relaxed">
                            {{ __('contact_intro') }}
                        </p>
                        
                        <div class="space-y-6">
                            <a href="mailto:ceo@albalahy4u.com" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 bg-white/5 rounded-2xl flex items-center justify-center group-hover:bg-primary-500/20 transition-colors">
                                    <i class="fas fa-envelope text-xl text-slate-400 group-hover:text-primary-400"></i>
                                </div>
                                <div>
                                    <p class="text-slate-400 text-sm mb-1">{{ __('Email') }}</p>
                                    <span class="text-lg font-semibold group-hover:text-primary-400 transition-colors">ceo@albalahy4u.com</span>
                                </div>
                            </a>
                            
                             <a href="https://wa.me/201067481561" target="_blank" class="flex items-center gap-4 group">
                                <div class="w-12 h-12 rounded-full premium-card flex items-center justify-center text-accent-400 group-hover:bg-accent-500 group-hover:text-slate-800 dark:text-white transition-all">
                                    <i class="fab fa-whatsapp text-xl"></i>
                                </div>
                                <div>
                                    <span class="block text-sm text-slate-500 dark:text-gray-500">{{ __('WhatsApp') }}</span>
                                    <span class="text-lg font-semibold group-hover:text-accent-400 transition-colors">01067481561</span>
                                </div>
                            </a>
                        </div>
                    </div>
                    
                    <div class="premium-card bg-slate-50 dark:bg-dark-950/30 rounded-2xl p-6" data-aos="fade-right">
                        @if(session('success'))
                            <div class="mb-4 p-4 text-green-700 bg-green-100 rounded-lg dark:bg-green-200 dark:text-green-800" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-slate-600 dark:text-gray-400 mb-2">{{ __('Name') }}</label>
                                    <input type="text" name="name" required class="w-full bg-slate-100 dark:bg-dark-900/50 border border-slate-200 dark:border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Your Name') }}">
                                </div>
                                <div>
                                    <label class="block text-sm text-slate-600 dark:text-gray-400 mb-2">{{ __('Email') }}</label>
                                    <input type="email" name="email" required class="w-full bg-slate-100 dark:bg-dark-900/50 border border-slate-200 dark:border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="email@example.com">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-slate-600 dark:text-gray-400 mb-2">{{ __('Subject') }}</label>
                                <input type="text" name="subject" class="w-full bg-slate-100 dark:bg-dark-900/50 border border-slate-200 dark:border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('What to discuss') }}">
                            </div>
                            <div>
                                <label class="block text-sm text-slate-600 dark:text-gray-400 mb-2">{{ __('Message') }}</label>
                                <textarea name="message" rows="4" required class="w-full bg-slate-100 dark:bg-dark-900/50 border border-slate-200 dark:border-white/10 rounded-lg px-4 py-3 focus:outline-none focus:border-primary-500/50 transition-colors" placeholder="{{ __('Write message here') }}"></textarea>
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
