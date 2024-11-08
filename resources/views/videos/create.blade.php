<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">
      {{-- {{ __('Principal Page') }} --}}
      Creacion de videos
    </h2>
  </x-slot>

  <div class="py-3">
    <div
      class="w-full mx-auto max-w-sm p-4 py-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
      {{-- <h1>Add Video to {{ $courses->name }}</h1> --}}

      <form action="{{ route('videos.store') }}" method="POST">
        @csrf
        <div class="mb-5">
          <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            course</label>
          <select id="course" name="course_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a course</option>
            @forelse ($courses as $course)
              <option value="{{ $course->id }}">{{ $course->name }}</option>
            @empty
              <option value="">Sin cursos</option>
            @endforelse
          </select>
        </div>
        <div class="mb-5">
          <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo del
            video</label>
          <input type="text" id="title" name="title"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos et eius eligendi dolorum distinctio laudantium, consequuntur culpa molestias fuga eaque pariatur quidem autem ducimus, possimus voluptatum, cupiditate repellat odit expedita!"
            required />
        </div>
        <div class="mb-5">
          <label for="url" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Link (URL) del
            video</label>
          <input type="text" id="url" name="url"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos et eius eligendi dolorum distinctio laudantium, consequuntur culpa molestias fuga eaque pariatur quidem autem ducimus, possimus voluptatum, cupiditate repellat odit expedita!"
            required />
        </div>
        <div class="mb-5">
          <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            category</label>
          <select id="category_id" name="category_id"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a category</option>
            @forelse ($categories as $category)
              <option value="{{ $category->id }}">{{ $category->name }}</option>
            @empty
              <option value="">Sin categorias</option>
            @endforelse
          </select>
        </div>
        <button type="submit"
          class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
      </form>
    </div>
  </div>
</x-app-layout>
