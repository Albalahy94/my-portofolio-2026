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
                <span>{{ __('hero_tagline') }}</span>
            </div>

            <h1 class="text-5xl md:text-7xl font-bold mb-6" data-aos="fade-up" data-aos-delay="100">
                {{ __('I am') }} <span class="gradient-text">{{ __('Said Albalahy') }}</span>
            </h1>

            <div class="text-xl text-gray-400 max-w-3xl mx-auto mb-10 leading-relaxed space-y-4" data-aos="fade-up" data-aos-delay="200">
                <p class="font-semibold text-accent-400">
                    {{ __('Co-founder of Pharmakheir') }} & {{ __('Founder of Octukheir') }}
                </p>
                <p>
                    {{ __('Backend developer specialized in building robust web applications using Laravel. I turn complex ideas into efficient and fast software systems.') }}
                </p>
                <p class="text-base text-gray-500">
                    {{ __('Also proficient in Flutter, C++, C#, and other technologies.') }}
                </p>
            </div>

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
            <div class="text-center mb-16" data-aos="fade-up">
                <h2 class="text-3xl md:text-5xl font-bold mb-6 text-white"> <span class="gradient-text"> {{ __('About Me') }} </span></h2>
            </div>

            <div class="grid md:grid-cols-2 gap-8 mb-16">
                <!-- Education Card -->
                <div class="glass-effect p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="100">
                    <div class="absolute inset-0 bg-gradient-to-br from-blue-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-blue-500/20 rounded-lg flex items-center justify-center text-blue-400 mb-4">
                            <i class="fas fa-graduation-cap text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">{{ __('Education') }}</h3>
                        <p class="text-gray-400 leading-relaxed">
                            {{ __('Bachelor of Pharmacy - Transitioned from the medical field to the world of technology.') }}
                        </p>
                    </div>
                </div>

                <!-- Vision Card -->
                <div class="glass-effect p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300 md:row-span-2" data-aos="fade-up" data-aos-delay="200">
                    <div class="absolute inset-0 bg-gradient-to-br from-purple-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <h3 class="text-xl font-bold mb-4 text-white border-b border-white/10 pb-4">{{ __('My Professional Vision') }}</h3>
                        <p class="text-gray-400 leading-relaxed space-y-4">
                            {{ __('I believe in the power of technology to improve people\'s lives and develop businesses. I moved from pharmacy to programming driven by my passion for solving problems and building innovative solutions.') }}
                            <br><br>
                            {{ __('I focus on developing robust and scalable web applications, ensuring clean code that is easy to maintain and develop. My goal is to provide technical solutions that meet client needs and exceed their expectations.') }}
                        </p>
                    </div>
                </div>

                <!-- Specialization Card -->
                <div class="glass-effect p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="300">
                     <div class="absolute inset-0 bg-gradient-to-br from-pink-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                     <div class="relative z-10">
                        <div class="w-12 h-12 bg-pink-500/20 rounded-lg flex items-center justify-center text-pink-400 mb-4">
                            <i class="fas fa-laptop-code text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">{{ __('Current Specialization') }}</h3>
                        <p class="text-gray-400 leading-relaxed">
                            {{ __('Backend Developer specializing in PHP, Laravel, and Livewire.') }}
                        </p>
                     </div>
                </div>

                <!-- Experience Card -->
                <div class="glass-effect p-8 rounded-2xl relative group hover:bg-white/5 transition-all duration-300" data-aos="fade-up" data-aos-delay="400">
                    <div class="absolute inset-0 bg-gradient-to-br from-green-500/10 to-transparent opacity-0 group-hover:opacity-100 transition-opacity rounded-2xl"></div>
                    <div class="relative z-10">
                        <div class="w-12 h-12 bg-green-500/20 rounded-lg flex items-center justify-center text-green-400 mb-4">
                            <i class="fas fa-briefcase text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-bold mb-3 text-white">{{ __('Experience') }}</h3>
                        <p class="text-gray-400 leading-relaxed">
                            {{ __('Practical experience in building advanced content management systems and control panels.') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Counters Section -->
             <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mb-20" x-data="{ shown: false }" x-intersect="shown = true">
                <div class="p-6 glass-effect rounded-2xl text-center group hover:scale-105 transition-transform duration-300">
                     <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-400 to-purple-500 mb-2" x-show="shown" x-transition>
                        <span x-data="{ count: 0 }" x-init="let interval = setInterval(() => { if (count < 3) count++; else clearInterval(interval) }, 500)">+<span x-text="count"></span></span>
                     </div>
                     <div class="text-gray-400 text-sm">{{ __('Years of Experience') }}</div>
                </div>
                <div class="p-6 glass-effect rounded-2xl text-center group hover:scale-105 transition-transform duration-300">
                     <div class="text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-accent-400 to-pink-500 mb-2" x-show="shown" x-transition>
                        <span x-data="{ count: 0 }" x-init="let interval = setInterval(() => { if (count < 50) count++; else clearInterval(interval) }, 40)">+<span x-text="count"></span></span>
                     </div>
                     <div class="text-gray-400 text-sm">{{ __('Project') }}</div>
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
                            <div class="glass-effect p-6 rounded-2xl hover:bg-white/5 transition-all duration-300" data-aos="fade-up">
                                <div class="flex items-center gap-4 mb-4">
                                     <div class="w-12 h-12 rounded-lg bg-dark-800 flex items-center justify-center text-3xl">
                                        @if($skill->icon)
                                            <i class="{{ $skill->icon }} text-blue-400"></i>
                                        @else
                                            <i class="fas fa-code text-blue-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-white">{{ $skill->getTrans('name') }}</h4>
                                    </div>
                                </div>
                                
                                <div class="w-full bg-dark-900 rounded-full h-2.5 overflow-hidden" x-data="{ width: 0 }" x-intersect="width = {{ $skill->proficiency }}">
                                    <div class="bg-gradient-to-r from-blue-500 to-purple-500 h-2.5 rounded-full transition-all duration-1000 ease-out" :style="'width: ' + width + '%'"></div>
                                </div>
                                <div class="flex justify-end mt-2">
                                     <span class="text-sm text-blue-400 font-bold" x-data="{ count: 0 }" x-intersect="let interval = setInterval(() => { if(count < {{ $skill->proficiency }}) count++; else clearInterval(interval) }, 20)"><span x-text="count"></span>%</span>
                                </div>
                            </div>
                        @empty
                             <div class="col-span-full text-center text-gray-500">{{ __('No technical skills added yet.') }}</div>
                        @endforelse
                     </div>
                </div>

                <!-- General Skills -->
                @if($generalSkills->isNotEmpty())
                <div>
                     <h3 class="text-3xl font-bold mb-8 text-center text-green-400">{{ __('General Skills') }}</h3>
                     <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($generalSkills as $skill)
                            <div class="glass-effect p-6 rounded-2xl hover:bg-white/5 transition-all duration-300 border border-green-500/20" data-aos="fade-up">
                                <div class="flex items-center gap-4 mb-4">
                                     <div class="w-12 h-12 rounded-lg bg-dark-800 flex items-center justify-center text-3xl">
                                        @if($skill->icon)
                                            <i class="{{ $skill->icon }} text-green-400"></i>
                                        @else
                                            <i class="fas fa-star text-green-400"></i>
                                        @endif
                                    </div>
                                    <div>
                                        <h4 class="font-bold text-lg text-white">{{ $skill->getTrans('name') }}</h4>
                                    </div>
                                </div>
                                 <div class="w-full bg-dark-900 rounded-full h-2.5 overflow-hidden" x-data="{ width: 0 }" x-intersect="width = {{ $skill->proficiency }}">
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

    <!-- Programming Projects Section -->
    <section id="programming-projects" class="py-20 relative">
        <div class="absolute inset-0 bg-gradient-to-b from-transparent to-dark-900/50 pointer-events-none"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-effect text-accent-400 mb-4">
                    <i class="fas fa-code"></i>
                    <span>{{ __('Portfolio') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-blue-400 to-purple-500">{{ __('Programming') }} <span class="gradient-text">{{ __('Projects') }}</span></h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    {{ __('Some projects I have implemented using the latest technologies') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($programmingProjects as $project)
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
                        {{ __('No programming projects to display yet.') }}
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

    <!-- Life Works Section -->
    <section id="life-works" class="py-20 relative bg-dark-900/30">
         <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass-effect text-green-400 mb-4">
                    <i class="fas fa-star"></i>
                    <span>{{ __('Achievements') }}</span>
                </div>
                <h2 class="text-3xl md:text-5xl font-bold mb-6 bg-clip-text text-transparent bg-gradient-to-r from-green-400 to-teal-500">
                    {{ __('Life Works') }} & <span class="text-white">{{ __('Other Projects') }}</span>
                </h2>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    {{ __('Outside of code, I have founded initiatives using my other skills') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($lifeProjects as $project)
                    <div class="glass-effect rounded-3xl p-2 group hover:bg-white/5 transition-colors border border-green-500/10 hover:border-green-500/30" data-aos="fade-up" data-aos-delay="100">
                        <div class="relative overflow-hidden rounded-2xl aspect-video">
                            <div class="absolute inset-0 bg-gradient-to-tr from-green-600 to-teal-600 opacity-20 group-hover:opacity-30 transition-opacity"></div>
                            <div class="absolute inset-0 flex items-center justify-center bg-dark-950/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('projects.show', $project) }}" class="px-6 py-2 rounded-full bg-green-600 text-white transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300 hover:bg-green-500">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" class="w-full h-full object-cover" alt="{{ $project->getTrans('title') }}">
                            @else
                                <div class="w-full h-full bg-dark-800 flex items-center justify-center text-gray-600">
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
                            <p class="text-gray-400 text-sm leading-relaxed mb-6 line-clamp-2">
                                {{ $project->getTrans('description') }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center text-gray-500">
                        {{ __('No life works to display yet.') }}
                    </div>
                @endforelse
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
