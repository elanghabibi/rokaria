@if (session('error') || session('success'))
<!-- <div id="toast" class="fixed top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 flex w-fit max-sm:w-9/10 items-center justify-center h-fit rounded-md bg-gradient-to-br from-gray-50 to-gray-200 px-6 py-2 max-md:px-4 border border-gray-950 opacity-100 transition-all duration-300">
    <p class="max-md:text-sm text-center">{{ session('error') ?? session('success') }}</p>
</div> -->

<div
      id="toast"
      class="absolute top-10 left-1/2 -translate-x-1/2 shadow-lg shadow-gray-600/5 flex min-w-80 max-sm:w-9/10 items-center h-fit rounded-md {{ session('success') ? 'bg-green-100' : 'bg-red-100' }} px-3 p-4 opacity-100 translate-y-0 transition-all duration-300"
      style="z-index: 200;"
    >
  <div class="text-sm text-center flex items-center gap-2">
    <i class="bx {{ session('success') ? 'bx-check' : 'bx-alert-triangle' }} flex p-1 text-sm w-fit justify-center items-center bg-linear-to-br {{ session('success') ? 'from-green-500 to-green-600' : 'from-red-500 to-red-600' }} text-gray-50 rounded-full aspect-square"></i>
    <p class="{{ session('success') ? 'text-green-600' : 'text-red-600' }}">{{ session('error') ?? session('success') }}</p>
  </div>
</div>
@endif