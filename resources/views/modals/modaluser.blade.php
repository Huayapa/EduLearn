<x-modal name="create-user">
  <h1 class="text-2xl text-center font-bold">Crear Docente</h1>

  <form method="POST" action="{{ route('instructors.store') }}" class="flex flex-col gap-[10px] mb-2">
    @csrf

    <div>
      <x-input-label for="name" value="Nombre" />
      <x-text-input id="name" type="text" name="name"
        class="block mt-1 w-full" :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <div>
      <x-input-label for="email" value="Correo" />
      <x-text-input id="email" type="email" name="email"
        class="block mt-1 w-full" :value="old('email')" required autocomplete="email" />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <div class="flex flex-row gap-[10px]">
      <div class="w-full">
        <x-input-label for="password" value="Contraseña" />
        <x-text-input id="password" type="text" name="password"
          class="block mt-1 w-full" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
      </div>

      <div class="w-full">
        <x-input-label for="specialty_id" value="Especialidad" />
        <select name="specialty_id" id="specialty_id"
          class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        >
          <option value="">Ninguna</option>
          @foreach($specialties as $specialty)
            <option value="{{ $specialty->id }}" @selected(old('specialty_id') == $specialty->id)>{{ $specialty->name }}</option>
          @endforeach
        </select>
        <x-input-error :messages="$errors->get('specialty_id')" class="mt-2" />
      </div>
    </div>

    <div class="w-full">
      <x-input-label for="role" value="Rol" />
      <select name="role" id="role"
        class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
        required
      >
        @foreach($roles as $role)
          <option value="{{ $role }}" @selected(old('role') == $role)>{{ ucfirst($role) }}</option>
        @endforeach
      </select>
      <x-input-error :messages="$errors->get('role')" class="mt-2" />
    </div>

    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>



<x-modal name="edit-user">
  <div
    x-data="{ user: {} }"
    x-on:user-selected.window="user = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Docente</h1>

    <form method="POST" :action="`/instructors/${user.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" x-model="user.id">
      <div>
        <x-input-label for="name" value="Nombre" />
        <x-text-input id="name" type="text" name="name"
          class="block mt-1 w-full"
          x-model="user.name"
          required autocomplete="name" />
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>

      <div>
        <x-input-label for="email" value="Correo" />
        <x-text-input id="email" type="email" name="email"
          class="block mt-1 w-full"
          x-model="user.email"
          required autocomplete="email" />
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
      </div>

      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="password" value="Nueva Contraseña" />
          <x-text-input id="password" type="text" name="password"
            class="block mt-1 w-full"
            placeholder="Dejar vacío si no cambia"
            autocomplete="new-password" />
          <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="specialty_id" value="Especialidad" />
          <select name="specialty_id" id="specialty_id"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="user.specialty_id"
          >
            <option value="">Ninguna</option>
            @foreach($specialties as $specialty)
              <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('specialty_id')" class="mt-2" />
        </div>
      </div>

      <div class="flex flex-row gap-[10px]">
        <div class="w-full">
          <x-input-label for="role" value="Rol" />
          <select name="role" id="role"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="user.role"
            required
          >
            @foreach($roles as $role)
              <option value="{{ $role }}">{{ ucfirst($role) }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('role')" class="mt-2" />
        </div>

        <div class="w-full">
          <x-input-label for="status" value="Estado" />
          <select name="status" id="status"
            class="border-[--tertiary] focus:border-[--tertiary] focus:ring-[--tertiary] text-white rounded-md shadow-sm bg-[#353535] w-full"
            x-model="user.status"
            required
          >
            @foreach($statusUsers as $status)
              <option value="{{ $status }}">{{ ucfirst($status) }}</option>
            @endforeach
          </select>
          <x-input-error :messages="$errors->get('status')" class="mt-2" />
        </div>
      </div>

      <x-primary-button class="w-full my-[10px]">
        {{ __('Editar') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>