<x-admin-layout title="Verifikasi Karya">
    <section class="flex flex-col gap-4">
        <div class="flex items-center justify-between w-full">
          <h1 class="text-2xl font-semibold flex items-center gap-2">
            <a href="{{ route('admin.project.index') }}" class="flex items-center"
              ><i class="bx bx-chevron-left"></i
            ></a>
            Verifikasi Karya
          </h1>

          <p class="text-gray-600 text-sm">{{ $projects->count() }} karya ditampilkan</p>
        </div>

          <div class="grid grid-cols-3 gap-4 w-full">
            <!-- Karya 1 -->
             @forelse($projects as $project)
             <div
              class="flex flex-col gap-4 w-fit h-fit bg-gray-50 rounded-xl shadow-lg shadow-gray-600/5 p-4"
            >
              <div
                class="w-full aspect-square rounded-lg border border-gray-200 bg-gray-100 overflow-hidden flex items-center justify-center"
              >
                <img
                  loading="lazy"
                  src="{{ asset('/storage/' . $project->image) }}"
                  class="max-h-[300px]"
                />
              </div>
              <div class="space-y-4">
                <div>
                  <h2 class="text-lg font-bold line-clamp-1">
                    {{ $project->title }}
                  </h2>
                  <p class="line-clamp-2 text-sm text-gray-600">
                    {{ $project->description }}
                  </p>
                </div>

                <div
                  class="pt-2 border-t border-t-gray-200 flex w-full items-center justify-between"
                >
                  <p class="text-gray-600 text-sm">
                    <a href="{{ route('profile.show', $project->user->username) }}">{{ $project->user->name }}</a>
                  </p>
                  <p class="text-gray-600 text-sm">{{ $project->created_at->diffForHumans() }}</p>
                </div>

                <div>
                  <div class="w-full h-fit flex justify-between">
                    <div>
                      <a
                        href=""
                        class="flex items-center justify-center text-sm w-fit aspect-square p-2 bg-orange-100 text-orange-600 cursor-pointer rounded-md"
                        ><i class="bx bx-info-circle"></i
                      ></a>
                    </div>
                    
                    <div class="flex gap-2">
                      <form
                        class="flex items-center justify-center"
                        method="POST"
                        action="{{ route('admin.project.approve', $project) }}"
                      >
                      @csrf
                      @method('PUT')
                      <button
                          class="flex items-center justify-center text-sm w-fit aspect-square p-2 bg-green-100 text-green-600 cursor-pointer rounded-md"
                          type="submit"
                        >
                          <i class="bx bx-check"></i>
                        </button>
                      </form>
                      <form
                        class="flex items-center justify-center"
                        method="POST"
                        action="{{ route('admin.project.reject', $project) }}"
                      >
                      @csrf
                      @method('PUT')
                      <button
                          class="flex items-center justify-center text-sm w-fit aspect-square p-2 bg-red-100 text-red-600 cursor-pointer rounded-md"
                          type="submit"
                        >
                          <i class="bx bx-x"></i>
                        </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
            <div class="col-span-3 w-full h-100 flex items-center text-gray-600 justify-center">
              <p>Semua sudah terverifikasi/Data tidak ada</p>
            </div>
            @endforelse
          </div>
        </section>
</x-admin-layout>