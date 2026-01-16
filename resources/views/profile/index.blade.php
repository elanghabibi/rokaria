<x-app-layout title="{{ $user->name }}">
	<section class="h-fit max-w-5xl max-md:w-full mx-auto pt-18 w-full">
		<div>
			<div class="relative">
				<div class="w-full h-[10rem] overflow-hidden flex items-center justify-center rounded-md">
					<img src="https://placehold.co/600x100/black/white?text=:)" class="w-full h-full object-cover">
				</div>
				<div class="w-[10rem] aspect-square rounded-full overflow-hidden absolute -bottom-[5rem] border-2 border-gray-50 left-[2rem]">
					<img src="https://placehold.co/400x400/black/white?text={{ $user->initial }}">
				</div>
			</div>

			<div class="pb-[2rem] space-y-4 max-md:px-4">
				<div class="flex gap-8 pt-[6rem] items-center">
					<div>
						<h1 class="text-2xl font-semibold">{{ $user->name }}</h1>
						<p class="text-gray-600 max-md:text-sm">{{ $user->username }}</p>
					</div>
					<div class="flex gap-2 items-center">
						<div class="-space-y-1">
							<h2 class="text-2xl font-semibold">{{ $projects->count() }}</h2>
							<p class="text-gray-600">Karya</p>
						</div>
					</div>
				</div>

				@if(Auth::user()->id === $user->id )
				<a href="{{ route('my-project') }}" class="flex w-fit h-fit">
					<div class="bg-gray-200 py-1 px-4 rounded-md">
						<p>Kelola karyaku</p>
					</div>
				</a>
				@endif
			</div>
		</div>

		<div>
			<div class="p-4 border-y-2 border-y-gray-200 text-xl font-semibold">
				<p>Karyaku</p>
			</div>

			<div class="columns-4 max-lg:columns-3 max-md:columns-2 mt-4 max-md:px-4">
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

	<!-- Button create karya -->
	<a href="{{ route('project.create') }}">
		<div class="fixed bottom-14 right-14 w-16 aspect-square rounded-full bg-gray-950 text-gray-50 flex items-center justify-center text-4xl max-md:text-2xl">
			<span class="flex items-center justify-center"><i class="bx bx-plus"></i></span>
		</div>
	</a>
</x-app-layout>