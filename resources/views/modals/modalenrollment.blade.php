<x-modal name="create-enrollment">
  <h1 class="text-2xl text-center font-bold">Crear Matrícula</h1>

  <form method="POST" action="{{ route('enrollments.store') }}" class="flex flex-col gap-[10px] mb-2">
    @csrf

    <div>
      <x-input-label for="student_id" value="Estudiante" />
      <select name="student_id" id="student_id"
        required autocomplete="student_id"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        @foreach($students as $student)
          <option value="{{ $student->id }}">{{ $student->name }}</option>
        @endforeach
      </select>
      <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="course_offering_id" value="Asignación de curso" />
      <select name="course_offering_id" id="course_offering_id"
        required autocomplete="course_offering_id"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
      >
        @foreach($coursesOfferings as $offering)
          <option value="{{ $offering->id }}">
            {{ $offering->course->name ?? 'Sin curso' }} - {{ $offering->semester }}º Semestre - {{ $offering->modality }} -
                  {{ $enrollment->courseOffering->shift }}
          </option>
        @endforeach
      </select>
      <x-input-error :messages="$errors->get('course_offering_id')" class="mt-2" />
    </div>


    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>




<x-modal name="edit-enrollment">
  <div
    x-data="{ enrollment: {} }"
    x-on:enrollment-selected.window="enrollment = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Matrícula</h1>

    <form method="POST" :action="`/enrollments/${enrollment.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')

      <input type="hidden" name="id" x-model="enrollment.id">

      <div>
        <x-input-label for="student_id" value="Estudiante" />
        <select name="student_id" id="student_id"
          required autocomplete="student_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="enrollment.student_id"
        >
          @foreach($students as $student)
            <option :value="{{ $student->id }}" x-bind:selected="enrollment.student_id == {{ $student->id }}">
              {{ $student->name }}
            </option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('student_id')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="course_offering_id" value="Asignación de curso" />
        <select name="course_offering_id" id="course_offering_id"
          required autocomplete="course_offering_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="enrollment.course_offering_id"
        >
          @foreach($coursesOfferings as $offering)
            <option :value="{{ $offering->id }}" x-bind:selected="enrollment.course_offering_id == {{ $offering->id }}">
              {{ $offering->course->name ?? 'Sin curso' }} - {{ $offering->semester }}º Semestre
            </option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('course_offering_id')" class="mt-2" />
      </div>

      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="final_grade" value="Nota Final" />
          <x-text-input id="final_grade" type="text" name="final_grade"
            class="block mt-1 w-full"
            x-model="enrollment.final_grade"
            autocomplete="final_grade"
          />
          <x-input-error :messages="$errors->get('final_grade')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="status" value="Estado" />
          <select name="status" id="status"
            required autocomplete="status"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="enrollment.status"
          >
            @foreach($statusE as $s)
              <option :value="'{{ $s }}'" x-bind:selected="enrollment.status == '{{ $s }}'">
                {{ ucfirst($s) }}
              </option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
      </div>

      <div>
        <x-input-label for="status_enrollment" value="Estado de matrícula" />
        <select name="status_enrollment" id="status_enrollment"
          required autocomplete="status_enrollment"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          x-model="enrollment.status_enrollment"
        >
          @foreach($statusEnrollments as $statusE)
            <option :value="'{{ $statusE }}'" x-bind:selected="enrollment.status_enrollment == '{{ $statusE }}'">
              {{ ucfirst($statusE) }}
            </option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('status_enrollment')" class="mt-2" />
      </div>

      <x-primary-button class="w-full my-[10px]">
        {{ __('Editar') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>