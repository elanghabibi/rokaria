<!-- Button auth mobile -->
@guest
<div class="flex items-center h-fit justify-between px-4 fixed bottom-0 left-0 bg-gray-50 w-full p-4 md:hidden">
    <p class="text-sm text-gray-600">Masuk dan mulai simpan karyamu.</p>
    <div class="flex gap-2">
        <a href="{{ route('login') }}" class="border-2 border-gray-950 bg-gray-950 text-gray-50 w-20 flex items-center justify-center py-1 rounded-md text-sm">Masuk</a>
    </div>
</div>
@endguest