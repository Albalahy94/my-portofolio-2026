<div x-data="{
    open: false,
    imageSrc: '',
    cropper: null,
    fileName: '',
    initCropper() {
        if (this.cropper) this.cropper.destroy();
        this.$nextTick(() => {
            const image = this.$refs.cropImage;
            this.cropper = new Cropper(image, {
                aspectRatio: {{ $aspectRatio ?? '1' }},
                viewMode: 1,
                dragMode: 'move',
                autoCropArea: 1,
                restore: false,
                guides: true,
                center: true,
                highlight: false,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
            });
        });
    },
    handleFile(e) {
        const file = e.target.files[0];
        if (!file) return;
        this.fileName = file.name;
        const reader = new FileReader();
        reader.onload = (event) => {
            this.imageSrc = event.target.result;
            this.open = true;
            this.initCropper();
        };
        reader.readAsDataURL(file);
    },
    saveCrop() {
        const canvas = this.cropper.getCroppedCanvas();
        canvas.toBlob((blob) => {
            const dataTransfer = new DataTransfer();
            const file = new File([blob], this.fileName, { type: 'image/webp' });
            dataTransfer.items.add(file);
            const input = document.getElementById('{{ $inputId }}');
            input.files = dataTransfer.files;
            
            // Check if inside a Livewire component to automatically upload the cropped file
            // We use 'window.Livewire' check or '$wire' if available in Alpine context
            if (typeof $wire !== 'undefined') {
                $wire.upload('{{ $inputId }}', file);
            }
            
            // Preview update if function exists
            if (window.updatePreview_{{ $inputId }}) {
                window.updatePreview_{{ $inputId }}(canvas.toDataURL());
            }
            
            this.open = false;
        }, 'image/webp', 0.9);
    }
}" @change-{{ $inputId }}.window="handleFile($event)">
    <!-- Modal -->
    <template x-teleport="body">
        <div x-show="open" 
             class="fixed inset-0 z-[9999] flex items-center justify-center p-4 bg-black/80 backdrop-blur-sm"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-cloak>
        
        <div class="glass w-full max-w-4xl rounded-[2.5rem] overflow-hidden flex flex-col max-h-[90vh]">
            <div class="p-6 flex items-center justify-between border-b border-white/10">
                <h3 class="text-xl font-bold text-white">{{ __('Crop Image') }}</h3>
                <button @click="open = false" class="text-gray-400 hover:text-white transition-colors">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <div class="flex-1 overflow-hidden bg-dark-950/50 flex items-center justify-center p-4">
                <img :src="imageSrc" x-ref="cropImage" class="max-w-full max-h-full block">
            </div>

            <div class="p-6 border-t border-white/10 flex justify-end gap-3 bg-white/5">
                <button @click="open = false" type="button" class="px-6 py-2 rounded-xl text-gray-400 font-bold hover:bg-white/10 transition-all font-cairo">
                    {{ __('Cancel') }}
                </button>
                <button @click="saveCrop()" type="button" class="px-8 py-2 rounded-xl bg-indigo-600 text-white font-bold hover:bg-indigo-700 transition-all shadow-lg shadow-indigo-500/20 font-cairo">
                    {{ __('Apply Crop') }}
                </button>
            </div>
        </div>
    </template>
</div>
