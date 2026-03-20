<x-admin-layout title="{{ $project->title }}">
    <section class="w-full mx-auto space-y-4">
        <h1 class="text-2xl font-bold flex items-center gap-2">
            <a href="{{ route("admin.project.index") }}" class="flex items-center"><i class="bx bx-chevron-left"></i></a>
            Detail Karya
        </h1>
        <div class="w-full flex gap-6">
            <div
                class="w-2/5 aspect-square border border-gray-200 bg-gray-100 overflow-hidden flex items-center justify-center">
                <img loading="lazy"
                    src="{{asset('/storage/' . $project->image)}}"
                    class="max-h-[500px]" />
            </div>

            <div class="flex flex-col flex-1">
                <div class="flex flex-col w-full justify-between items-start my-4 space-y-2">
                    <div class="flex flex-col justify-between w-full h-fit">
                        <div class="flex w-full justify-between items-center">
                            <h1 class="font-semibold text-2xl">{{ $project->title }}</h1>
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
                        </div>
                        <p class="text-sm text-gray-600">ID Karya: {{ $project->id }}</p>
                    </div>
                    <p class="text-sm text-gray-600">
                        {{$project->description}}
                    </p>
                </div>

                <div class="py-4 border-t border-t-gray-200 flex w-full items-center justify-between">
                    <p class="text-gray-600 text-sm">
                        <a href="{{ route("profile.show", $project->user->username) }}">{{$project->user->name}}</a>
                    </p>
                    <p class="text-gray-600 text-sm">{{$project->created_at->diffForHumans()}}</p>
                </div>

                <!-- Admin Role -->
            </div>
        </div>
    </section>
</x-admin-layout>