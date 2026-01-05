<x-app-layout title="Kelola Karya">
	<section class="min-h-screen max-md:h-fit pt-18 max-w-5xl max-md:w-full mx-auto max-md:px-4">
		<div class="py-8 space-y-2">
			<h1 class="text-3xl font-semibold">Kelola Karya</h1>
			<p class="text-gray-600">Lorem ipsum dolor sit amet, mukeklu kek jamet.</p>
		</div>

		<div class="py-8 border-t-2 border-t-gray-200 h-fit w-full">
			@forelse($projects as $project)
			<div class="w-full p-4 max-md:p-2 h-20 max-md:h-14 flex items-center justify-between border-2 border-gray-200 bg-gray-100">
				<div class="flex h-full items-center gap-4">
					<div class="flex items-center justify-center h-full aspect-square rounded-md overflow-hidden"><img class="w-full h-full object-cover" src="{{ asset('/storage/' . $project->image) }}"></div>
					<div class="flex flex-col w-100 max-md:w-40">
						<h2 class="font-semibold max-md:text-sm truncate w-full">{{ $project->title }}</h2>
						<p class="text-sm text-gray-600 max-md:text-[.7rem]">{{ $project->created_at->translatedFormat('d F Y') }}</p>
					</div>
				</div>


				<div class="flex items-center gap-4 max-md:gap-2">
					@if ($project->status === 'rejected')
					<div class="bg-red-500/75 py-1 px-2 text-gray-50 rounded-md">
						<p class="text-sm max-md:text-[.7rem]">Ditolak</p>
					</div>

					@elseif($project->status === 'approved')
					<div class="bg-green-500/75 py-1 px-2 text-gray-50 rounded-md">
						<p class="text-sm max-md:text-[.7rem]">Disetujui</p>
					</div>

					@else
					<div class="bg-orange-500/75 py-1 px-2 text-gray-50 rounded-md">
						<p class="text-sm max-md:text-[.7rem]">Menunggu</p>
					</div>
					@endif

					<div class="disclosure relative">
						<button class="disclosure-btn text-2xl cursor-pointer flex h-fit items-center"><i class="bx bx-dots-vertical-rounded"></i></button>
						<div class="disclosure-panel absolute right-0 opacity-0 pointer-events-none p-4 bg-gray-50 shadow-md transition-all duration-300 space-y-2 rounded-md z-10">
							<a href="{{ route('project.show', $project) }}" class="text-blue-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-info-circle"></i> Detail</a>
							<a href="{{ route('project.edit', $project) }}" class="text-blue-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-pencil"></i> Edit</a>
							<form method="POST" action="{{ route('project.destroy', $project) }}">@csrf @method('DELETE')<button type="submit" class="cursor-pointer text-red-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-trash"></i> Hapus</button></form>
						</div>
					</div>
				</div>
			</div>
			@empty
				<div class="absolute left-0 text-center text-gray-600 mx-auto w-full h-30 flex items-center justify-center">
					<p>Belum ada karya.</p>
				</div>
			@endforelse
		</div>
	</section>
</x-app-layout>