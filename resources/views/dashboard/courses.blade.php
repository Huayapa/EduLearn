<x-app-layout>
  <section class="w-full flex flex-col md:flex-row items-center justify-between h-min">
    {{-- Botones de la pagina --}}
    <div class="flex flex-row gap-[10px] py-[10px]">
        <button class="text-white p-[4px_10px] border border-[--primary] rounded-md 
        hover:bg-[--tertiary] hover:border-[--tertiary] 
        transition-all duration-200"
        x-data x-on:click="$dispatch('open-modal', 'create-course')"
        >Crear Curso</button>
    </div>

    {{-- dropdown ver perfil y eso --}}
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white hover:text-[--primary] focus:outline-none transition ease-in-out duration-150">
                <div>{{ Auth::user()->name }}</div>

                <div class="ms-1">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
        </x-slot>

        <x-slot name="content">
            <x-dropdown-link :href="route('profile.edit')">
                {{ __('Perfil') }}
            </x-dropdown-link>

            <form method="POST" action="{{ route('logout') }}" class="block xl:hidden ">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Cerrar Sesión') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
  </section>

  <section class="w-full flex-1 gap-[30px]">
    <h1 class="text-2xl font-bold text-white">Gestión Cursos</h1>
    <article class="w-full py-[1rem] overflow-x-auto flex flex-wrap gap-[10px]">
      @php
        $styles = [
            'active' => 'bg-[--green-body] border-[--green]',
            'inactive' => 'bg-[--red-body] border-[--red]',
        ];
      @endphp
      @foreach ($courses as $course)
      <section class="w-full md:w-[calc(50%_-_10px)] xl:w-[calc(33%_-_10px)] bg-[--body] p-[13px_15px] rounded-xl border border-[--border]">
          <div class="flex items-center gap-[10px] justify-between py-[5px]">
              <p class="rounded-md border p-[4px_15px] text-white 
                  {{ $styles[$course->status] ?? '' }}">
                  {{ $course->status === 'active' ? 'Activo' : 'Inactivo' }}
              </p>
              <div class="flex gap-[10px] justify-center items-center">
                  <button
                      class="material-icons rounded-md w-[2.5rem] h-[2.5rem] bg-[--yellow] text-xl hover:opacity-65 text-white"
                      x-data
                      @click="
                          $dispatch('course-selected', @js($course));
                          $dispatch('open-modal', 'edit-course');
                      "
                  >
                      edit
                  </button>
                  <form action="{{ route('courses.destroy', $course->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este curso?')">
                        @csrf
                        @method('DELETE')
                        <button class="material-icons rounded-md w-[2.5rem] h-[2.5rem] bg-[--red] text-xl hover:opacity-65">delete</button>
                    </form>
              </div>
          </div>

          <div class="w-full">
              <span class="italic">{{ $course->code }}</span>
              <h3 class="text-white text-2xl">{{ $course->name }}</h3>
              <p>{{ $course->description }}</p>
          </div>
      </section>
      @endforeach
    </article>
  </section>
  {{-- MODALES --}}
  @include('modals.modalcourse')
</x-app-layout>