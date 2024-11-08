<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      Bienvenido a la pagina principal de videos
    </h2>
  </x-slot>

  <div class="py-3 mx-auto">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
        <div class="mx-2 my-2">
          <a class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center"
            href="{{ route('videos.create') }}">Crear video</a>
        </div>
        @if ($videos->isEmpty())
        @else
          <br>Listado de videos registrados en la plataforma
          <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    video title
                  </th>
                  <th scope="col" class="px-6 py-3">
                    video url
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Course Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Category Name
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Acciones
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($videos as $video)
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                      {{ $video->title }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $video->url }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $video->course->name }}
                    </td>
                    <td class="px-6 py-4">
                      {{ $video->category->name }}
                    </td>
                    <td class="px-6 py-4">
                      <div
                        class="w-48 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        {{-- <a href="{{ route('videos.show', $video) }}"
                          class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                          Show
                        </a> --}}
                        <a href="{{ route('videos.edit', $video) }}"
                          class="block w-full px-4 py-2 border-b border-gray-200 cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white">
                          Edit
                        </a>
                        <form action="{{ route('videos.destroy', $video) }}" method="post">
                          @csrf
                          @method('delete')
                          <button
                            class="block w-full px-4 py-2 rounded-b-lg cursor-pointer hover:bg-gray-100 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:border-gray-600 dark:hover:bg-gray-600 dark:hover:text-white dark:focus:ring-gray-500 dark:focus:text-white"
                            type="submit">
                            Delete
                          </button>
                        </form>
                      </div>
                    </td>
                  </tr>
                  </tr>
                @endforeach
              </tbody>
              <tfoot>{{ $videos->links() }}</tfoot>
            </table>
          </div>
        @endif
      </div>
    </div>
  </div>

</x-app-layout>
