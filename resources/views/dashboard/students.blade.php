<x-app-layout>
  <section class="w-full flex items-center justify-between h-min">
    {{-- Botones de la pagina --}}
    <div class="flex flex-col gap-[10px] py-[10px]">
        <button class="text-white p-[4px_10px] border border-[--primary] rounded-md 
        hover:bg-[--tertiary] hover:border-[--tertiary] 
        transition-all duration-200" x-data x-on:click="$dispatch('open-modal', 'create-student')">Crear Alumno</button>
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
    <h1 class="text-2xl font-bold text-white">Gestión Alumno</h1>
    <article class="w-full py-[1rem] overflow-x-auto">
        <table class="table-auto w-full text-white text-base text-center ">
            <thead>
                <tr class="border-b border-[--primary]">
                    <th class="py-[1rem]">Id</th>
                    <th class="py-[1rem]">Nombre</th>
                    <th class="py-[1rem]">Codigo</th>
                    <th class="py-[1rem]">Correo</th>
                    <th class="py-[1rem]">DNI</th>
                    <th class="py-[1rem]">Estado</th>
                    <th class="py-[1rem]">Semestre</th>
                    <th class="py-[1rem]">Nacimiento</th>
                    <th class="py-[1rem]">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $styles = [
                        'activo' => 'bg-[--green-body] border-[--green]',
                        'retirado' => 'bg-[--red-body] border-[--red]',
                        'terminado' => 'bg-[--blue-body] border-[--blue]',
                    ];
                @endphp
                @foreach ($students as $student)
                    <tr class="border-b border-[--tertiary]">
                        <td class="py-[1rem]">{{ $student->id }}</td>
                        <td class="py-[1rem]">{{ $student->name }}</td>
                        <td class="py-[1rem]">{{ $student->code }}</td>
                        <td class="py-[1rem]">{{ $student->email }}</td>
                        <td class="py-[1rem]">{{ $student->dni }}</td>
                        <td class="py-[1rem]">
                            <p class="rounded-md border  p-[4px_10px] {{ $styles[$student->academic_status] }}">{{ ucfirst($student->academic_status) }}</p>
                        </td>
                        <td class="py-[1rem]">{{ $student->semester }}ro</td>
                        <td class="py-[1rem]">{{ $student->date_of_birth }}</td>
                        <td class="py-[1rem] flex gap-[10px] justify-center items-center">
                            <button 
                            x-data
                            @click="
                                $dispatch('student-selected', @js($student));
                                $dispatch('open-modal', 'edit-student');
                            "
                            class="material-icons rounded-md w-[2.5rem] h-[2.5rem] bg-[--yellow] text-xl hover:opacity-65">edit</button>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este estudiante?')">
                                @csrf
                                @method('DELETE')
                                <button class="material-icons rounded-md w-[2.5rem] h-[2.5rem] bg-[--red] text-xl hover:opacity-65">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </article>
    {{-- <article class="w-full flex gap-[10px] items-center justify-center py-[1rem]">
        <button class="w-[2rem] h-[2rem] flex justify-center items-center rounded-md bg-[--tertiary]">1</button>
        <button class="w-[2rem] h-[2rem] flex justify-center items-center rounded-md bg-[--tertiary]">2</button>
        <button class="w-[2rem] h-[2rem] flex justify-center items-center rounded-md bg-[--tertiary]">3</button>
    </article> --}}
  </section>

  {{-- MODALES --}}
  @include('modals.modalstudent')
</x-app-layout>

