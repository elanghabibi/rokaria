@if (session('error') || session('success'))
<div id="toast" class="fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex w-fit max-sm:w-9/10 items-center justify-center h-fit rounded-md bg-gradient-to-br from-gray-50 to-gray-200 px-6 py-2 max-md:px-4 border border-gray-950 opacity-100 transition-all duration-300">
    <p class="max-md:text-sm text-center">{{ session('error') ?? session('success') }}</p>
</div>
@endif