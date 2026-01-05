<x-app-layout title="Karya">
	<section class="h-fit max-w-5xl max-md:w-full mx-auto pt-18 max-md:pt-14">
		<div class="my-8 text-center space-y-4 max-md:space-y-2">
			<!-- Untuk halaman search -->
			
			@if(request('search'))
				<h1 class="text-3xl font-semibold max-md:text-2xl">{{ request('search') }}</h1>
				<p class="text-gray-600 max-md:text-sm">Berikut hasil dari pencarian "{{ request('search') }}" yang anda cari.</p>
			@else

			<!-- Untuk halaman karya tanpa search -->
			<h1 class="text-3xl font-semibold max-md:text-2xl">Jelajahi Karya</h1>
			@endif
		</div>

		<div class="relative columns-4 max-md:columns-2 mt-4 max-md:px-4">
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
	</section>
</x-app-layout>