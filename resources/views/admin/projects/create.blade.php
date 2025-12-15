<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add New Project') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Arabic Fields -->
                            <div class="space-y-4 border-l-4 border-green-500 pl-4">
                                <h3 class="font-bold text-lg text-green-700">Arabic Content</h3>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Title (Arabic)') }}</label>
                                    <input type="text" name="title[ar]" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900" required>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Description (Arabic)') }}</label>
                                    <textarea name="description[ar]" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900"></textarea>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Content (Arabic)') }}</label>
                                    <textarea name="content[ar]" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900"></textarea>
                                </div>
                            </div>

                            <!-- English Fields -->
                            <div class="space-y-4 border-l-4 border-blue-500 pl-4">
                                <h3 class="font-bold text-lg text-blue-700">English Content</h3>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Title (English)') }}</label>
                                    <input type="text" name="title[en]" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900">
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Description (English)') }}</label>
                                    <textarea name="description[en]" rows="3" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900"></textarea>
                                </div>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700">{{ __('Content (English)') }}</label>
                                    <textarea name="content[en]" rows="5" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900"></textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700">{{ __('Slug') }}</label>
                                <input type="text" name="slug" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900" required>
                            </div>
                            <div>
                                <label class="block font-medium text-sm text-gray-700">{{ __('Image') }}</label>
                                <input type="file" name="image" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900">
                            </div>
                            
                            <div>
                                <label class="block font-medium text-sm text-gray-700">{{ __('Project Type') }}</label>
                                <select name="type" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900">
                                    <option value="programming">Programming Project</option>
                                    <option value="life">Life Work / Achievement</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700">{{ __('Gallery Images') }}</label>
                                <input type="file" name="images[]" multiple class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900">
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="mt-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700">{{ __('Tags') }}</label>
                            <select name="tags[]" id="tags" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 h-32">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}" {{ in_array($tag->id, old('tags', [])) ? 'selected' : '' }}>
                                        {{ $tag->getTrans('name') }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-sm text-gray-500 mt-1">Press Ctrl (or Command) to select multiple tags</p>
                            @error('tags') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                                {{ __('Save Project') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- TinyMCE Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.3/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea[name="content[ar]"], textarea[name="content[en]"]',
            language: 'ar',
            directionality: 'rtl',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>
</x-app-layout>
