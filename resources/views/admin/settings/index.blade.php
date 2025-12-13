<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-bold mb-6">{{ __('Appearance') }}</h3>
                    
                    <form action="{{ route('admin.settings.update') }}" method="POST">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            @foreach($themes as $key => $theme)
                                <label class="cursor-pointer group">
                                    <input type="radio" name="theme" value="{{ $key }}" class="peer sr-only" {{ $activeTheme == $key ? 'checked' : '' }}>
                                    <div class="border-2 border-transparent peer-checked:border-primary-500 rounded-xl overflow-hidden transition-all shadow-lg hover:shadow-xl">
                                        <div class="h-24 relative p-4" style="background-color: rgb({{ $theme['colors']['bg'] }})">
                                            <div class="absolute inset-0 opacity-20 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent"></div>
                                            
                                            <!-- Color Swatches -->
                                            <div class="flex gap-2 relative z-10">
                                                <div class="w-8 h-8 rounded-full shadow-md" style="background-color: rgb({{ $theme['colors']['primary'] }})"></div>
                                                <div class="w-8 h-8 rounded-full shadow-md" style="background-color: rgb({{ $theme['colors']['accent'] }})"></div>
                                            </div>

                                            <div class="absolute bottom-2 left-2 text-white font-bold text-sm drop-shadow-md">
                                                {{ $theme['name'] }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-2 text-center text-sm text-gray-500 peer-checked:text-primary-500 font-medium">
                                        {{ $activeTheme == $key ? __('Active') : '' }}
                                    </div>
                                </label>
                            @endforeach
                        </div>

                        <div class="mt-8">
                            <x-primary-button>{{ __('Save Changes') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
