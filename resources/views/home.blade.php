<x-app-layout title="Home">
	<section class="h-screen max-md:h-fit pt-18 w-full">
		<div class="px-12 max-md:p-4 grid grid-cols-2 gap-16 w-full h-full max-md:grid-cols-1">
			<div class="flex items-center justify-center w-full">
				<div class="w-fit h-fit flex flex-col gap-8">
					<div class="w-full h-fit space-y-8">
						<h1 class="text-6xl max-md:text-5xl">Ruang Tenang Untuk Karya yang Bicara</h1>
						<p>Rokaria adalah rumah bagi karya-karya terkurasi dari kreator yang berkarya dengan hati, bukan sekadar tampil.</p>
					</div>

					<div class="flex gap-4">
						<a href="{{ route('project.index') }}" class="border-2 border-gray-950 bg-gray-950 text-gray-50 w-40 flex items-center justify-center py-2 rounded-md">Jelajahi karya</a>
						<a href="{{ route('project.create') }}" class="border-2 border-gray-950 bg-gray-50 text-gray-950 w-40 flex items-center justify-center py-2 rounded-md hover:bg-gray-950 hover:text-gray-50 transition-all duration-300">Kirim karyamu</a>
					</div>

					<div class="flex gap-8">
						<div class="-space-y-1">
							<p class="text-4xl">{{ $total_user }}</p>
							<p class="text-md text-gray-600">Kreator</p>
						</div>

						<div class="-space-y-1">
							<p class="text-4xl">{{ $projects->count() }}</p>
							<p class="text-md text-gray-600">Karya</p>
						</div>
					</div>
				</div>
			</div>

			<div class="flex items-center justify-center w-full">
				<div class="w-fit h-fit grid grid-cols-2 gap-4">
					<div class="overflow-hidden rounded rotate-2 w-full aspect-4/3 flex items-center justify-center"><img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1621886292650-520f76c747d6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8Nnx8YXJ0c3xlbnwwfHwwfHx8MA%3D%3D"></div>
					<div class="overflow-hidden rounded rotate-2 w-full aspect-4/3 flex items-center justify-center"><img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1456086272160-b28b0645b729?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NHx8YXJ0c3xlbnwwfHwwfHx8MA%3D%3D"></div>
					<div class="overflow-hidden rounded rotate-2 w-full aspect-4/3 flex items-center justify-center"><img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1559813114-cda845612ae7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTF8fGFydHN8ZW58MHx8MHx8fDA%3D"></div>
					<div class="overflow-hidden rounded rotate-2 w-full aspect-4/3 flex items-center justify-center"><img class="w-full h-full object-cover" src="https://images.unsplash.com/photo-1520468164108-7f393c152c59?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTR8fGFydHN8ZW58MHx8MHx8fDA%3D"></div>
				</div>
			</div>
		</div>
	</section>

	<section class="h-90 max-md:h-fit w-full">
		<div class="px-12 py-20 max-md:p-4 grid grid-cols-2 w-full h-full gap-16 max-md:gap-8 max-md:grid-cols-1">
			<div class="flex flex-col gap-4 justify-center">
				<div class="space-y-2">
					<h2 class="text-3xl font-semibold max-md:text-2xl">Kenapa Rokaria?</h2>
					<p class="max-md:text-sm">Rokaria adalah ruang kurasi karya digital yang mengutamakan kualitas, kenyamanan kreator, dan cerita dibalik setiap karya.</p>
				</div>

				<div>
					<a href="" class="border-2 border-gray-950 bg-gray-950 text-gray-50 w-40 flex items-center justify-center py-2 rounded-md">Tentang Kami</a>
				</div>
			</div>

			<div class="flex items-center w-full h-full max-md:h-fit">
				<div class="flex flex-col h-full justify-between max-md:gap-4">
					<div class="flex gap-2 items-center">
						<div class="text-2xl bg-gray-100 text-gray-600 w-12 aspect-square flex items-center justify-center rounded-full">
							<i class="bx bx-select-all"></i>
						</div>
						<div class="-space-y-1">
							<h3 class="text-lg font-semibold">Kurasi, bukan asal upload</h3>
							<p class="max-md:text-sm">Setiap karya diseleksi agar yang tampil benar-benar layak dan bermakna.</p>
						</div>
					</div>

					<div class="flex gap-2 items-center">
						<div class="text-2xl bg-gray-100 text-gray-600 w-12 aspect-square flex items-center justify-center rounded-full">
							<i class="bx bx-shield"></i>
						</div>
						<div class="-space-y-1">
							<h3 class="text-lg font-semibold">Ruang aman untuk kreator</h3>
							<p class="max-md:text-sm">Lingkungan yang aman, saling menghargai, dan bebas dari tekanan.</p>
						</div>
					</div>

					<div class="flex gap-2 items-center">
						<div class="text-2xl bg-gray-100 text-gray-600 w-12 aspect-square flex items-center justify-center rounded-full">
							<i class="bx bx-book-open"></i>
						</div>
						<div class="-space-y-1">
							<h3 class="text-lg font-semibold">Fokus pada kualitas dan cerita</h3>
							<p class="max-md:text-sm">Setiap karya memiliki proses dan cerita yang patut diapresiasi.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

	<section class="min-h-screen max-md:h-fit w-full">
		<div class="px-12 py-20 max-md:p-4 w-full h-full space-y-8">
			<div class="flex w-full h-fit items-center justify-between">
				<h2 class="text-3xl font-semibold max-md:text-2xl">Karya Terbaru</h2>
				<a href="{{ route('project.index') }}" class="text-sm flex w-fit h-fit items-center">Lihat semua karya <i class="bx bx-chevron-right"></i></a>
			</div>

			<div class="columns-4 gap-4 max-lg:columns-3 max-md:columns-2">
				@forelse($projects as $project)
				<a href="{{ route('project.show', $project) }}">
					<div class="relative break-inside-avoid mb-4 block w-full group overflow-hidden rounded-md">
						<img src="{{ asset('/storage/' . $project->image) }}">
						<div class="text-gray-50 p-4 flex flex-col justify-between absolute top-0 left-0 group-hover:opacity-100 opacity-0 transition-all duration-300 w-full h-full bg-gray-950/25" style="z-index: 5;">
							<div class="flex w-fit h-fit">
								<h3 class="text-lg truncate">{{ $project->title }}</h3>
							</div>

							<div class="flex w-full justify-between h-fit items-center">
								<p class="text-lg truncate">{{ $project->user->name }}</p>
							</div>
						</div>
					</div>
				</a>
				@empty
				<div class="absolute left-0 text-center text-gray-600 mx-auto w-full h-30 flex items-center justify-center">
					<p>Belum ada karya.</p>
				</div>
				@endforelse
			</div>
		</div>
	</section>

	<section class="h-fit w-full">
		<div class="px-12 py-20 max-md:p-4 space-y-2">
			<p class="text-4xl text-gray-600 tracking-wider max-md:text-xl"><i>Punya karya yang layak dilihat dunia?</i></p>
			<p class="text-4xl text-gray-600 tracking-wider max-md:text-xl"><i>Kirim karyamu ke Rokaria.</i></p>
		</div>
	</section>
</x-app-layout>