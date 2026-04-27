<div>
    <x-slot name="header">
        <div class="flex justify-between items-center gap-2">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('المشاريع') }}
            </h2>
            <div class="flex gap-2">
                @if($status === 'trashed')
                    <a href="{{ route('admin.projects.index') }}" wire:navigate class="px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700">
                        {{ __('رجوع للقائمة') }}
                    </a>
                @else
                    <a href="{{ route('admin.projects.index', ['status' => 'trashed']) }}" wire:navigate class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                        {{ __('سلة المهملات') }}
                    </a>
                    <a href="{{ route('admin.projects.create') }}" wire:navigate class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
                        {{ __('إضافة مشروع') }}
                    </a>
                @endif
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-slate-900 overflow-hidden shadow-sm sm:rounded-lg border border-gray-100 dark:border-white/5">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-slate-800 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('العنوان') }}</th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-slate-800 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('الرابط (Slug)') }}</th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-slate-800 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('الصورة') }}</th>
                                    <th class="px-6 py-3 bg-gray-50 dark:bg-slate-800 text-right text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">{{ __('الإجراءات') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-slate-900 divide-y divide-gray-200 dark:divide-gray-800">
                                @foreach($projects as $project)
                                    <tr wire:key="project-{{ $project->id }}">
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->getTrans('title') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-mono text-sm">{{ $project->slug }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @if($project->image)
                                                <img src="{{ asset('storage/' . $project->image) }}" class="w-10 h-10 object-cover rounded shadow-sm">
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                            @if($status === 'trashed')
                                                <button type="button" wire:click="restore({{ $project->id }})" class="text-green-600 dark:text-green-400 hover:text-green-900 ml-4 font-bold">{{ __('استعادة') }}</button>
                                                <button type="button" onclick="confirmDelete({{ $project->id }}, 'confirm-force-delete')" class="text-red-600 dark:text-red-400 hover:text-red-900 font-bold">{{ __('حذف نهائي') }}</button>
                                            @else
                                                <a href="{{ route('admin.projects.edit', $project->id) }}" wire:navigate class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 ml-4 font-bold">{{ __('تعديل') }}</a>
                                                <button type="button" onclick="confirmDelete({{ $project->id }}, 'confirm-delete')" class="text-red-600 dark:text-red-400 hover:text-red-900 font-bold">{{ __('حذف') }}</button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                @if($projects->isEmpty())
                                    <tr>
                                        <td colspan="4" class="px-6 py-8 text-center text-gray-500 dark:text-gray-400">
                                            {{ __('لا يوجد أي مشاريع حالياً.') }}
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-4">
                        {{ $projects->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id, action) {
            Swal.fire({
                title: '{{ __("هل أنت متأكد؟") }}',
                text: '{{ __("لن تتمكن من التراجع عن هذا!") }}',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: '{{ __("نعم، احذف!") }}',
                cancelButtonText: '{{ __("إلغاء") }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatch(action, { id: id });
                }
            });
        }
        
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('toast', (event) => {
                Toast.fire({
                    icon: event[0].icon ?? 'success',
                    title: event[0].title
                });
            });
        });
    </script>
</div>
