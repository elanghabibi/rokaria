<x-page-layout title="Edit Karya" header="Edit Karya">
    <h2 class="text-center mx-auto mt-10 text-gray-600">Mengedit karya akan membutuhkan verifikasi dari admin lagi. Jadi mohon dipertimbangkan lagi</h2>
    <section class="max-w-5xl max-md:w-full max-md:p-4 mx-auto h-fit grid grid-cols-2 py-8 gap-4 max-md:grid-cols-1">
        <div class="w-full flex items-center justify-center overflow-hidden border-2 border-gray-200 rounded-md bg-gray-50 max-md:min-h-[100px]">
            <img src="{{ asset('/storage/' . $project->image) }}" id="previewImg" class="max-h-[500px]">
            <div id="previewPlaceholder" class="hidden text-xl text-gray-600"><p>Preview Foto</p></div>
        </div>

        <form class="space-y-4" method="POST" action="{{ route('project.update', $project) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div>
                <label class="flex w-full h-fit py-2 flex items-center justify-center border-2 border-dashed border-gray-200 text-gray-600 cursor-pointer bg-gray-50">
                    <input type="file" name="image" id="previewInput" accept="image/*" class="hidden">
                    Unggah Foto
                </label>
                @error('image')
                    <x-message-valid>{{ $message }}</x-message-valid>
                @enderror
            </div>

            <div class="charcounter space-y-1">
                <input type="text" name="title" maxlength="50" placeholder='Judul' class="charcounter-input w-full h-fit pl-2 py-2 border-2 border-gray-200 rounded-md placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600 bg-gray-50" value="{{ $project->title }}">
               <p class="text-sm text-gray-600"><span class="charcounter-preview">0</span>/50</p>
                @error('title')
                    <x-message-valid>{{ $message }}</x-message-valid>
                @enderror
            </div>

            <div class="charcounter space-y-1">
                <textarea name="description" maxlength="255" placeholder='Deskripsi' class="charcounter-input w-full h-[10rem] pl-2 py-2 border-2 border-gray-200 rounded-md placeholder:text-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-600 bg-gray-50 resize-none">{{ $project->description }}</textarea>
                <p class="text-sm text-gray-600"><span class="charcounter-preview">0</span>/255</p>
                @error('description')
                    <x-message-valid>{{ $message }}</x-message-valid>
                @enderror
            </div>

            <button type="submit" class="w-full h-fit py-2 flex items-center justify-center rounded-md bg-gray-950 text-gray-50 cursor-pointer">Kirim</button>
        </form>
        
    </section>
</x-page-layout>