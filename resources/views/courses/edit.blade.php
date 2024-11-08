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
      <form class="max-w-sm mx-auto" action="{{ route('courses.update', $course) }}" method="post"
        enctype="multipart/form-data" novalidate>
        @method('put')
        @csrf
        <div class="mb-5">
          <label for="courseName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombe del
            curso</label>
          <input type="text" id="courseName" name="courseName"
            class="bg-gray-50 border border-gray-300 text-gray-900 mb-2 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('courseName', $course->name) }}" required />
        </div>
        <div class="mb-5">
          <label for="courseDescription"
            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripcion del
            curso</label>
          <input type="courseDescription" id="courseDescription" name="courseDescription"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            value="{{ old('coursedescription', $course->description) }}" required />
        </div>
        <div class="mb-5">
          <label for="courseCategory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            category</label>
          <select id="courseCategory" name="courseCategory"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a category</option>
            @forelse ($categories as $category)
              <option value="{{ $category->name }}">{{ $category->name }}</option>
            @empty
              <option value="">Sin categorias</option>
            @endforelse
          </select>
        </div>
        <div class="mb-5">
          <label for="courseAgeGroup" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
            age range</label>
          <select id="courseAgeGroup" name="courseAgeGroup"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected>Choose a age range</option>
            @forelse ($ranges as $range)
              <option value="{{ $range->range }}">{{ $range->range }}</option>
            @empty
              <option value="0">Sin rangos</option>
            @endforelse
          </select>
        </div>
        {{-- <livewire:input-selector /> --}}

        {{-- <input
                class=" bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="submit" value="Submit"> --}}
        <button type="submit"
          class="text-dark bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
      </form>
    </div>
  </div>

</x-app-layout>
