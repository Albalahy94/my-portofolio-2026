<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('الوسوم (Tags)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Create Tag Form -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('إضافة وسم جديد') }}
                        </h2>
                    </header>
                    <form method="POST" action="{{ route('admin.tags.store') }}" class="mt-6 space-y-6">
                        @csrf
                        <div>
                            <x-input-label for="name_ar" :value="__('الاسم (عربي)')" />
                            <x-text-input id="name_ar" name="name_ar" type="text" class="mt-1 block w-full" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name_ar')" />
                        </div>
                        <div>
                            <x-input-label for="name_en" :value="__('الاسم (English)')" />
                            <x-text-input id="name_en" name="name_en" type="text" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('name_en')" />
                        </div>
                         <div>
                            <x-input-label for="slug" :value="__('Slug (Optional)')" />
                            <x-text-input id="slug" name="slug" type="text" class="mt-1 block w-full dir-ltr" />
                            <x-input-error class="mt-2" :messages="$errors->get('slug')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('حفظ') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tags List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">{{ __('الاسم') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('الاسم (EN)') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Slug') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('العمليات') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tags as $tag)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $tag->getTrans('name') }}
                                </td>
                                 <td class="px-6 py-4">
                                    {{ $tag->name['en'] ?? '-' }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $tag->slug }}
                                </td>
                                <td class="px-6 py-4 flex gap-2">
                                    <a href="{{ route('admin.tags.edit', $tag->id) }}" wire:navigate class="font-medium text-blue-600 hover:underline">{{ __('تعديل') }}</a>
                                    <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="font-medium text-red-600 hover:underline">{{ __('حذف') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $tags->links() }}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
