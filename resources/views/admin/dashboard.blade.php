<x-admin-layout title="Dashboard">
    <section class="space-y-4">
          <h1 class="text-2xl font-semibold">Dashboard</h1>
          <div
            class="w-full flex gap-6 max-md:gap-4"
          >
            <a href="{{ route('admin.user.create') }}" class="block w-fit">
              <div class="flex flex-col gap-1 items-center justify-center">
                <i
                  class="w-fit p-4 text-2xl aspect-square bg-linear-to-br from-blue-400 to-blue-600 text-gray-50 rounded-full shadow-md shadow-gray-600/5 bx bx-plus"
                ></i>

                <p class="text-gray-600 text-sm leading-4 text-center">
                  Tambah<br />User
                </p>
              </div>
            </a>
            <a href="{{ route('admin.project.verification') }}" class="block w-fit">
              <div class="flex flex-col gap-1 items-center justify-center">
                <i
                  class="w-fit p-4 text-2xl aspect-square bg-linear-to-br from-green-400 to-green-600 text-gray-50 rounded-full shadow-md shadow-gray-600/5 bx bx-check"
                ></i>

                <p class="text-gray-600 text-sm leading-4 text-center">
                  Verifikasi<br />Karya
                </p>
              </div>
            </a>
          </div>
        </section>

        <section class="space-y-4">
          <h1 class="text-2xl font-semibold">Statistik</h1>
          <div
            class="w-full grid grid-cols-3 max-md:grid-cols-2 gap-6 max-md:gap-4"
          >
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-user"></i>
                <p>Total users</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countUser }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-brush"></i>
                <p>Total kreator</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countCreator }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-image-alt"></i>
                <p>Total karya</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countProject }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-image-alt"></i>
                <p>Total karya (Menunggu)</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countProjectPending }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-image-alt"></i>
                <p>Total karya (Disetujui)</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countProjectApproved }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
            <div
              class="w-full h-fit bg-gray-50 rounded-xl flex flex-col p-4 shadow-md shadow-gray-600/5"
            >
              <div class="flex text-sm text-gray-600 items-center gap-1">
                <i class="bx bx-image-alt"></i>
                <p>Total karya (Ditolak)</p>
              </div>
              <p class="text-4xl max-md:text-3xl my-2 font-bold">{{ $countProjectRejected }}</p>
              <p class="text-sm text-blue-600">Sepanjang Waktu</p>
            </div>
          </div>
        </section>
</x-admin-layout>