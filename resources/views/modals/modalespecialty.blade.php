<x-modal name="create-specialty">
  <h1 class="text-2xl text-center font-bold">Crear Especialidad</h1>
  {{-- action="{{ route('') }}" --}}
  <form method="POST" action="{{ route('specialties.store') }}" class="flex flex-col gap-[10px] mb-2">
    @csrf
    <div>
      <x-input-label for="name" value="Nombre" />
      <x-text-input id="name" type="text" name="name"
      class="block mt-1 w-full" :value="old('name')" required autofocus autocomplete="name" />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>
    <div>
      <x-input-label for="description" value="Descripción" />
      <x-text-input id="description" type="text" name="description"
      class="block mt-1 w-full" :value="old('description')" required autofocus autocomplete="description" />
      <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <x-primary-button class="w-full my-[10px]">
      {{ __('Crear') }}
    </x-primary-button>
  </form>
</x-modal>



<x-modal name="edit-specialty">
  <div
    x-data="{ specialty: {} }"
    x-on:specialty-selected.window="specialty = $event.detail"
  >
    <h1 class="text-2xl text-center font-bold">Editar Especialidad</h1>
    {{-- action="{{ route('') }}" --}}
    <form method="POST" :action="`/specialties/${specialty.id}`" class="flex flex-col gap-[10px] mb-2">
      @csrf
      @method('PUT')
      <input type="hidden" name="id" x-model="specialty.id">
      <div>
        <x-input-label for="name" value="Nombre" />
        <x-text-input id="name" type="text" name="name"
        class="block mt-1 w-full" required autofocus autocomplete="name" x-model="specialty.name"/>
        <x-input-error :messages="$errors->get('name')" class="mt-2" />
      </div>
      <div>
        <x-input-label for="description" value="Descripción" />
        <x-text-input id="description" type="text" name="description"
        class="block mt-1 w-full" required autofocus autocomplete="description" x-model="specialty.description"/>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
      </div>
      <x-primary-button class="w-full my-[10px]">
        {{ __('Editar') }}
      </x-primary-button>
    </form>
  </div>
</x-modal>