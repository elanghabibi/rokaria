<x-admin-layout title="Kelola Karya">
	<section class="flex flex-col gap-4">
		<div class="flex justify-between items-center">
			<h1 class="text-2xl font-semibold">Daftar Karya</h1>

			<a href="{{ route('admin.project.verification') }}"
				class="px-4 py-2 bg-sky-600 text-white rounded-lg text-sm flex items-center gap-2">
				Verifikasi Karya
			</a>
		</div>

		<div class="flex gap-2">
			<a href="{{ route('admin.project.index') }}"
				class="text-sm px-3 py-1 border-2 rounded-full {{ !request('status') ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }} ">Semua</a>
			<a href="{{ route('admin.project.index', ['status' => 'pending']) }}"
				class="text-sm px-3 py-1 border-2 rounded-full {{ request('status') === 'pending' ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">Menunggu</a>
			<a href="{{ route('admin.project.index', ['status' => 'approved']) }}"
				class="text-sm px-3 py-1 border-2 rounded-full {{ request('status') === 'approved' ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">Disetujui</a>
			<a href="{{ route('admin.project.index', ['status' => 'rejected']) }}"
				class="text-sm px-3 py-1 border-2 rounded-full {{ request('status') === 'rejected' ? 'text-sky-600 border-sky-200 bg-sky-100' : 'text-gray-600 border-gray-200 hover:bg-sky-100' }}">Ditolak</a>
		</div>

		<div class="w-full bg-gray-50 rounded-lg shadow-sm border border-gray-200 overflow-hidden">
			<div class="px-6 py-3 flex justify-between items-center">
				<div class="flex items-center gap-4">
					<form action="{{ route('admin.project.index') }}" method="GET">
						<div class="relative">
							<i class="bx bx-search absolute top-1/2 -translate-y-1/2 left-2 text-gray-600"></i>
							<input type="search" name="search"
								class="focus:outline-sky-600 border-2 border-gray-200 bg-gray-100 rounded-lg py-2 pl-8 pr-2 text-sm"
								placeholder="Cari karya..." value="{{ request('search') }}" />
						</div>
					</form>
					<p class="text-gray-600">{{ $projects->count() }} karya ditampilkan</p>
				</div>
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
						Hapus Semua Karya
						</h2>
						<p class="text-sm text-gray-600">
						Apakah anda yakin ingin menghapus semua karya?
						</p>

						<div class="w-full grid grid-cols-2 gap-4">
						<button
							class="disclosure-btn w-full bg-gray-200 text-gray-950 font-bold py-2 text-sm rounded-lg cursor-pointer">
							Batal
						</button>
						<form method="POST" action="{{ route('admin.project.destroy-all') }}">
							@csrf
							@method("delete")
							<button type="submit"
							class="w-full bg-red-500 text-gray-50 font-bold py-2 text-sm rounded-lg cursor-pointer">
							Ya, Hapus
							</button>
						</form>
						</div>
					</div>
					</div>
				</div>
			</div>
			<div class="overflow-x-auto">
				<table class="w-full text-sm text-left">
					<thead class="bg-gray-100 text-gray-600">
						<tr class="border-b border-t border-gray-200">
							<th class="px-6 py-3">ID Karya</th>
							<th class="px-6 py-3">Username Pemilik</th>
							<th class="px-6 py-3">Nama Pemilik</th>
							<th class="px-6 py-3">Karya</th>
							<th class="px-6 py-3">Judul</th>
							<th class="px-6 py-3">Status</th>
							<th class="px-6 py-3 text-center">Aksi</th>
						</tr>
					</thead>

					<tbody class="">
						@forelse($projects as $project)
							<tr class="hover:bg-gray-100 border-b border-gray-200">
								<td class="px-6 py-4">{{ $project->id }}</td>

								<td class="px-6 py-4">
									<span>{{ $project->user->username }}</span>
								</td>

								<td class="px-6 py-4">
									<span>{{ $project->user->name }}</span>
								</td>

								<td class="px-6 py-4">
									<div
										class="flex items-center justify-center h-10 aspect-square rounded-md overflow-hidden">
										<img class="w-full h-full object-cover"
											src="{{ asset('/storage/' . $project->image) }}" />
									</div>
								</td>

								<td class="px-6 py-4">
									<div class="w-30 truncate">{{ $project->title }}</div>
								</td>

								<td class="px-6 py-4">
									@if($project->status === 'pending')
										<span class="text-xs bg-orange-100 py-1 px-2 text-orange-600 rounded-md">
											Menunggu
										</span>

									@elseif($project->status === 'approved')
										<span class="text-xs bg-green-100 py-1 px-2 text-green-600 rounded-md">
											Disetujui
										</span>

									@else($project->status === 'rejected')
										<span class="text-xs bg-red-100 py-1 px-2 text-red-600 rounded-md">
											Ditolak
										</span>
									@endif
								</td>

								<td class="px-6 py-4">
									<div class="flex justify-center gap-2">
										<a href="{{ route('admin.project.show', $project) }}"
											class="cursor-pointer w-fit aspect-square p-2 bg-orange-100 text-orange-600 rounded flex items-center gap-1">
											<i class="bx bx-info-circle"></i>
										</a>

										<div class="disclosure">
											<button
												class="disclosure-btn cursor-pointer w-fit aspect-square p-2 bg-red-100 text-red-600 rounded flex items-center gap-1">
												<i class="bx bx-trash"></i>
											</button>

											<div class="disclosure-panel opacity-0 pointer-events-none absolute top-0 left-0 w-full h-screen flex justify-center items-center bg-gray-950/10"
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
														<form action="{{ route("project.destroy", $project) }}" method="POST">
															@csrf
															@method('delete')
															<button type="submit"
																class="w-full bg-red-500 text-gray-50 font-bold py-2 text-sm rounded-lg cursor-pointer">
																Ya, Hapus
															</button>
														</form>
													</div>
												</div>
											</div>
										</div>
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
					{{ $projects->links() }}
				</div>
			</div>
		</div>
	</section>
</x-admin-layout>