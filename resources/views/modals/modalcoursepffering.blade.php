<x-modal name="create-courseoffering">
  <div>
    <h1 class="text-2xl text-center font-bold">Crear Asignación Curso</h1>

    <form method="POST" action="{{ route('courseoffering.store') }}" class="flex flex-col gap-[10px] mb-2">
      @csrf

      <div>
        <x-input-label for="course_id" value="Curso" />
        <select name="course_id" id="course_id"
          required autocomplete="course_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          @foreach($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="teacher_id" value="Profesor" />
        <select name="teacher_id" id="teacher_id"
          required autocomplete="teacher_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          @foreach($teachers as $teacher)
            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
      </div>

      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="semester" value="Semestre" />
          <select name="semester" id="semester"
            required autocomplete="semester"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          >
            @foreach($semesters as $semester)
              <option value="{{ $semester }}">{{ $semester }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('semester')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="year" value="Año" />
          <x-text-input id="year" type="number" name="year"
            class="block mt-1 w-full"
            :value="old('year')" required autocomplete="year"
          />
          <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>
      </div>

      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="shift" value="Turno" />
          <select name="shift" id="shift"
            required autocomplete="shift"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          >
            @foreach($shifts as $shift)
              <option value="{{ $shift }}">{{ ucfirst($shift) }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('shift')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="classroom" value="Aula" />
          <x-text-input id="classroom" type="text" name="classroom"
            class="block mt-1 w-full"
            :value="old('classroom')" autocomplete="classroom"
          />
          <x-input-error :messages="$errors->get('classroom')" class="mt-2" />
        </div>
      </div>

      <div>
        <x-input-label for="modality" value="Modalidad" />
        <select name="modality" id="modality"
          required autocomplete="modality"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          @foreach($modalities as $modality)
            <option value="{{ $modality }}">{{ ucfirst($modality) }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('modality')" class="mt-2" />
      </div>

      <x-primary-button class="w-full my-[10px]">
        {{ __('Crear') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>











<x-modal name="edit-courseoffering">
  <div
    x-data="{ courseOffering: {} }"
    x-on:course-offering-selected.window="courseOffering = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Asignación Curso</h1>

    <form method="POST" :action="`/courseoffering/${courseOffering.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')

      <input type="hidden" name="id" x-model="courseOffering.id">

      {{-- Curso --}}
      <div>
        <x-input-label for="course_id" value="Curso" />
        <select name="course_id" id="course_id"
          required autocomplete="course_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="courseOffering.course_id"
        >
          @foreach($courses as $course)
            <option :value="'{{ $course->id }}'" x-bind:selected="courseOffering.course_id == '{{ $course->id }}'">{{ $course->name }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('course_id')" class="mt-2" />
      </div>

      {{-- Profesor --}}
      <div>
        <x-input-label for="teacher_id" value="Profesor" />
        <select name="teacher_id" id="teacher_id"
          required autocomplete="teacher_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="courseOffering.teacher_id"
        >
          @foreach($teachers as $teacher)
            <option :value="'{{ $teacher->id }}'" x-bind:selected="courseOffering.teacher_id == '{{ $teacher->id }}'">{{ $teacher->name }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('teacher_id')" class="mt-2" />
      </div>

      {{-- Semestre y Año --}}
      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="semester" value="Semestre" />
          <select name="semester" id="semester"
            required autocomplete="semester"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="courseOffering.semester"
          >
            @foreach($semesters as $semester)
              <option :value="'{{ $semester }}'" x-bind:selected="courseOffering.semester == '{{ $semester }}'">{{ $semester }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('semester')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="year" value="Año" />
          <x-text-input id="year" type="number" name="year"
            class="block mt-1 w-full"
            x-model="courseOffering.year"
            required autocomplete="year"
          />
          <x-input-error :messages="$errors->get('year')" class="mt-2" />
        </div>
      </div>

      {{-- Turno y Aula --}}
      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="shift" value="Turno" />
          <select name="shift" id="shift"
            required autocomplete="shift"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="courseOffering.shift"
          >
            @foreach($shifts as $shift)
              <option :value="'{{ $shift }}'" x-bind:selected="courseOffering.shift == '{{ $shift }}'">{{ ucfirst($shift) }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('shift')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="classroom" value="Aula" />
          <x-text-input id="classroom" type="text" name="classroom"
            class="block mt-1 w-full"
            x-model="courseOffering.classroom"
            autocomplete="classroom"
          />
          <x-input-error :messages="$errors->get('classroom')" class="mt-2" />
        </div>
      </div>

      {{-- Modalidad --}}
      <div>
        <x-input-label for="modality" value="Modalidad" />
        <select name="modality" id="modality"
          required autocomplete="modality"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="courseOffering.modality"
        >
          @foreach($modalities as $modality)
            <option :value="'{{ $modality }}'" x-bind:selected="courseOffering.modality == '{{ $modality }}'">{{ ucfirst($modality) }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('modality')" class="mt-2" />
      </div>

      {{-- Estado --}}
      <div>
        <x-input-label for="status" value="Estado" />
        <select name="status" id="status"
          required autocomplete="status"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="courseOffering.status"
        >
          @foreach($statusCO as $status)
            <option :value="'{{ $status }}'" x-bind:selected="courseOffering.status == '{{ $status }}'">{{ ucfirst($status) }}</option>
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