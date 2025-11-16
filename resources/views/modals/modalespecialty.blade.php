<x-modal name="create-specialty">
  <h1 class="text-2xl text-center font-bold">Crear Especialidad</h1>
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
    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>



<x-modal name="edit-specialty">
  <h1 class="text-2xl text-center font-bold">Editar Especialidad</h1>
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
    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>