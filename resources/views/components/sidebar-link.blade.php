@props(['active', 'icon', 'class' => ''])

@php
$baseClasses = 'flex items-center gap-3 px-4 py-3 rounded-xl transition-all duration-300 font-semibold group ' . $class;
$activeClasses = 'bg-indigo-600 dark:bg-indigo-500 text-white shadow-lg shadow-indigo-500/30';
$inactiveClasses = 'text-gray-500 dark:text-slate-400 hover:bg-gray-100 dark:hover:bg-slate-800 hover:text-indigo-600 dark:hover:text-indigo-400';

$classes = ($active ?? false) ? "{$baseClasses} {$activeClasses}" : "{$baseClasses} {$inactiveClasses}";
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    @if(isset($icon))
        <i class="{{ $icon }} w-5 text-center transition-transform duration-300 group-hover:scale-110"></i>
    @endif
    <span>{{ $slot }}</span>
</a>
