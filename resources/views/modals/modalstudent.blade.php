<x-modal name="create-student">
  <h1 class="text-2xl text-center font-bold">Crear Alumno</h1>
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
        <x-input-label for="codeid" value="Codigo" />
        <x-text-input id="codeid" type="text" name="codeid"
        class="block mt-1 w-full" :value="old('codeid')" required autofocus autocomplete="codeid" />
        <x-input-error :messages="$errors->get('codeid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="dniid" value="DNI" />
        <x-text-input id="dniid" type="text" name="dniid"
        class="block mt-1 w-full" :value="old('dniid')" required autofocus autocomplete="dniid" />
        <x-input-error :messages="$errors->get('dniid')" class="mt-2" />
      </div>
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Semestre" />
        <x-text-input id="semesterid" type="text" name="semesterid"
        class="block mt-1 w-full" :value="old('semesterid')" required autofocus autocomplete="semesterid" />
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Fecha Nacimiento" />
        <x-text-input id="datenacid" type="date" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>




<x-modal name="edit-student">
  <h1 class="text-2xl text-center font-bold">Editar Alumno</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" class="flex flex-col gap-[10px] mb-2">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" x-model="student.id">
    <div>
      <x-input-label for="nameid" value="Nombre" />
      <x-text-input id="nameid" type="text" name="nameid"
      class="block mt-1 w-full" required autofocus autocomplete="nameid" x-model="student.name"/>
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
        <x-input-label for="codeid" value="Codigo" />
        <x-text-input id="codeid" type="text" name="codeid"
        class="block mt-1 w-full" :value="old('codeid')" required autofocus autocomplete="codeid" />
        <x-input-error :messages="$errors->get('codeid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="dniid" value="DNI" />
        <x-text-input id="dniid" type="text" name="dniid"
        class="block mt-1 w-full" :value="old('dniid')" required autofocus autocomplete="dniid" />
        <x-input-error :messages="$errors->get('dniid')" class="mt-2" />
      </div>
    </div>
    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Semestre" />
        <x-text-input id="semesterid" type="text" name="semesterid"
        class="block mt-1 w-full" :value="old('semesterid')" required autofocus autocomplete="semesterid" />
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Fecha Nacimiento" />
        <x-text-input id="datenacid" type="date" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>
    <div>
      <x-input-label for="statusid" value="Estado" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Selecciona el estado</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>