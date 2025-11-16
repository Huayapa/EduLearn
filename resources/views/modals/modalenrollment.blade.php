<x-modal name="create-enrollment">
  <h1 class="text-2xl text-center font-bold">Crear Matricula</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" class="flex flex-col gap-[10px] mb-2">
    @csrf
    <div>
      <x-input-label for="statusid" value="Estudiante" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Josue Huayapa</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="statusid" value="Asignación de curso" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>CursoT06-Matematica</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>

    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>

<x-modal name="edit-enrollment">
  <h1 class="text-2xl text-center font-bold">Editar Matricula</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" class="flex flex-col gap-[10px] mb-2">
    @csrf
    <div>
      <x-input-label for="statusid" value="Estudiante" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Josue Huayapa</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="statusid" value="Asignación de curso" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>CursoT06-Matematica</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="codeid" value="Nota Final" />
        <x-text-input id="codeid" type="text" name="codeid"
        class="block mt-1 w-full" :value="old('codeid')" required autofocus autocomplete="codeid" />
        <x-input-error :messages="$errors->get('codeid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="statusid" value="Estado" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>Activo</option>
        </select>
        <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
      </div>
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>