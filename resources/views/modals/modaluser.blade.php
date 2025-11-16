<x-modal name="create-user">
  <h1 class="text-2xl text-center font-bold">Crear Docente</h1>
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
      <x-input-label for="emailid" value="Correo" />
      <x-text-input id="emailid" type="email" name="emailid"
      class="block mt-1 w-full" :value="old('emailid')" required autofocus autocomplete="emailid" />
      <x-input-error :messages="$errors->get('emailid')" class="mt-2" />
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="passwordid" value="Contraseña" />
        <x-text-input id="passwordid" type="text" name="passwordid"
        class="block mt-1 w-full" :value="old('passwordid')" required autofocus autocomplete="passwordid" />
        <x-input-error :messages="$errors->get('passwordid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="codeid" value="Codigo" />
        <x-text-input id="codeid" type="text" name="codeid"
        class="block mt-1 w-full" :value="old('codeid')" required autofocus autocomplete="codeid" />
        <x-input-error :messages="$errors->get('codeid')" class="mt-2" />
      </div>
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="statusid" value="Especialista" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>Ninguna</option>
        </select>
        <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="statusid" value="Rol" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>Docente</option>
        </select>
        <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
      </div>
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>



<x-modal name="edit-user">
  <h1 class="text-2xl text-center font-bold">Editar Docente</h1>
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
      <x-input-label for="emailid" value="Correo" />
      <x-text-input id="emailid" type="email" name="emailid"
      class="block mt-1 w-full" :value="old('emailid')" required autofocus autocomplete="emailid" />
      <x-input-error :messages="$errors->get('emailid')" class="mt-2" />
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="passwordid" value="Nueva Contraseña" />
        <x-text-input id="passwordid" type="text" name="passwordid"
        class="block mt-1 w-full" :value="old('passwordid')" required autofocus autocomplete="passwordid" />
        <x-input-error :messages="$errors->get('passwordid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="codeid" value="Codigo" />
        <x-text-input id="codeid" type="text" name="codeid"
        class="block mt-1 w-full" :value="old('codeid')" required autofocus autocomplete="codeid" />
        <x-input-error :messages="$errors->get('codeid')" class="mt-2" />
      </div>
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="statusid" value="Especialista" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>Ninguna</option>
        </select>
        <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="statusid" value="Rol" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>Docente</option>
        </select>
        <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
      </div>
    </div>
    <div>
      <x-input-label for="statusid" value="Estado" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Activo</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>