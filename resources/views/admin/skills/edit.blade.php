<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Skill') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.skills.update', $skill) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <x-input-label for="name_ar" :value="__('Name (Arabic)')" />
                                <x-text-input id="name_ar" name="name[ar]" type="text" class="mt-1 block w-full" :value="old('name.ar', $skill->name['ar'] ?? '')" required autofocus />
                                <x-input-error class="mt-2" :messages="$errors->get('name.ar')" />
                            </div>

                            <div>
                                <x-input-label for="name_en" :value="__('Name (English)')" />
                                <x-text-input id="name_en" name="name[en]" type="text" class="mt-1 block w-full" :value="old('name.en', $skill->name['en'] ?? '')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('name.en')" />
                            </div>
                        </div>

                        <div>
                            <x-input-label for="type" :value="__('Skill Type')" />
                            <select id="type" name="type" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value="technical" {{ old('type', $skill->type) == 'technical' ? 'selected' : '' }}>{{ __('Technical Skill') }}</option>
                                <option value="general" {{ old('type', $skill->type) == 'general' ? 'selected' : '' }}>{{ __('General Skill') }}</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('type')" />
                        </div>

                        <div>
                            <x-input-label for="proficiency" :value="__('Proficiency (%)')" />
                            <x-text-input id="proficiency" name="proficiency" type="number" min="0" max="100" class="mt-1 block w-full" :value="old('proficiency', $skill->proficiency)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('proficiency')" />
                        </div>

                        <div>
                            <x-input-label for="icon" :value="__('Icon (FontAwesome Class, e.g., fab fa-laravel)')" />
                            <x-text-input id="icon" name="icon" type="text" class="mt-1 block w-full" :value="old('icon', $skill->icon)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('icon')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Update') }}</x-primary-button>
                            <a href="{{ route('admin.skills.index') }}" class="text-gray-400 hover:text-white">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
