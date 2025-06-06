@props(['status' => 'active'])

@if ($status == 'active')
<span class="bg-green-100 capitalize text-green-800 text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-green-900 dark:text-green-300">{{ $slot }}</span>
    @else
    <span class="bg-red-100 text-red-800 capitalize text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm dark:bg-red-900 dark:text-red-300">{{ $slot }}</span>
@endif