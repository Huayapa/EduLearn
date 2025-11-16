<x-app-layout>
  <section class="w-full flex items-center justify-between h-min">
    {{-- Botones de la pagina --}}
    <div class="flex flex-col gap-[10px] py-[10px]">
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




  <section class="flex gap-[10px] flex-wrap xl:flex-nowrap">
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Total Alumnos</h3>
        <p class="text-4xl text-white">10</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Total Alumnos</h3>
        <p class="text-4xl text-white">10</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Total Alumnos</h3>
        <p class="text-4xl text-white">10</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Total Alumnos</h3>
        <p class="text-4xl text-white">10</p>
    </article>
  </section>




  <section class="flex gap-[20px] flex-col md:flex-row md:flex-nowrap py-[1rem]">
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Cursos Recientes</h2>
        <p>Ultimos cursos agregados en el sistema</p>
        <section class="flex flex-col gap-[10px]">
            <div class="w-full bg-[#222222] flex items-center p-[20px_10px]">
                <p class="text-white text-xl">Matematica 1</p>
            </div>
            <div class="w-full bg-[#222222] flex items-center p-[20px_10px]">
                <p class="text-white text-xl">Matematica 1</p>
            </div>
            <div class="w-full bg-[#222222] flex items-center p-[20px_10px]">
                <p class="text-white text-xl">Matematica 1</p>
            </div>
        </section>
    </article>
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Matriculas Recientes</h2>
        <p>Ultimas matriculas agregadas en el sistema</p>
        <section class="flex flex-col gap-[10px]">
            <div class="w-full bg-white flex items-start justify-between p-[20px_10px] rounded-[10px]">
                <div class="flex flex-col items-start gap-[10px]">
                    <p class="text-xl text-[--fourth] font-bold">Josue Huayapa</p>
                    <p class="text-m text-[--fourth]">Inscrito el: 09/11/2005</p>
                    <p class="p-[4px_30px] text-white bg-[--red] rounded-[2rem] text-center">Finalizado</p>
                </div>
                <div class="flex flex-col items-start gap-[10px]">
                    <a href="#" class="text-m text-[--fourth] underline">Ver Cursos</a>
                </div>
                
            </div>
            <div class="w-full bg-white flex items-start justify-between p-[20px_10px] rounded-[10px]">
                <div class="flex flex-col items-start gap-[10px]">
                    <p class="text-xl text-[--fourth] font-bold">Josue Huayapa</p>
                    <p class="text-m text-[--fourth]">Inscrito el: 09/11/2005</p>
                    <p class="p-[4px_30px] text-white bg-[--green] rounded-[2rem] text-center">Activo</p>
                </div>
                <div class="flex flex-col items-start gap-[10px]">
                    <a href="#" class="text-m text-[--fourth] underline">Ver Cursos</a>
                </div>
                
            </div>
        </section>
    </article>
  </section>





  <section class="flex gap-[20px] flex-col md:flex-row md:flex-nowrap py-[2rem]">
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Matriculas por Curso</h2>
        <section class="flex flex-col gap-[10px]">
            <div class="w-full flex items-center gap-[10px]">
                <h3 class="text-xl text-white font-bold">Matematicas</h3>
                <div class="w-full bg-[--primary] rounded-[30px]">
                    <div class="bg-[--tertiary] p-[5px_40px] w-[30%] text-center rounded-[30px]">3</div>
                </div>
            </div>
            <div class="w-full flex items-center gap-[10px]">
                <h3 class="text-xl text-white font-bold">Programación</h3>
                <div class="w-full bg-[--primary] rounded-[30px]">
                    <div class="bg-[--tertiary] p-[5px_40px] w-[40%] text-center rounded-[30px]">6</div>
                </div>
            </div>
            <div class="w-full flex items-center gap-[10px]">
                <h3 class="text-xl text-white font-bold">Panaderia</h3>
                <div class="w-full bg-[--primary] rounded-[30px]">
                    <div class="bg-[--tertiary] p-[5px_40px] w-[10%] text-center rounded-[30px]">1</div>
                </div>
            </div>
            <div class="w-full flex items-center gap-[10px]">
                <h3 class="text-xl text-white font-bold">Odontologia</h3>
                <div class="w-full bg-[--primary] rounded-[30px]">
                    <div class="bg-[--tertiary] p-[5px_40px] w-[50%] text-center rounded-[30px]">5</div>
                </div>
            </div>
            <div class="w-full flex items-center gap-[10px]">
                <h3 class="text-xl text-white font-bold">Medicina</h3>
                <div class="w-full bg-[--primary] rounded-[30px]">
                    <div class="bg-[--tertiary] p-[5px_40px] text-center rounded-[30px] w-[80%]">20</div>
                </div>
            </div>
        </section>
    </article>
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Alumnos por Bloques</h2>
        <section class="flex flex-row gap-[40px] justify-center">
            <div class="bg-[--primary] rounded-full w-[200px] h-[200px]"></div>
            <div class="flex flex-col gap-[10px]">
                <div class="flex gap-[10px] items-center">
                    <div class="bg-[--primary] w-[1rem] h-[1rem] border border-white rounded-sm"></div>
                    <p>5 alumnos</p>
                </div>
                <div class="flex gap-[10px] items-center">
                    <div class="bg-[--primary] w-[1rem] h-[1rem] border border-white rounded-sm"></div>
                    <p>5 alumnos</p>
                </div>
            </div>
        </section>
    </article>
  </section>
</x-app-layout>