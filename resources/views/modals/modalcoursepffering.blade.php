<x-modal name="create-courseoffering">
  <h1 class="text-2xl text-center font-bold">Crear Asignación Curso</h1>
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
      <x-input-label for="statusid" value="Curso" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Fisica</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <div>
      <x-input-label for="statusid" value="Profesor" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Pepito Gameplay</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Semestre" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>4</option>
        </select>
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Año" />
        <x-text-input id="datenacid" type="date" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>


    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Turno" />
        <select name="statusid" id="statusid"
          required autofocus autocomplete="statusid"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          >
            <option>Tarde</option>
          </select>
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Aula" />
        <x-text-input id="datenacid" type="text" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>


    <div>
      <x-input-label for="statusid" value="Modalidad" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Remoto</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>






<x-modal name="edit-courseoffering">
  <h1 class="text-2xl text-center font-bold">Editar Asignación Curso</h1>
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
      <x-input-label for="statusid" value="Curso" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Fisica</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <div>
      <x-input-label for="statusid" value="Profesor" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Pepito Gameplay</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Semestre" />
        <select name="statusid" id="statusid"
        required autofocus autocomplete="statusid"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option>4</option>
        </select>
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Año" />
        <x-text-input id="datenacid" type="date" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>


    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="semesterid" value="Turno" />
        <select name="statusid" id="statusid"
          required autofocus autocomplete="statusid"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          >
            <option>Tarde</option>
          </select>
        <x-input-error :messages="$errors->get('semesterid')" class="mt-2" />
      </div>
      <div class="w-full">
        <x-input-label for="datenacid" value="Aula" />
        <x-text-input id="datenacid" type="text" name="datenacid"
        class="block mt-1 w-full" :value="old('datenacid')" required autofocus autocomplete="datenacid" />
        <x-input-error :messages="$errors->get('datenacid')" class="mt-2" />
      </div>
    </div>


    <div>
      <x-input-label for="statusid" value="Modalidad" />
      <select name="statusid" id="statusid"
      required autofocus autocomplete="statusid"
      class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        <option>Remoto</option>
      </select>
      <x-input-error :messages="$errors->get('statusid')" class="mt-2" />
    </div>


    <x-primary-button class="w-full my-[10px]">
      {{ __('Editar') }}
    </x-primary-button>
  </form>
</x-modal>