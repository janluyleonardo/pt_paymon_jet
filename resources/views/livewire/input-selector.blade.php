<div>
  {{-- <form wire:submit.prevent="submit"> --}}
  <label>
    <input type="radio" name="tipo_input" value="file" wire:model="tipoInput">
    Subir archivo
  </label>
  <label>
    <input type="radio" name="tipo_input" value="text" wire:model="tipoInput">
    Ingresar texto
  </label>
  <br>
  @if ($tipoInput === 'file')
    <div>
      <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="courseFileInput">Uploadfile</label>
      <input
        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
        id="courseFileInput" name="courseFileInput" type="file" accept=".mp4">
    </div>
  @elseif($tipoInput === 'text')
    <div>
      <label for="courseLinkInput" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First
        name</label>
      <input type="text" id="courseLinkInput"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        placeholder="John" name="courseLinkInput" required />
    </div>
  @endif
  {{-- </form> --}}
</div>
