<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{-- {{ __('Principal Page') }} --}}
      Bienvenido a la pagina principal de cursos
    </h2>
  </x-slot>

  <div class="py-3 mx-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mx-2 my-2">
          <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            href="{{ route('courses.create') }}">Crear curso</a>
        </div>
        @if ($courses->isEmpty())
        @else
          <br>Listado de cursos registrados en la plataforma
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Course name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Course Description
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Category
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Age Group
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($courses as $course)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                      {{ $course->name }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $course->description }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $course->category_name ?? 'No category' }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $course->age_range ?? 'No age range' }}
                    </td>
                    <td class="px-6 py-4">
                      <div
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <a href="{{ route('courses.show', $course) }}"
                          class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                          Show
                        </a>
                        <a href="{{ route('courses.edit', $course) }}"
                          class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                          Edit
                        </a>
                        <form action="{{ route('courses.destroy', $course) }}" method="post">
                          @csrf
                          @method('delete')
                          <button
                            class="block w-full px-4 py-2 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white"
                            type="submit">
                            Eliminar registro
                          </button>
                        </form>
                        {{-- <a href="{{ route('courses.destroy', $course) }}"
                          class="block w-full px-4 py-2 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                          Delete
                        </a> --}}
                      </div>
                    </td>
                  </tr>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>{{ $courses->links() }}</tfoot>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
