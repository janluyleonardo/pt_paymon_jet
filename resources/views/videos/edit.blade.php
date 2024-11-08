<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{-- {{ __('Principal Page') }} --}}
      Edicion de cursos
    </h2>
  </x-slot>

  <div class="py-3">
    <div
      class="w-full mx-auto max-w-sm p-4 py-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      <h1>Edit Video for {{ $course->name }}</h1>

      <form action="{{ route('videos.update', [$course, $video]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" name="title" class="form-control" value="{{ $video->title }}" required>
        </div>
        <div class="form-group">
          <label for="url">URL</label>
          <input type="text" name="url" class="form-control" value="{{ $video->url }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Video</button>
      </form>
    </div>
  </div>

</x-app-layout>
