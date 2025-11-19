<x-modal name="create-course">
  <div>
    <h1 class="text-2xl text-center font-bold">Crear Curso</h1>

    <form method="POST" action="{{ route('courses.store') }}" class="flex flex-col gap-[10px] mb-2">
      @csrf

      <div>
        <x-input-label for="name" value="Nombre" />
        <x-text-input id="name" type="text" name="name"
          class="block mt-1 w-full"
          :value="old('name')" required autofocus autocomplete="name"
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="description" value="Descripción" />
        <x-text-input id="description" type="text" name="description"
          class="block mt-1 w-full"
          :value="old('description')" required autocomplete="description"
        />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="code" value="Código" />
        <x-text-input id="code" type="text" name="code"
          class="block mt-1 w-full"
          :value="old('code')" required autocomplete="code"
        />
        <x-input-error :messages="$errors->get('code')" class="mt-2" />
      </div>

      <x-primary-button class="w-full my-[10px]">
        {{ __('Crear') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>


<x-modal name="edit-course">
  <div
    x-data="{ course: {} }"
    x-on:course-selected.window="course = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Curso</h1>

    <form method="POST" x-bind:action="`/courses/${course.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')

      <input type="hidden" name="id" x-model="course.id">

      <div>
        <x-input-label for="name" value="Nombre" />
        <x-text-input id="name" type="text" name="name"
          class="block mt-1 w-full"
          required autocomplete="name"
          x-model="course.name"
        />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="description" value="Descripción" />
        <x-text-input id="description" type="text" name="description"
          class="block mt-1 w-full"
          required autocomplete="description"
          x-model="course.description"
        />
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>

      <div class="w-full">
        <x-input-label for="status" value="Estado" />
        <select name="status" id="status"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
          required autocomplete="status"
          x-model="course.status"
        >
          @foreach ($statusCourses as $status)
              <option value="{{ $status }}">{{ ucfirst($status) }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('status')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="code" value="Código" />
        <x-text-input id="code" type="text" name="code"
          class="block mt-1 w-full"
          required autocomplete="code"
          x-model="course.code"
        />
        <x-input-error :messages="$errors->get('code')" class="mt-2" />
      </div>

      <x-primary-button class="w-full my-[10px]">
        {{ __('Editar') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>


