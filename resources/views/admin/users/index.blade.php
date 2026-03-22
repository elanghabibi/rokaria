<x-admin-layout title="Kelola User">
  <section class="space-y-4">
    <div class="flex justify-between items-center">
      <h1 class="text-2xl font-semibold">Daftar User</h1>

      <a href="{{ route('admin.user.create') }}"
        class="px-4 py-2 bg-sky-600 text-white rounded-lg text-sm flex items-center gap-2">
        <i class="bx bx-plus"></i>
        Tambah User
      </a>
    </div>

    <div class="flex gap-2">
      <a href="{{ route('admin.user.index') }}"
        class="text-sm px-3 py-1 border-2 rounded-full {{ !request('role') ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">Semua</a>
      <a href="{{ route('admin.user.index', ['role' => 'user']) }}"
        class="text-sm px-3 py-1 border-2 rounded-full {{ request('role') === 'user' ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">User</a>
      <a href="{{ route('admin.user.index', ['role' => 'admin']) }}"
        class="text-sm px-3 py-1 border-2 rounded-full {{ request('role') === 'admin' ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">Admin</a>
    </div>

    <div class="w-full bg-gray-50 rounded-lg shadow-sm border border-gray-200 overflow-hidden">
      <div class="px-6 py-3">
        <div class="flex items-center gap-4">
          <form action="{{ route('admin.user.index') }}" method="GET">
            <div class="relative">
              <i class="bx bx-search absolute top-1/2 -translate-y-1/2 left-2 text-gray-600"></i>
              <input type="search" name="search"
                class="focus:outline-sky-600 border-2 border-gray-200 bg-gray-100 rounded-lg py-2 pl-8 pr-2 text-sm"
                placeholder="Cari username..." value="{{ request('search') }}" />
            </div>
          </form>
          <p class="text-gray-600">{{ $users->count() }} karya ditampilkan</p>
        </div>
      </div>
      <div class="overflow-x-auto">
        <table class="w-full text-sm text-left">
          <thead class="bg-gray-100 text-gray-600">
            <tr class="border-b border-t border-gray-200">
              <th class="px-6 py-3">ID User</th>
              <th class="px-6 py-3">Username</th>
              <th class="px-6 py-3">Email</th>
              <th class="px-6 py-3">Total Karya</th>
              <th class="px-6 py-3">Role</th>
              <th class="px-6 py-3 text-center">Aksi</th>
            </tr>
          </thead>

          <tbody class="">
            @forelse ($users as $user)
              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td class="px-6 py-4">{{ $user->id }}</td>

                <td class="px-6 py-4">
                  <span>{{ $user->username }}</span>
                </td>

                <td class="px-6 py-4">{{ $user->email }}</td>

                <td class="px-6 py-4">{{ $user->projects->count() }}</td>

                <td class="px-6 py-4">
                  @if ($user->role === "admin")
                    <span class="px-2 py-1 text-xs bg-orange-100 text-orange-600 rounded">
                      Admin
                    </span>
                  @else
                    <span class="px-2 py-1 text-xs bg-blue-100 text-blue-600 rounded">
                      User
                    </span>
                  @endif
                </td>

                <td class="px-6 py-4">
                  <div class="flex justify-center gap-2">
                    <a href="{{ route('admin.user.show', $user) }}"
											class="cursor-pointer w-fit aspect-square p-2 bg-orange-100 text-orange-600 rounded flex items-center gap-1">
											<i class="bx bx-info-circle"></i>
										</a>

                    <a href="{{ route('admin.user.edit', $user) }}"
                    class="cursor-pointer w-fit aspect-square p-2 bg-blue-100 text-blue-600 rounded flex items-center gap-1">
                      <i class="bx bx-edit"></i>
                    </a>
                  
                  @if ($user->id !== Auth::user()->id)
                    <div class="disclosure">
                      <button
                        class="disclosure-btn cursor-pointer w-fit aspect-square p-2 bg-red-100 text-red-600 rounded flex items-center gap-1">
                        <i class="bx bx-trash"></i>
                      </button>

                      <div
                        class="disclosure-panel opacity-0 pointer-events-none absolute top-0 left-0 w-full h-screen flex justify-center items-center bg-gray-950/10"
                        style="z-index: 200">
                        <div
                          class="bg-gray-50 p-6 text-center rounded-xl shadow-lg shadow-gray-600/5 w-80 max-md:w-7/10 flex flex-col gap-6">
                          <i class="bx bx-alert-triangle text-red-500 text-5xl"></i>
                          <h2 class="text-2xl font-bold leading-6">
                            Hapus Data
                          </h2>
                          <p class="text-sm text-gray-600">
                            Apakah anda yakin ingin menghapus?
                          </p>

                          <div class="w-full grid grid-cols-2 gap-4">
                            <button
                              class="disclosure-btn w-full bg-gray-200 text-gray-950 font-bold py-2 text-sm rounded-lg cursor-pointer">
                              Batal
                            </button>
                            <form method="POST" action="{{ route('admin.user.destroy', $user) }}">
                              @csrf
                              <button type="submit"
                                class="w-full bg-red-500 text-gray-50 font-bold py-2 text-sm rounded-lg cursor-pointer">
                                Ya, Hapus
                              </button>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                    @endif
                  </div>
                </td>
              </tr>
            @empty
              <tr class="hover:bg-gray-100 border-b border-gray-200">
                <td colspan="6" class="px-6 py-4 text-center">Tidak ada data</td>
              </tr>
            @endforelse
          </tbody>
        </table>
        <div class="px-6 py-3">
          {{ $users->links() }}
        </div>
      </div>
    </div>
  </section>
</x-admin-layout>