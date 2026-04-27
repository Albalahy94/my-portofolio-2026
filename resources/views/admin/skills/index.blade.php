<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage Skills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end mb-4 gap-2">
                @if(request('status') === 'trashed')
                    <a href="{{ route('admin.skills.index') }}" wire:navigate class="px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 transition ease-in-out duration-150">
                        {{ __('Back to List') }}
                    </a>
                @else
                    <a href="{{ route('admin.skills.index', ['status' => 'trashed']) }}" wire:navigate class="px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-700 transition ease-in-out duration-150">
                        {{ __('Trash') }}
                    </a>
                    <a href="{{ route('admin.skills.create') }}" wire:navigate class="px-4 py-2 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-500 focus:bg-primary-500 active:bg-primary-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                        {{ __('Add New Skill') }}
                    </a>
                @endif
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">{{ __('ID') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Name (EN)') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Name (AR)') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Proficiency') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Icon') }}</th>
                                <th scope="col" class="px-6 py-3">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skills as $skill)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <td class="px-6 py-4">{{ $skill->id }}</td>
                                    <td class="px-6 py-4">{{ $skill->name['en'] ?? '' }}</td>
                                    <td class="px-6 py-4">{{ $skill->name['ar'] ?? '' }}</td>
                                    <td class="px-6 py-4">{{ $skill->proficiency }}%</td>
                                    <td class="px-6 py-4 text-xl"><i class="{{ $skill->icon }}"></i></td>
                                    <td class="px-6 py-4 flex gap-2">
                                        @if(request('status') === 'trashed')
                                            <form action="{{ route('admin.skills.restore', $skill->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="font-medium text-green-600 dark:text-green-500 hover:underline">{{ __('Restore') }}</button>
                                            </form>
                                            <form action="{{ route('admin.skills.force-delete', $skill->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">{{ __('Delete Permanently') }}</button>
                                            </form>
                                        @else
                                            <a href="{{ route('admin.skills.edit', $skill) }}" wire:navigate class="font-medium text-blue-600 dark:text-blue-500 hover:underline">{{ __('Edit') }}</a>
                                            <form action="{{ route('admin.skills.destroy', $skill) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline">{{ __('Delete') }}</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    <div class="mt-4">
                        {{ $skills->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
