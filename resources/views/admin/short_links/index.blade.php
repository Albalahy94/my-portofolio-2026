<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
            {{ __('Custom Link Shortener') }}
        </h2>
    </x-slot>

    <div class="space-y-8">
        <!-- Create Short Link -->
        <div class="glass p-8 rounded-3xl shadow-sm">
            <h3 class="text-xl font-black mb-6 flex items-center gap-2">
                <i class="fas fa-link text-indigo-500"></i>
                {{ __('Create New Short Link') }}
            </h3>
            <form action="{{ route('admin.short-links.store') }}" method="POST" class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @csrf
                <div class="md:col-span-1">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2 ms-4">{{ __('Original URL') }}</label>
                    <input type="url" name="original_url" required placeholder="https://example.com/very-long-url" class="w-full bg-gray-50 dark:bg-slate-800 border-0 rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>
                <div class="md:col-span-1">
                    <label class="block text-xs font-black uppercase text-gray-400 mb-2 ms-4">{{ __('Custom Code (Optional)') }}</label>
                    <input type="text" name="short_code" placeholder="my-custom-code" class="w-full bg-gray-50 dark:bg-slate-800 border-0 rounded-2xl p-4 focus:ring-2 focus:ring-indigo-500 transition-all">
                </div>
                <div class="md:col-span-1 flex items-end">
                    <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-4 rounded-2xl shadow-lg shadow-indigo-500/30 transition-all">
                        {{ __('Generate Link') }}
                    </button>
                </div>
            </form>
        </div>

        <!-- Links List -->
        <div class="glass rounded-3xl overflow-hidden shadow-sm">
            <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                <h3 class="text-lg font-bold flex items-center gap-2">
                    <i class="fas fa-list text-amber-500"></i>
                    {{ __('Your Active Links') }}
                </h3>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-start">
                    <thead>
                        <tr class="bg-gray-50 dark:bg-slate-800/30 text-gray-500 dark:text-slate-400 text-xs uppercase font-black">
                            <th class="px-6 py-4 text-start">{{ __('Short URL') }}</th>
                            <th class="px-6 py-4 text-start">{{ __('Original Destination') }}</th>
                            <th class="px-6 py-4 text-center">{{ __('Clicks') }}</th>
                            <th class="px-6 py-4 text-end">{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                        @foreach($shortLinks as $link)
                        <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-2">
                                    <span class="text-indigo-600 dark:text-indigo-400 font-bold">{{ url('/go/' . $link->short_code) }}</span>
                                    <button onclick="navigator.clipboard.writeText('{{ url('/go/' . $link->short_code) }}')" class="p-1.5 rounded-lg bg-gray-100 dark:bg-slate-700 text-gray-400 hover:text-indigo-600 transition-colors">
                                        <i class="fas fa-copy text-xs"></i>
                                    </button>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-500 truncate max-w-xs">{{ $link->original_url }}</td>
                            <td class="px-6 py-4 text-center">
                                <span class="bg-emerald-50 dark:bg-emerald-900/20 text-emerald-600 dark:text-emerald-400 px-3 py-1 rounded-full text-xs font-black">
                                    {{ $link->clicks }} {{ __('hits') }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-end">
                                <form action="{{ route('admin.short-links.destroy', $link) }}" method="POST" onsubmit="return confirm('Delete this link?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-gray-300 hover:text-rose-500 transition-colors">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
