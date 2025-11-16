<nav x-data="{ open: false }" class="bg-[--fourth] rounded-[20px] flex-col items-center gap-[30px] p-[20px] w-full max-w-[22rem] hidden xl:flex">
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

