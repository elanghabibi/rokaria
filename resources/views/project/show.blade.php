<x-app-layout title="{{ $project->title }}">
	<div class="p-12 max-md:p-4 flex w-full gap-8 max-lg:flex-col">
		<section class="min-h-screen pt-18 w-3/8 max-lg:w-full">
			<div>
				<div class="w-full flex items-center justify-center overflow-hidden border-2 border-gray-200 rounded-md bg-gray-50 max-md:min-h-[100px]">
					<img loading="lazy" src="{{ asset('/storage/' . $project->image) }}" class="max-h-[500px]">
				</div>
				<div class="flex flex-col w-full justify-between items-start my-4">
					<div class="flex justify-between w-full h-fit items-center">
						<h1 class="font-semibold text-2xl">{{ $project->title }}</h1>
						<div class="disclosure relative">
							<button class="disclosure-btn text-2xl cursor-pointer"><i class="bx bx-dots-horizontal-rounded"></i></button>
							<div class="disclosure-panel absolute right-0 opacity-0 pointer-events-none p-4 bg-gray-50 shadow-md transition-all duration-300 space-y-2 rounded-md">
								@if(Auth::check() && Auth::user()->id === $project->user->id)
								<a href="{{ route('project.show', $project) }}" class="text-blue-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-info-circle"></i> Detail</a>
								<a href="{{ route('project.edit', $project) }}" class="text-blue-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-pencil"></i> Edit</a>
								<form method="POST" action="{{ route('project.destroy', $project) }}">@csrf @method('DELETE')<button type="submit" class="cursor-pointer text-red-500 max-md:text-sm flex items-center gap-2"><i class="bx bx-trash"></i> Hapus</button></form>
								@endif
							</div>
						</div>
					</div>
					<p>{{ $project->description }}</p>
				</div>

				<div class="py-4 border-t border-t-gray-200 flex w-full items-center justify-between">
					<p><a href="{{ route('profile.show', $project->user->username) }}">{{ $project->user->name }}</a></p>
					<p class="text-gray-600 text-sm">{{ $project->created_at->diffForHumans() }}</p>
				</div>

				<!-- Admin Role -->
				@admin
				@if($project->status === 'pending')
				<div class="w-full h-fit grid grid-cols-2 gap-4">
					<form class="flex items-center justify-center" method="POST" action="{{ route('admin.project.approve', $project) }}">
						@csrf
						@method('PUT')
						<button class="w-full py-2 bg-green-600 text-gray-50 cursor-pointer rounded-md" type="submit">Setujui</button>
					</form>
					<form class="flex items-center justify-center" method="POST" action="{{ route('admin.project.reject', $project) }}">
						@csrf
						@method('PUT')
						<button class="w-full py-2 bg-red-600 text-gray-50 cursor-pointer rounded-md" type="submit">Tolak</button>
					</form>
				</div>
				@endif
				@endadmin
			</div>
		</section>

		<section class="min-h-screen pt-18 w-5/8 max-lg:w-full">
			<div class="relative columns-3 gap-4 max-md:columns-2">
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
	</div>
</x-app-layout>