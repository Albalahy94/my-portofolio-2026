<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl text-gray-800 dark:text-white leading-tight">
                {{ __('Analytics Dashboard') }}
            </h2>
            <div class="flex items-center gap-2 bg-indigo-100 dark:bg-indigo-900/30 px-4 py-2 rounded-xl text-indigo-600 dark:text-indigo-400 font-bold">
                <i class="fas fa-calendar-alt"></i>
                <span>Last 30 Days</span>
            </div>
        </div>
    </x-slot>

    <div class="space-y-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6">
            <div class="glass p-6 rounded-3xl shadow-sm border border-indigo-500/20">
                <p class="text-sm text-gray-500 dark:text-slate-400 font-bold mb-1">{{ __('Total Visits') }}</p>
                <h4 class="text-3xl font-black text-indigo-600 dark:text-indigo-400">{{ $visitsOverTime->sum('count') }}</h4>
            </div>
            <div class="glass p-6 rounded-3xl shadow-sm border border-fuchsia-500/20">
                <p class="text-sm text-gray-500 dark:text-slate-400 font-bold mb-1">{{ __('Unique Sessions') }}</p>
                <h4 class="text-3xl font-black text-fuchsia-600 dark:text-fuchsia-400">{{ $uniqueSessions }}</h4>
            </div>
            <div class="glass p-6 rounded-3xl shadow-sm border border-emerald-500/20">
                <p class="text-sm text-gray-500 dark:text-slate-400 font-bold mb-1">{{ __('Unique Countries') }}</p>
                <h4 class="text-3xl font-black text-emerald-600 dark:text-emerald-400">{{ $topCountries->count() }}</h4>
            </div>
            <div class="glass p-6 rounded-3xl shadow-sm border border-amber-500/20">
                <p class="text-sm text-gray-500 dark:text-slate-400 font-bold mb-1">{{ __('Top Page Hits') }}</p>
                <h4 class="text-3xl font-black text-amber-600 dark:text-amber-400">{{ $topPages->first()?->count ?? 0 }}</h4>
            </div>
            <div class="glass p-6 rounded-3xl shadow-sm border border-rose-500/20">
                <p class="text-sm text-gray-500 dark:text-slate-400 font-bold mb-1">{{ __('SEO Keywords') }}</p>
                <h4 class="text-3xl font-black text-rose-600 dark:text-rose-400">{{ $keywords->sum() }}</h4>
            </div>
        </div>

        <!-- Charts Row 1 -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <div class="lg:col-span-2 space-y-8">
                <div class="glass p-6 rounded-3xl border border-white/5">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <i class="fas fa-chart-line text-indigo-500"></i>
                        {{ __('Traffic Overview') }}
                    </h3>
                    <div id="visitsChart"></div>
                </div>
                
                <div class="glass p-6 rounded-3xl border border-white/5">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2 text-fuchsia-500">
                        <i class="fas fa-clock"></i>
                        <span class="text-gray-800 dark:text-slate-200">{{ __('Time of Day Activity (Last 7 Days)') }}</span>
                    </h3>
                    <div id="hourlyChart"></div>
                </div>
            </div>
            <div class="glass p-6 rounded-3xl border border-white/5 h-fit">
                <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                    <i class="fas fa-laptop-code text-emerald-500"></i>
                    {{ __('Devices & Browsers') }}
                </h3>
                <div id="deviceChart"></div>
                <div class="mt-8 space-y-3">
                    @foreach($browsers as $browser)
                        <div class="flex justify-between items-center bg-gray-50 dark:bg-slate-800/50 p-3 rounded-xl border border-gray-100 dark:border-slate-700/50">
                            <span class="text-sm font-bold">{{ $browser->browser }}</span>
                            <span class="text-xs bg-indigo-100 dark:bg-indigo-900/50 text-indigo-600 dark:text-indigo-400 px-2 py-1 rounded-lg">{{ $browser->count }} hits</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Data Tables Row -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <!-- Top Pages -->
            <div class="glass rounded-3xl overflow-hidden">
                <div class="p-6 border-b border-gray-100 dark:border-slate-800">
                    <h3 class="text-lg font-bold flex items-center gap-2">
                        <i class="fas fa-file-alt text-amber-500"></i>
                        {{ __('Most Visited Pages') }}
                    </h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-start">
                        <thead>
                            <tr class="bg-gray-50 dark:bg-slate-800/30 text-gray-500 dark:text-slate-400 text-xs uppercase font-black">
                                <th class="px-6 py-4 text-start">{{ __('Page URL') }}</th>
                                <th class="px-6 py-4 text-end">{{ __('Hits') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 dark:divide-slate-800">
                            @foreach($topPages as $page)
                            <tr class="hover:bg-gray-50 dark:hover:bg-slate-800/30 transition-colors">
                                <td class="px-6 py-4 text-sm font-medium truncate max-w-xs">{{ $page->url }}</td>
                                <td class="px-6 py-4 text-end">
                                    <span class="font-bold text-indigo-600 dark:text-indigo-400">{{ $page->count }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- SEO & Countries -->
            <div class="space-y-8">
                <div class="glass p-6 rounded-3xl">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <i class="fas fa-search text-rose-500"></i>
                        {{ __('Keywords Insight') }} (SEO)
                    </h3>
                    <div class="flex flex-wrap gap-2">
                        @forelse($keywords as $keyword => $count)
                            <div class="flex items-center gap-2 bg-rose-50 dark:bg-rose-900/10 text-rose-600 dark:text-rose-400 px-4 py-2 rounded-2xl border border-rose-100 dark:border-rose-900/30">
                                <span class="font-bold">{{ $keyword }}</span>
                                <span class="text-xs opacity-60">({{ $count }})</span>
                            </div>
                        @empty
                            <p class="text-sm text-gray-500 italic">No search keywords detected yet.</p>
                        @endforelse
                    </div>
                </div>

                <div class="glass p-6 rounded-3xl">
                    <h3 class="text-lg font-bold mb-6 flex items-center gap-2">
                        <i class="fas fa-globe-africa text-blue-500"></i>
                        {{ __('Top Visitor Origins') }}
                    </h3>
                    <div class="grid grid-cols-2 gap-4">
                        @foreach($topCountries as $country)
                            <div class="flex items-center gap-3 p-3 bg-gray-50 dark:bg-slate-800/50 rounded-2xl">
                                <span class="text-2xl">{{ $country->country_code }}</span> 
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-bold truncate">{{ $country->country_name }}</p>
                                    <p class="text-xs text-indigo-600">{{ $country->count }} {{ __('visits') }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ApexCharts CDN -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const isDark = document.documentElement.classList.contains('dark');
            const themeColor = isDark ? '#6366f1' : '#4f46e5';
            const labelColor = isDark ? '#94a3b8' : '#64748b';

            // Visits Chart
            new ApexCharts(document.querySelector("#visitsChart"), {
                series: [{
                    name: 'Visits',
                    data: [
                        @foreach($visitsOverTime as $v)
                            { x: '{{ $v->date }}', y: {{ $v->count }} },
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'area',
                    height: 350,
                    toolbar: { show: false },
                    zoom: { enabled: false },
                    background: 'transparent',
                    foreColor: labelColor
                },
                colors: [themeColor],
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth', width: 4 },
                fill: {
                    type: 'gradient',
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.4,
                        opacityTo: 0.0,
                        stops: [0, 90, 100]
                    }
                },
                xaxis: {
                    type: 'datetime',
                    axisBorder: { show: false },
                    axisTicks: { show: false }
                },
                yaxis: { labels: { offsetX: -15 } },
                grid: {
                    borderColor: isDark ? '#1e293b' : '#f1f5f9',
                    strokeDashArray: 4,
                    padding: { left: 0, right: 0 }
                },
                tooltip: { theme: isDark ? 'dark' : 'light' }
            }).render();

            // Device Chart
            new ApexCharts(document.querySelector("#deviceChart"), {
                series: [
                    @foreach($devices as $d) {{ $d->count }}, @endforeach
                ],
                labels: [
                    @foreach($devices as $d) '{{ ucfirst($d->device) }}', @endforeach
                ],
                chart: {
                    type: 'donut',
                    height: 250,
                    background: 'transparent',
                    foreColor: labelColor
                },
                colors: ['#6366f1', '#10b981', '#f59e0b'],
                legend: { position: 'bottom' },
                dataLabels: { enabled: false },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '75%',
                            labels: {
                                show: true,
                                name: { show: true },
                                value: { show: true, fontWeight: 'bold' },
                                total: { show: true, label: 'Total', fontWeight: 'bold' }
                            }
                        }
                    }
                },
                stroke: { show: false },
                tooltip: { theme: isDark ? 'dark' : 'light' }
            }).render();

            // Hourly (Time of Day) Chart
            new ApexCharts(document.querySelector("#hourlyChart"), {
                series: [{
                    name: 'Activity',
                    data: [
                        @foreach($hourlyData as $hour => $count)
                            { x: '{{ $hour }}:00', y: {{ $count }} },
                        @endforeach
                    ]
                }],
                chart: {
                    type: 'bar',
                    height: 250,
                    toolbar: { show: false },
                    background: 'transparent',
                    foreColor: labelColor
                },
                plotOptions: {
                    bar: {
                        borderRadius: 4,
                        columnWidth: '60%',
                    }
                },
                dataLabels: { enabled: false },
                colors: ['#c026d3'], // Fuchsia 600
                xaxis: {
                    type: 'category',
                    axisBorder: { show: false },
                    axisTicks: { show: false },
                    labels: { style: { fontSize: '10px' } }
                },
                yaxis: { show: false },
                grid: {
                    borderColor: isDark ? '#1e293b' : '#f1f5f9',
                    strokeDashArray: 4,
                },
                tooltip: { theme: isDark ? 'dark' : 'light' }
            }).render();
        });

    </script>
</x-app-layout>
