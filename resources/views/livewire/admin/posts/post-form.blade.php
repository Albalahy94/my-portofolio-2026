<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $post ? __('تعديل المقال') : __('كتابة مقال جديد') }}
            </h2>
            <button @click="focusMode = !focusMode" class="px-4 py-2 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 font-bold text-xs flex items-center gap-2 hover:bg-indigo-600 hover:text-white transition-all">
                <i class="fas fa-leaf"></i>
                {{ __('Zen Mode') }}
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-white/5">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form wire:submit="save" class="space-y-6">

                        @if ($errors->any())
                            <div class="mb-6 bg-red-100 dark:bg-red-900/20 border border-red-200 dark:border-red-900 p-4 rounded-xl">
                                <h3 class="text-sm font-bold text-red-800 dark:text-red-200">
                                    {{ __('هناك بعض الأخطاء في البيانات المدخلة:') }}
                                </h3>
                                <ul class="mt-2 text-sm text-red-700 dark:text-red-300 list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Title -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">عنوان المقال</label>
                            <input type="text" wire:model.live="title" id="title" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-white/10 dark:bg-slate-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white">
                        </div>

                        <!-- Slug -->
                        <div>
                            <label for="slug" class="block text-sm font-medium text-gray-700 dark:text-gray-300">الرابط (Slug)</label>
                            <input type="text" wire:model="slug" id="slug" required 
                                   class="mt-1 block w-full rounded-md border-gray-300 dark:border-white/10 dark:bg-slate-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dir-ltr text-left text-gray-900 dark:text-white">
                        </div>

                        <!-- Featured Image -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">صورة بارزة</label>
                            <div 
                                x-data="{ isUploading: false, progress: 0 }"
                                x-on:livewire-upload-start="isUploading = true"
                                x-on:livewire-upload-finish="isUploading = false"
                                x-on:livewire-upload-error="isUploading = false"
                                x-on:livewire-upload-progress="progress = $event.detail.progress"
                            >
                                @if ($featured_image)
                                    <div class="mb-4 relative inline-block">
                                        <img src="{{ $featured_image->temporaryUrl() }}" class="w-full max-w-xs h-48 object-cover rounded-2xl border border-gray-200 shadow-sm">
                                        <button type="button" wire:click="removeMainTempImage" class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1"><i class="fas fa-times"></i></button>
                                    </div>
                                @elseif($post && $post->featured_image)
                                    <div class="mb-4">
                                        <img src="{{ Storage::url($post->featured_image) }}" class="w-full max-w-xs h-48 object-cover rounded-2xl border border-gray-200 shadow-sm">
                                    </div>
                                @endif
                                
                                <div x-show="isUploading" class="w-full bg-gray-200 rounded-full h-2.5 mb-2 dark:bg-gray-700">
                                    <div class="bg-indigo-600 h-2.5 rounded-full" x-bind:style="'width: ' + progress + '%'"></div>
                                </div>

                                <input type="file" id="featured_image" accept="image/*"
                                    @change="$dispatch('change-featured_image', $event)"
                                    class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-400 border border-gray-300 dark:border-white/10 rounded-md cursor-pointer bg-gray-50 dark:bg-slate-800">
                                <x-cropper-modal inputId="featured_image" aspectRatio="1.5" />
                            </div>
                        </div>

                        <!-- Excerpt -->
                        <div>
                            <label for="excerpt" class="block text-sm font-medium text-gray-700">مقتطف قصير</label>
                            <textarea wire:model="excerpt" id="excerpt" rows="3" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900"></textarea>
                        </div>

                        <!-- Content (TinyMCE) -->
                        <div wire:ignore>
                            <label for="content" class="block text-sm font-medium text-gray-700">المحتوى</label>
                            <textarea id="content" rows="10" 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900">{{ $content }}</textarea>
                        </div>

                        <!-- Categories -->
                        <div>
                            <label for="categories" class="block text-sm font-medium text-gray-700">التصنيفات</label>
                            <select wire:model="selectedCategories" id="categories" multiple class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 h-32">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->getTrans('name') }}
                                    </option>
                                @endforeach
                            </select>
                            <p class="text-sm text-gray-500 mt-1">اضغط Ctrl (أو Command) لتحديد أكثر من تصنيف</p>
                        </div>

                        <!-- Status & Scheduling -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-gray-50 dark:bg-white/5 rounded-2xl border border-gray-100 dark:border-white/5">
                            <div class="flex items-center">
                                <input type="checkbox" wire:model="is_published" id="is_published" value="1"
                                       class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-white/10 rounded-lg">
                                <label for="is_published" class="ms-3 block text-sm font-bold text-gray-900 dark:text-gray-200">
                                    {{ __('نشر المقال') }}
                                </label>
                            </div>
                            
                            <div>
                                <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('جدولة تاريخ النشر') }}</label>
                                <input type="datetime-local" wire:model="published_at" id="published_at"
                                       class="mt-1 block w-full rounded-xl border-gray-300 dark:border-white/10 dark:bg-slate-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white">
                                <p class="text-xs text-gray-400 mt-1">{{ __('اتركه فارغاً للنشر الفوري إذا كانت خانة النشر مفعلة') }}</p>
                            </div>
                        </div>

                        <!-- Submit -->
                        <div class="flex justify-end gap-3">
                            <a href="{{ route('admin.posts.index') }}" class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 font-bold">إلغاء</a>
                            <button type="submit" class="px-6 py-2 bg-indigo-600 text-white rounded-md font-bold hover:bg-indigo-700">
                                <span wire:loading.remove wire:target="save">حفظ المقال</span>
                                <span wire:loading wire:target="save">جاري الحفظ...</span>
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
        function initPostEditors() {
            if (tinymce.get('content')) {
                tinymce.remove('#content');
            }

            tinymce.init({
                selector: '#content',
                language: 'ar',
                directionality: 'rtl',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                promotion: false,
                branding: false,
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('content', editor.getContent());
                    });
                }
            });
        }

        document.addEventListener('livewire:initialized', initPostEditors);
        document.addEventListener('livewire:navigated', initPostEditors);

        window.addEventListener('beforeunload', () => {
            tinymce.remove();
        });
    </script>
</div>
