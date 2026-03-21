<x-admin-layout title="Detail {{ $user->username }}">
    <section class="flex flex-col mx-auto max-w-126 h-fit items-center gap-4">
        <div class="relative flex items-center w-full mb-4">
            <a href="{{ route('admin.user.index') }}" class="flex items-center"><i class="bx bx-chevron-left text-gray-900 text-2xl"></i></a>
            <h1 class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-900 text-xl font-semibold">Detail User</h1>
        </div>
        <div class="w-40 aspect-square rounded-full overflow-hidden">
            <img src="https://placehold.co/400x400/black/white?text={{ $user->initial }}" alt="">
        </div>
        <div class="flex flex-col items-center">
            <h2 class="text-xl font-semibold">{{ $user->username }}</h2>
            <div class="flex items-center gap-2">
                <p class="text-gray-600 text-sm">ID: {{ $user->id }}</p>
                <p>
                    @if ($user->role === 'admin')
                    <span
                        class="px-2 py-1 text-xs bg-orange-100 text-orange-600 rounded"
                        >
                        Admin
                    </span>
                    @else
                    <span
                        class="px-2 py-1 text-xs bg-blue-100 text-blue-600 rounded"
                        >
                        User
                    </span>
                    @endif
                </p>
            </div>
        </div>

        <div class="w-full flex flex-col items-start">
            <div class="w-full border-t -space-y-1 border-gray-200 p-2">
                <h3 class="font-semibold text-gray-900">Nama Lengkap</h3>
                <p class="text-gray-600 text-sm">{{ $user->name }}</p>
            </div>
            <div class="w-full border-t -space-y-1 border-gray-200 p-2">
                <h3 class="font-semibold text-gray-900">Email</h3>
                <p class="text-gray-600 text-sm">{{ $user->email }}</p>
            </div>
            <div class="w-full border-t -space-y-1 border-gray-200 p-2">
                <h3 class="font-semibold text-gray-900">Bio</h3>
                <p class="text-gray-600 text-sm">{{ $user->bio }}</p>
            </div>
            <div class="w-full border-t -space-y-1 border-gray-200 p-2">
                <h3 class="font-semibold text-gray-900">Dibuat pada</h3>
                <p class="text-gray-600 text-sm">{{ $user->created_at->isoFormat('D MMMM YYYY') }}</p>
            </div>
            <div class="w-full border-t border-b -space-y-1 border-gray-200 p-2">
                <h3 class="font-semibold text-gray-900">Diedit pada</h3>
                <p class="text-gray-600 text-sm">{{ $user->updated_at->isoFormat('LLLL') }}</p>
            </div>
        </div>
    </section>
</x-admin-layout>