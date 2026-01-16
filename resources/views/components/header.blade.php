<header class="px-12 py-4 max-md:px-6 w-full h-fit bg-gray-50 fixed top-0 left-0 justify-between flex items-center" style="z-index: 100;">
    <div class="flex gap-8 items-center h-fit w-fit">
        <a href="{{ route('home') }}" class="flex w-fit h-fit text-2xl">
            <p>Rokaria</p>
        </a>

        <form method="GET" action="{{ route('project.index') }}">
            <div class="relative h-fit w-fit">
                <input type="text" name="search" id="search" class="bg-gray-100 focus:outline-2 focus:outline-gray-400 py-2 pl-4 pr-4 rounded-md" placeholder="Cari karya..." value="{{ request('search') }}">
                <button type="submit" class="absolute top-1/2 right-4 -translate-y-1/2 flex w-fit h-fit cursor-pointer"><i class="bx bx-search"></i></button>
            </div>
        </form>

        <nav class="flex max-md:hidden">
            <ul class="flex items-center gap-4">
                <li class="text-md text-gray-600"><a href="{{ route('project.index') }}">Jelajahi</a></li>
                @admin
                <li class="text-md text-gray-600"><a href="{{ route('admin.project.index') }}">Kelola Karya</a></li>
                @endadmin
            </ul>
        </nav>
    </div>

    @auth
    <div class="flex w-fit h-fit items-center gap-4">
        <div class="disclosure relative">
            <button class="disclosure-btn cursor-pointer">
                <span class="text-md flex w-fit h-fit items-center gap-1 max-md:hidden">{{ Auth::user()->name }} <i class="bx bx-chevron-down"></i></span>

                <span class="w-10 aspect-square overflow-hidden flex items-center justify-center rounded-full bg-gray-950 text-gray-50 md:hidden">{{ Auth::user()->initial }}</i></span>
            </button>

            <div class="disclosure-panel bg-gray-50 p-6 right-0 shadow-lg absolute opacity-0 pointer-events-none transition-all duration-300 rounded-md">
                <div class="-space-y-1 pb-4 border-b-2 border-b-gray-100">
                    <p class="text-md font-semibold truncate">{{ Auth::user()->name }}</p>
                    <p class="text-sm text-gray-600">{{ Auth::user()->email }}</p>
                </div>

                <div class="pt-4 space-y-2 flex flex-col" style="z-index: 200;">
                    <a href="{{ route('profile.index') }}"><p>Profil saya</p></a>
                    <form method="POST" action="{{route('logout') }}">@csrf<button type="submit" class="flex w-fit h-fit items-center gap-1 text-red-500 cursor-pointer"><i class="bx bx-arrow-out-right-square-half"></i> Keluar</button></form>
                </div>

            </div>
        </div>
        @endauth

        <!-- Kalo user belum login -->
        @guest
        <div class="flex items-center w-fit gap-4 max-md:hidden">
            <a href="{{ route('login') }}" class="border-2 border-gray-950 bg-gray-950 text-gray-50 w-24 flex items-center justify-center py-2 rounded-md text-sm">Masuk</a>
            <a href="{{ route('register') }}" class="border-2 border-gray-950 text-gray-950 w-24 flex items-center justify-center py-2 rounded-md text-sm">Daftar</a>
        </div>
        @endguest
    </div>
</header>