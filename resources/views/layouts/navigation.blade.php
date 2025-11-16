<nav x-data="{ open: false }" class="bg-[--fourth] rounded-[20px] flex-col items-center gap-[30px] p-[20px] w-full max-w-[20rem] hidden xl:flex">
    <a href="{{ route('dashboard') }}">
        <x-application-logo class="block fill-current text-[--primary] w-[200px]" />
    </a>


    <nav class="flex-1 flex flex-col text-white w-full gap-[10px]">

        <a href="{{ route('dashboard') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'dashboard') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">home</span>
            <span class="text-xl font-bold">Inicio</span>
        </a>


        <a href="{{ route('students') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'students') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">school</span>
            <span class="text-xl font-bold">Alumnos</span>
        </a>


        <a href="{{ route('instructors') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'instructors') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">co_present</span>
            <span class="text-xl font-bold">Docentes</span>
        </a>



        <a href="{{ route('courses') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'courses') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">book</span>
            <span class="text-xl font-bold">Cursos</span>
        </a>


        <a href="{{ route('courseoffering') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'courseoffering') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">book</span>
            <span class="text-xl font-bold">Asignación Curso</span>
        </a>


        <a href="{{ route('enrollments') }}" 
        class="flex items-center gap-[10px] border-l-[2px] p-[7px_10px] w-full rounded-br-[20px] 
        transition-all duration-300 hover:border-[--primary] hover:bg-[--tertiary]
        {{ request()->routeIs(patterns: 'enrollments') 
            ? 'bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)] border-[--primary]' 
            : 'bg-[var(--body)] border-transparent' }}">
    
            <span class="material-icons text-xl">bookmark</span>
            <span class="text-xl font-bold">Matriculas</span>
        </a>
    </nav>

    

    <form method="POST" action="{{ route('logout') }}" class="w-full">
        @csrf
        <button type="submit" class="w-full bg-[--red] rounded-[10px] py-[0.5rem] font-bold text-md transition-all duration-300 hover:opacity-65">
            Cerrar Sesión
        </button>
    </form>

    
</nav>


<button onclick="document.getElementById('navmobile').classList.toggle('view')"
class="material-icons block xl:hidden absolute bottom-[2rem] right-[2rem] text-white z-1 text-2xl rounded-full bg-[--tertiary] w-[50px] h-[50px]"
>menu</button>

<nav id="navmobile" 
class="absolute translate-x-[140%] transition-all duration-300 flex flex-col xl:hidden bottom-[6rem] items-end right-[2rem] gap-[10px] [&.view]:translate-x-0">

    <a href="{{ route('dashboard') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'dashboard') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Inicio</span>
    <span class="material-icons text-xl">home</span>
    </a>


    <a href="{{ route('students') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'students') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Alumnos</span>
    <span class="material-icons text-xl">school</span>
    </a>


    <a href="{{ route('instructors') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'instructors') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Docentes</span>
    <span class="material-icons text-xl">co_present</span>
    </a>


    <a href="{{ route('courses') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'courses') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Cursos</span>
    <span class="material-icons text-xl">book</span>
    </a>


    <a href="{{ route('courseoffering') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'courseoffering') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Asignación Curso</span>
    <span class="material-icons text-xl">book</span>
    </a>


    <a href="{{ route('enrollments') }}" 
    class="flex items-center gap-[10px] p-[5px_20px] w-fit rounded-[30px] 
    transition-all duration-300 
    {{ request()->routeIs(patterns: 'enrollments') 
        ? 'bg-[--secondary] text-[--tertiary] hover:text-[--secondary] hover:bg-[--tertiary]' 
        : 'bg-[--tertiary] text-[--secondary] hover:text-[--tertiary] hover:bg-[--secondary]' }}">
    <span class="text-xl">Matriculas</span>
    <span class="material-icons text-xl">bookmark</span>
    </a>

    
</nav>




{{--  
<div class="hidden sm:flex sm:items-center sm:ms-6">
    <x-dropdown align="right" width="48">
        <x-slot name="trigger">
            <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
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
                {{ __('Profile') }}
            </x-dropdown-link>

            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-dropdown-link>
            </form>
        </x-slot>
    </x-dropdown>
</div>
--}}


{{-- 
<div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
--}}