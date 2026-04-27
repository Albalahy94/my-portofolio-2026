<div>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ $project ? __('تعديل المشروع') : __('إضافة مشروع جديد') }}
            </h2>
            <button @click="focusMode = !focusMode" class="px-4 py-2 rounded-xl bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 font-bold text-xs flex items-center gap-2 hover:bg-indigo-600 hover:text-white transition-all">
                <i class="fas fa-leaf"></i>
                {{ __('Zen Mode') }}
            </button>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
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

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Arabic Fields -->
                            <div class="space-y-4 border-l-4 border-green-500 pl-4">
                                <h3 class="font-bold text-lg text-green-700">{{ __('المحتوى العربي') }}</h3>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('العنوان (عربي)') }}</label>
                                    <input type="text" wire:model.live="title_ar" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white" required>
                                </div>
                                <div wire:ignore>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('وصف قصير (عربي)') }}</label>
                                    <textarea id="description_ar" rows="3" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">{{ $description_ar }}</textarea>
                                </div>
                                <div wire:ignore>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('المحتوى (عربي)') }}</label>
                                    <textarea id="content_ar" rows="5" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">{{ $content_ar }}</textarea>
                                </div>
                            </div>

                            <!-- English Fields -->
                            <div class="space-y-4 border-l-4 border-blue-500 pl-4">
                                <h3 class="font-bold text-lg text-blue-700">{{ __('English Content') }}</h3>
                                <div>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Title (English)') }}</label>
                                    <input type="text" wire:model.live="title_en" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">
                                </div>
                                <div wire:ignore>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Description (English)') }}</label>
                                    <textarea id="description_en" rows="3" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">{{ $description_en }}</textarea>
                                </div>
                                <div wire:ignore>
                                    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('Content (English)') }}</label>
                                    <textarea id="content_en" rows="5" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">{{ $content_en }}</textarea>
                                </div>
                            </div>
                        </div>

                        <hr class="my-6 border-gray-100 dark:border-white/5">

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('الرابط (Slug)') }}</label>
                                <input type="text" wire:model="slug" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 dir-ltr text-left rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white" required>
                            </div>
                            
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('الصورة الرئيسية') }}</label>
                                <div 
                                    x-data="{ isUploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="isUploading = true"
                                    x-on:livewire-upload-finish="isUploading = false"
                                    x-on:livewire-upload-error="isUploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    @if ($image)
                                        <div class="mb-4 relative inline-block">
                                            <img src="{{ $image->temporaryUrl() }}" class="w-40 h-40 object-cover rounded-2xl border border-indigo-100 shadow-sm">
                                            <button type="button" wire:click="removeMainTempImage" class="absolute top-2 right-2 bg-red-600 text-white rounded-full p-1"><i class="fas fa-times"></i></button>
                                        </div>
                                    @elseif($project && $project->image)
                                        <div class="mb-4">
                                            <img src="{{ Storage::url($project->image) }}" class="w-40 h-40 object-cover rounded-2xl border border-indigo-100 shadow-sm">
                                        </div>
                                    @endif
                                    
                                    <div x-show="isUploading" class="w-full bg-gray-200 rounded-full h-2.5 mb-2 dark:bg-gray-700">
                                        <div class="bg-indigo-600 h-2.5 rounded-full" x-bind:style="'width: ' + progress + '%'"></div>
                                    </div>

                                    <input type="file" id="project_image" accept="image/*"
                                        @change="$dispatch('change-project_image', $event)"
                                        class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-gray-400">
                                    <x-cropper-modal inputId="project_image" aspectRatio="1" />
                                </div>
                            </div>
                            
                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('نوع المشروع') }}</label>
                                <select wire:model="type" class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-white">
                                    <option value="programming">{{ __('مشروع برمجي') }}</option>
                                    <option value="life">{{ __('عمل حياتي / إنجاز') }}</option>
                                </select>
                            </div>

                            <div>
                                <label class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('صور إضافية (معرض)') }}</label>
                                
                                <div wire:loading wire:target="images" class="mt-2 text-sm text-indigo-600">جاري الرفع...</div>
                                
                                @if($images)
                                    <div class="grid grid-cols-4 gap-2 mb-2 mt-2">
                                        @foreach($images as $index => $tempImage)
                                            <div class="relative">
                                                <img src="{{ $tempImage->temporaryUrl() }}" class="w-full h-24 object-cover rounded shadow-sm">
                                                <button type="button" wire:click="removeTempImage({{ $index }})" class="absolute top-1 right-1 bg-red-600 text-white rounded-full p-1"><i class="fas fa-times text-xs"></i></button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif

                                @if($project && $project->images->count() > 0)
                                    <div class="grid grid-cols-4 gap-2 mb-2 mt-2">
                                        @foreach($project->images as $img)
                                            <div class="relative group">
                                                <img src="{{ Storage::url($img->image) }}" class="w-full h-24 object-cover rounded shadow-sm opacity-80 group-hover:opacity-100 transition">
                                                <button type="button" wire:click="deleteGalleryImage({{ $img->id }})" wire:confirm="هل تريد بالتأكيد حذف هذه الصورة؟" class="absolute top-1 right-1 flex items-center justify-center w-6 h-6 bg-red-600 text-white hover:bg-red-700 rounded-full transition shadow-md z-10">
                                                    <i class="fas fa-trash text-xs"></i>
                                                </button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                
                                <input type="file" wire:model="images" multiple class="border-gray-300 dark:border-white/10 dark:bg-slate-800 focus:border-indigo-500 rounded-md shadow-sm block w-full mt-1 text-gray-900 dark:text-gray-400">
                            </div>
                        </div>

                        <!-- Status & Scheduling -->
                        <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-6 p-6 bg-gray-50 dark:bg-white/5 rounded-[2rem] border border-gray-100 dark:border-white/5">
                            <div class="flex items-center">
                                <input type="checkbox" wire:model="is_published" id="is_published" value="1"
                                       class="h-5 w-5 text-indigo-600 focus:ring-indigo-500 border-gray-300 dark:border-white/10 rounded-lg">
                                <label for="is_published" class="ms-3 block text-sm font-bold text-gray-900 dark:text-gray-200">
                                    {{ __('نشر المشروع') }}
                                </label>
                            </div>
                            
                            <div>
                                <label for="published_at" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('جدولة تاريخ النشر') }}</label>
                                <input type="datetime-local" wire:model="published_at" id="published_at"
                                       class="mt-1 block w-full rounded-xl border-gray-300 dark:border-white/10 dark:bg-slate-800 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 text-gray-900 dark:text-white">
                                <p class="text-xs text-gray-400 mt-1">{{ __('اتركه فارغاً للنشر الفوري إذا كانت خانة النشر مفعلة') }}</p>
                            </div>
                        </div>

                        <!-- Tags -->
                        <div class="mt-6">
                            <label for="tags" class="block font-medium text-sm text-gray-700 dark:text-gray-300">{{ __('الوسوم') }}</label>
                            <select wire:model="selectedTags" id="tags" multiple class="mt-1 block w-full rounded-md border-gray-300 dark:border-white/10 dark:bg-slate-800 shadow-sm focus:border-indigo-500 h-32 text-gray-900 dark:text-white">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">
                                        {{ $tag->getTrans('name') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold hover:bg-indigo-700 shadow-lg hover:scale-105 transition">
                                <span wire:loading.remove wire:target="save">{{ __('حفظ المشروع') }}</span>
                                <span wire:loading wire:target="save">{{ __('جاري الحفظ...') }}</span>
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
        function initEditors() {
            const editorIds = ['#description_ar', '#content_ar', '#description_en', '#content_en'];
            
            editorIds.forEach(selector => {
                const id = selector.replace('#', '');
                if (tinymce.get(id)) {
                    tinymce.remove(selector);
                }
            });

            const config = {
                language: 'ar',
                directionality: 'rtl',
                plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                promotion: false,
                branding: false,
            };

            tinymce.init({
                ...config,
                selector: '#description_ar',
                toolbar: 'undo redo | bold italic',
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('description_ar', editor.getContent());
                    });
                }
            });
            tinymce.init({
                ...config,
                selector: '#content_ar',
                toolbar: 'undo redo | blocks | bold italic | link image media | align lineheight | numlist bullist indent outdent | removeformat',
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('content_ar', editor.getContent());
                    });
                }
            });
            tinymce.init({
                ...config,
                selector: '#description_en',
                directionality: 'ltr',
                language: 'en',
                toolbar: 'undo redo | bold italic',
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('description_en', editor.getContent());
                    });
                }
            });
            tinymce.init({
                ...config,
                selector: '#content_en',
                directionality: 'ltr',
                language: 'en',
                toolbar: 'undo redo | blocks | bold italic | link image media | align lineheight | numlist bullist indent outdent | removeformat',
                setup: function (editor) {
                    editor.on('change', function () {
                        @this.set('content_en', editor.getContent());
                    });
                }
            });
        }

        document.addEventListener('livewire:initialized', initEditors);
        document.addEventListener('livewire:navigated', initEditors);

        window.addEventListener('beforeunload', () => {
            tinymce.remove();
        });
    </script>
</div>
