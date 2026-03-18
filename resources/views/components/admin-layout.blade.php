<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ?? '' }} | Admin Rokaria</title>
    <link href='https://cdn.boxicons.com/3.0.6/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href='https://cdn.boxicons.com/3.0.6/fonts/brands/boxicons-brands.min.css' rel='stylesheet'>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body
    class="bg-gray-100 font-inter overflow-hidden flex flex-col h-screen w-full"
  >
    <header
      class="px-12 max-md:px-6 w-full h-16 bg-gray-100 border-b-2 border-gray-200 justify-between flex items-center"
      style="z-index: 100"
    >
      <div class="flex gap-8 items-center h-fit w-fit">
        <a href="#" class="flex w-fit h-fit text-2xl">
          <p>Rokaria</p>
        </a>
      </div>

      <button class="text-xl cursor-pointer hidden max-md:block">
        <i class="bx bx-menu" id="sidebarBtn"></i>
      </button>
    </header>
    <div class="flex h-[calc(100vh-64px)] w-full">
      <aside
        class="max-md:absolute max-md:opacity-0 max-md:-left-full max-md:pointer-events-none h-[calc(100dvh-64px)] max-md:w-60 bg-gray-100 flex flex-col justify-between w-74 border-r-2 border-gray-200 p-4 transition-all duration-300"
        id="sidebar"
        style="z-index: 100;"
      >
        <nav>
          <ul class="flex flex-col gap-2">
            <li class="w-full cursor-pointer">
              <a
                href="{{ route("admin.dashboard") }}"
                class="flex items-center gap-2 text-md pl-4 rounded-lg w-full h-fit py-2 {{ request()->routeIs('admin.dashboard') ? 'bg-gray-50 shadow-md shadow-gray-600/5' : 'text-gray-600 hover:bg-gray-200/50 transition-all duration-200' }}"
                ><i class="bx bx-dashboard text-2xl"></i> Dashboard</a
              >
            </li>
            <li class="w-full cursor-pointer">
              <a
                href="{{ route("admin.user.index") }}"
                class="flex items-center gap-2 text-md pl-4 rounded-lg w-full h-fit py-2 {{ request()->routeIs('admin.user.*') ? 'bg-gray-50 shadow-md shadow-gray-600/5' : 'text-gray-600 hover:bg-gray-200/50 transition-all duration-200' }}"
                ><i class="bx bx-user text-2xl"></i> Users</a
              >
            </li>
            <li class="w-full cursor-pointer">
              <a
                href="../admin/karya/index.html"
                class="flex items-center gap-2 text-md pl-4 rounded-lg w-full h-fit py-2 {{ request()->routeIs('admin.project.*') ? 'bg-gray-50 shadow-md shadow-gray-600/5' : 'text-gray-600 hover:bg-gray-200/50 transition-all duration-200' }}"
                ><i class="bx bx-image-alt text-2xl"></i> Karya</a
              >
            </li>
          </ul>
        </nav>

        <div class="flex flex-col w-full p-2 gap-4">
          <div class="flex w-full gap-2">
            <div class="w-fit aspect-square flex justify-center items-center text-gray-50 font-bold bg-gray-950 rounded-full">A</div>
            <div class="flex flex-col">
              <h2 class="text-md">{{ Auth::user()->name }}</h2>
              <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
            </div>
          </div>

          <form method="POST" action="{{route('logout') }}">@csrf<button type="submit" class="flex cursor-pointer w-full items-center text-red-500 gap-2">
            <i class="bx bx-door-open text-2xl"></i>
            <span class="text-lg">Keluar</span>
            </button></form>
        </div>
      </aside>

      <main class="flex-1 overflow-y-auto space-y-8 py-8 px-10 max-md:p-4">
        {{ $slot }}
      </main>

      <x-toast/>
    </div>
  </body>
  @stack('scripts')
</html>
