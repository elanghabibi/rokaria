<x-app-layout title="Edit Profile">
    <section class="pt-22 flex flex-col mx-auto max-w-126 h-fit items-center gap-4">
        <div class="relative flex items-center w-full mb-4">
            <a href="" class="flex items-center"><i class="bx bx-chevron-left text-gray-900 text-2xl"></i></a>
            <h1 class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 text-gray-900 text-xl font-semibold">Edit Profil</h1>
        </div>
        <div class="w-40 aspect-square rounded-full overflow-hidden">
            <img src="https://placehold.co/400x400/black/white?text={{ $user->initial }}" alt="">
        </div>
        <div class="flex flex-col items-center">
            <div class="flex items-center gap-2">
                <p class="text-gray-600 text-sm">ID: {{ $user->id }}</p>
            </div>
        </div>

        <form action="" method="POST" class="w-full">
            @csrf
            @method("PUT")
            <div class="w-full flex flex-col items-start gap-4">
                <div class="w-full flex flex-col">
                    <label class="font-semibold text-gray-900" for="username">Username<span class="text-red-500">*</span></label>
                    <input class="w-full h-fit py-2 border-2 border-gray-200 rounded-xl pl-4 bg-white" type="text" name="username" value="{{ $user->username }}">
                    @error('username')
                        <x-message-valid   x-message-valid>{{ $message }}</x-message-valid>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label class="font-semibold text-gray-900" for="name">Nama Lengkap<span class="text-red-500">*</span></label>
                    <input class="w-full h-fit py-2 border-2 border-gray-200 rounded-xl pl-4 bg-white" type="text" name="name" value="{{ $user->name }}">
                    @error('name')
                        <x-message-valid   x-message-valid>{{ $message }}</x-message-valid>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label class="font-semibold text-gray-900" for="email">Email<span class="text-red-500">*</span></label>
                    <input class="w-full h-fit py-2 border-2 border-gray-200 rounded-xl pl-4 bg-white" type="email" name="email" value="{{ $user->email }}">
                    @error('email')
                        <x-message-valid   x-message-valid>{{ $message }}</x-message-valid>
                    @enderror
                </div>
                <div class="w-full flex flex-col">
                    <label class="font-semibold text-gray-900" for="bio">Bio</label>
                    <textarea class="w-full py-2 border-2 border-gray-200 rounded-xl pl-4 bg-white h-36 resize-none" name="bio">{{ $user->bio }}</textarea>
                    @error('bio')
                        <x-message-valid   x-message-valid>{{ $message }}</x-message-valid>
                    @enderror
                </div>
                
                <button type="submit" class="cursor-pointer w-full h-fit py-2 bg-gray-950 text-gray-50 rounded-xl">Edit</button>
            </div>
        </form>
    </section>
</x-app-layout>