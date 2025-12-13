<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('تعديل الوسم') }}: {{ $tag->getTrans('name') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('admin.tags.update', $tag->id) }}" class="space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="name_ar" :value="__('الاسم (عربي)')" />
                            <x-text-input id="name_ar" name="name_ar" type="text" class="mt-1 block w-full" :value="old('name_ar', $tag->name['ar'] ?? '')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                        </div>
                        <div>
                            <x-input-label for="name_en" :value="__('الاسم (English)')" />
                            <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" :value="old('name_en', $tag->name['en'] ?? '')" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                        </div>
                         <div>
                            <x-input-label for="slug" :value="__('Slug (Optional)')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full dir-ltr" :value="old('slug', $tag->slug)" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('تحديث') }}</x-primary-button>
                            <a href="{{ route('admin.tags.index') }}" class="text-gray-600 hover:underline">{{ __('إلغاء') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
