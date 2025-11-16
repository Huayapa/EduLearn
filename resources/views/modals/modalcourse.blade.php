<x-modal name="create-course">
  <h1 class="text-2xl text-center font-bold">Crear Curso</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" class="flex flex-col gap-[10px] mb-2">
    @csrf
    <div>
      <x-input-label for="nameid" value="Nombre" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="nameid" value="Descripción" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="nameid" value="Codigo" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
    </div>

    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>


<x-modal name="edit-course">
  <h1 class="text-2xl text-center font-bold">Editar Curso</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" class="flex flex-col gap-[10px] mb-2">
    @csrf
    <div>
      <x-input-label for="nameid" value="Nombre" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="nameid" value="Descripción" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
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
    <div>
      <x-input-label for="nameid" value="Codigo" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" :value="old('nameid')" required autofocus autocomplete="nameid" />
      <x-input-error :messages="$errors->get('nameid')" class="mt-2" />
    </div>

    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>


