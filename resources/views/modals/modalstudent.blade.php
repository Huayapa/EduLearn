<x-modal name="create-student">
    <h1 class="text-2xl text-center font-bold">Crear Alumno</h1>

    <form method="POST" action="{{ route('students.store') }}" class="flex flex-col gap-[10px] mb-2">
        @csrf

        <!-- NAME -->
        <div>
            <x-input-label for="name" value="Nombre" />
            <x-text-input id="name" type="text" name="name"
                class="block mt-1 w-full"
                value="{{ old('name') }}"
                required autocomplete="name"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- EMAIL -->
        <div>
            <x-input-label for="email" value="Correo" />
            <x-text-input id="email" type="email" name="email"
                class="block mt-1 w-full"
                value="{{ old('email') }}"
                required autocomplete="email"/>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- CODE + DNI -->
        <div class="flex flex-row gap-[10px]">
            <div class="w-full">
                <x-input-label for="code" value="Código" />
                <x-text-input id="code" type="text" name="code"
                    class="block mt-1 w-full"
                    value="{{ old('code') }}"
                    required autocomplete="code"/>
                <x-input-error :messages="$errors->get('code')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="dni" value="DNI" />
                <x-text-input id="dni" type="text" name="dni"
                    class="block mt-1 w-full"
                    value="{{ old('dni') }}"
                    required autocomplete="dni"/>
                <x-input-error :messages="$errors->get('dni')" class="mt-2" />
            </div>
        </div>

        <!-- SEMESTER + DOB -->
        <div class="flex flex-row gap-[10px]">
            <div class="w-full">
                <x-input-label for="semester" value="Semestre" />
                <x-text-input id="semester" type="text" name="semester"
                    class="block mt-1 w-full"
                    value="{{ old('semester') }}"
                    required autocomplete="semester"/>
                <x-input-error :messages="$errors->get('semester')" class="mt-2" />
            </div>

            <div class="w-full">
                <x-input-label for="date_of_birth" value="Fecha Nacimiento" />
                <x-text-input id="date_of_birth" type="date" name="date_of_birth"
                    class="block mt-1 w-full"
                    value="{{ old('date_of_birth') }}"
                    required autocomplete="date_of_birth"/>
                <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
            </div>
        </div>

        <x-primary-button class="w-full my-[10px]">
            {{ __('Crear') }}
        </x-primary-button>
    </form>
</x-modal>




<x-modal name="edit-student">
  <div
  x-data="{ student: {} }"
  x-on:student-selected.window="student = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Alumno</h1>
    {{-- action="{{ route('') }}" --}}
    <form method="POST"  x-bind:action="`/students/${student.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" x-model="student.id">

      <div>
          <x-input-label for="name" value="Nombre" />
          <x-text-input id="name" type="text" name="name"
              class="block mt-1 w-full"
              required autocomplete="name"
              x-model="student.name"/>
          <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div>
          <x-input-label for="email" value="Correo" />
          <x-text-input id="email" type="email" name="email"
              class="block mt-1 w-full"
              required autocomplete="email"
              x-model="student.email"/>
          <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="flex flex-row gap-[10px]">
          <div class="w-full">
              <x-input-label for="code" value="Código" />
              <x-text-input id="code" type="text" name="code"
                  class="block mt-1 w-full"
                  required autocomplete="code"
                  x-model="student.code"/>
              <x-input-error :messages="$errors->get('code')" class="mt-2" />
          </div>

          <div class="w-full">
              <x-input-label for="dni" value="DNI" />
              <x-text-input id="dni" type="text" name="dni"
                  class="block mt-1 w-full"
                  required autocomplete="dni"
                  x-model="student.dni"/>
              <x-input-error :messages="$errors->get('dni')" class="mt-2" />
          </div>
      </div>

      <div class="flex flex-row gap-[10px]">
          <div class="w-full">
              <x-input-label for="semester" value="Semestre" />
              <x-text-input id="semester" type="text" name="semester"
                  class="block mt-1 w-full"
                  required autocomplete="semester"
                  x-model="student.semester"/>
              <x-input-error :messages="$errors->get('semester')" class="mt-2" />
          </div>

          <div class="w-full">
              <x-input-label for="date_of_birth" value="Fecha Nacimiento" />
              <x-text-input id="date_of_birth" type="date" name="date_of_birth"
                  class="block mt-1 w-full"
                  required autocomplete="date_of_birth"
                  x-model="student.date_of_birth"/>
              <x-input-error :messages="$errors->get('date_of_birth')" class="mt-2" />
          </div>
      </div>

      <div>
          <x-input-label for="academic_status" value="Estado Académico" />
          <select name="academic_status" id="academic_status"
              required autocomplete="academic_status"
              class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
              x-model="student.academic_status"
          >
              @foreach ($statusStudents as $status)
                  <option value="{{ $status }}">
                      {{ ucfirst($status) }}
                  </option>
              @endforeach
          </select>
          <x-input-error :messages="$errors->get('academic_status')" class="mt-2" />
      </div>

      <div>
          <x-input-label for="status" value="Estado General" />
          <select name="status" id="status"
              required autocomplete="status"
              class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
              x-model="student.status"
          >
              @foreach ($statusS as $stat)
                  <option value="{{ $stat }}">
                      {{ ucfirst($stat) }}
                  </option>
              @endforeach
          </select>
          <x-input-error :messages="$errors->get('status')" class="mt-2" />
      </div>
      <x-primary-button class="w-full my-[10px]">
        {{ __('Editar') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>