<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Blog Posts Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-indigo-600">{{ __('Manage Blog') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Create, edit, and manage your blog posts.') }}</p>
                        <a href="{{ route('admin.posts.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Go to Blog') }}
                        </a>
                    </div>
                </div>

                <!-- Projects Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-gray-800">{{ __('Manage Projects') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Showcase your work and manage your portfolio projects.') }}</p>
                        <a href="{{ route('admin.projects.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Go to Projects') }}
                        </a>
                    </div>
                </div>

                <!-- Categories Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-indigo-600">{{ __('Categories') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Manage blog categories for better organization.') }}</p>
                        <a href="{{ route('admin.categories.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:border-indigo-900 focus:ring ring-indigo-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Manage Categories') }}
                        </a>
                    </div>
                </div>

                <!-- Tags Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-blue-600">{{ __('Tags') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Manage tags for your portfolio projects.') }}</p>
                        <a href="{{ route('admin.tags.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-900 focus:outline-none focus:border-blue-900 focus:ring ring-blue-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Manage Tags') }}
                        </a>
                    </div>
                </div>

                <!-- Skills Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-green-600">{{ __('Skills') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Manage your technical skills and proficiency.') }}</p>
                        <a href="{{ route('admin.skills.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-green-700 active:bg-green-900 focus:outline-none focus:border-green-900 focus:ring ring-green-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Manage Skills') }}
                        </a>
                    </div>
                </div>

                <!-- Settings Card -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition-shadow duration-300">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-bold mb-2 text-purple-600">{{ __('Settings') }}</h3>
                        <p class="mb-4 text-gray-600">{{ __('Configure website theme and preferences.') }}</p>
                        <a href="{{ route('admin.settings.index') }}" wire:navigate class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-purple-700 active:bg-purple-900 focus:outline-none focus:border-purple-900 focus:ring ring-purple-300 disabled:opacity-25 transition ease-in-out duration-150">
                            {{ __('Go to Settings') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
