<x-admin-layout title="Edit User">
    <section>
        <h1 class="text-2xl font-bold">Edit User</h1>

        <div class="mt-6">
            <form action="{{ route('admin.user.update', $user) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-2 max-md:grid-cols-1 max-md:gap-2 gap-4">
                    <div class="flex flex-col w-full gap-1">
                        <label for="username">Username<span class="text-red-500">*</span></label>
                        <input type="text" name="username" id="username"
                            class="border-2 border-gray-200 bg-gray-50 py-1 pl-2 rounded-lg focus:outline-sky-600"
                            value="{{ $user->username }}" />
                        @error('username')
                            <x-message-valid>{{ $message }}</x-message-valid>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label for="name">Nama<span class="text-red-500">*</span></label>
                        <input type="text" name="name" id="name"
                            class="border-2 border-gray-200 bg-gray-50 py-1 pl-2 rounded-lg focus:outline-sky-600"
                            value="{{ $user->name }}" />
                        @error('name')
                            <x-message-valid>{{ $message }}</x-message-valid>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1">
                        <label for="email">Email<span class="text-red-500">*</span></label>
                        <input type="email" name="email" id="email"
                            class="border-2 border-gray-200 bg-gray-50 py-1 pl-2 rounded-lg focus:outline-sky-600"
                            value="{{ $user->email }}" />
                        @error('email')
                            <x-message-valid>{{ $message }}</x-message-valid>
                        @enderror
                    </div>
                    <div class="flex flex-col w-full gap-1 show-password">
                        <label for="password">Password<span class="text-red-500">*</span></label>
                        <div class="relative w-full">
                            <input type="password" name="password" id="password"
                                class="password-input w-full border-2 border-gray-200 bg-gray-50 py-1 pl-2 rounded-lg focus:outline-sky-600" />
                            <button type="button"
                                class="cursor-pointer w-fit h-fit flex absolute top-1/2 -translate-y-1/2 right-3 text-lg text-gray-600">
                                <i class="bx bx-eye password-btn-icon"></i>
                            </button>
                        </div>
                        <!-- <p class="text-red-500 text-sm">error message</p> -->
                    </div>

                    <div class="flex flex-col w-full gap-1">
                        <label for="role">Role<span class="text-red-500">*</span></label>
                        <select name="role" id="role"
                            class="w-fit border-2 border-gray-200 bg-gray-50 py-2 p-4 rounded-lg focus:outline-sky-600">
                            <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                        </select>
                    </div>
                </div>
                <div class="flex gap-4 mt-4">
                    <button type="submit"
                        class="w-fit h-fit px-8 cursor-pointer py-2 border-2 bg-sky-600 rounded-lg text-gray-50">
                        Edit
                    </button>
                    <a href="{{ route('admin.user.index') }}"
                        class="flex w-fit h-fit px-8 cursor-pointer py-2 border-2 border-gray-200 bg-gray-50 rounded-lg text-gray-950">Batal</a>
                </div>
            </form>
        </div>
    </section>
</x-admin-layout>