<x-layout>
    @section('title', __('Projects') . ' - ' . __('Said Albalahy'))

    <section class="min-h-screen pt-32 pb-20 relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16" data-aos="fade-down">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">{{ __('My Projects') }}</h1>
                <p class="text-gray-400 max-w-2xl mx-auto">
                    {{ __('Explore existing codebase') }} <!-- Placeholder text, need better translation key or text -->
                    {{ __('Some of the projects I executed using the latest technologies') }}
                </p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($projects as $project)
                    <div class="glass-effect rounded-3xl p-2 group hover:bg-white/5 transition-colors" data-aos="fade-up">
                        <div class="relative overflow-hidden rounded-2xl aspect-video">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->getTrans('title') }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-dark-800 flex items-center justify-center text-gray-600">
                                    <i class="fas fa-laptop-code text-6xl"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 flex items-center justify-center bg-dark-950/60 opacity-0 group-hover:opacity-100 transition-all duration-300">
                                <a href="{{ route('projects.show', $project) }}" class="btn-primary transform translate-y-4 group-hover:translate-y-0 transition-transform duration-300">
                                    {{ __('View Details') }}
                                </a>
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-2">{{ $project->getTrans('title') }}</h3>
                            <div class="flex flex-wrap gap-2 mb-4">
                                @if(is_array($project->technologies))
                                    @foreach($project->technologies as $tech)
                                        <span class="px-3 py-1 rounded-full bg-primary-500/10 text-primary-400 text-xs border border-primary-500/20">{{ $tech }}</span>
                                    @endforeach
                                @endif
                            </div>
                            <p class="text-gray-400 text-sm line-clamp-3 mb-4">
                                {{ Str::limit($project->getTrans('description'), 100) }}
                            </p>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-20 text-gray-500">
                        <i class="fas fa-folder-open text-6xl mb-4"></i>
                        <p>{{ __('No projects found yet.') }}</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>
</x-layout>
