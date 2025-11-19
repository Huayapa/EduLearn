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
        <p class="text-4xl text-white">{{ $totalstudents }}</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Total Cursos</h3>
        <p class="text-4xl text-white">{{ $totalcourses }}</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Matriculas Activas</h3>
        <p class="text-4xl text-white">{{ $totalenrollmentsactive }}</p>
    </article>
    <article class="rounded-[10px] flex flex-col justify-between gap-[30px] p-[12px] w-full md:w-[calc(50%_-_10px)] 
    bg-gradient-to-r from-[var(--tertiary)] to-[var(--primary)]
    ">
        <h3 class="text-xl text-white">Docentes Activos</h3>
        <p class="text-4xl text-white">{{ $totalusersactive }}</p>
    </article>
  </section>




  <section class="flex gap-[20px] flex-col md:flex-row md:flex-nowrap py-[1rem]">
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Cursos Recientes</h2>
        <p>Ultimos cursos agregados en el sistema</p>
        <section class="flex flex-col gap-[10px]">
            @foreach ($coursesrecents as $coursesrecent)
                <div class="w-full bg-[#222222] flex items-center p-[20px_10px]">
                    <p class="text-white text-xl">{{ $coursesrecent->name }}</p>
                </div>
            @endforeach
        </section>
    </article>
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Matriculas Recientes</h2>
        <p>Ultimas matriculas agregadas en el sistema</p>
        <section class="flex flex-col gap-[10px]">
            @foreach ( $enrollmentsrecents as $enrollment)
            <div class="w-full bg-white flex items-start justify-between p-[20px_10px] rounded-[10px]">
                <div class="flex flex-col items-start gap-[10px]">
                    <p class="text-xl text-[--fourth] font-bold">{{ $enrollment->student->name }}</p>
                    <p class="text-m text-[--fourth]">Inscrito el: {{ $enrollment->created_at->format('d/m/Y')}}</p>
                    @php
                        $styles = [
                            'activo' => 'bg-[--green-body] border-[--green]',
                            'retirado' => 'bg-[--red-body] border-[--red]',
                            'terminado' => 'bg-[--blue-body] border-[--blue]',
                        ];
                    @endphp
                    <p class="p-[4px_30px] text-white rounded-[2rem] text-center 
                    {{ $styles[$enrollment->student->academic_status] }}">
                    {{ ucfirst($enrollment->student->academic_status) }}
                    </p>
                </div>

                <div class="flex flex-col items-start gap-[10px]" x-data="{ openCourses: false }">
                    <a href="#" class="text-m text-[--fourth] underline"
                    @click.prevent="$dispatch('open-modal', 'courses-modal-{{ $enrollment->id }}')">
                    Ver Cursos
                    </a>
                    <x-modal name="courses-modal-{{ $enrollment->id }}">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-3">Cursos del estudiante</h2>

                            <div class="max-h-[300px] overflow-y-auto">
                                @foreach ($enrollment->student->courses ?? [] as $item)
                                    <div class="border-b py-2">
                                        <p class="font-semibold">{{ $item->name }}</p>
                                        <p class="text-sm text-gray-600">
                                            Matriculado: {{ $item->created_at }}
                                        </p>
                                    </div>  
                                @endforeach
                            </div>
                        </div>
                    </x-modal>
                </div>
                
            </div>
            @endforeach
        </section>
    </article>
  </section>





  <section class="flex gap-[20px] flex-col md:flex-row md:flex-nowrap py-[2rem]">
    <article class="w-full flex flex-col gap-[10px]">
        <h2 class="text-2xl text-white font-bold">Matriculas por Curso</h2>
        <section class="flex flex-col gap-[10px]">
            @php
                $max = $coursesenrollment->max('enrollments_count') ?: 1;
            @endphp

            @foreach ($coursesenrollment as $courseenrollment)
                <div class="w-full flex items-center gap-[10px] my-2">
                    <h3 class="text-lg text-white font-bold w-[180px]">{{ $courseenrollment->course->name }}</h3>

                    @php
                        $porcentaje = $max > 0 ? ($courseenrollment->enrollments_count / $max) * 100 : 0;
                    @endphp

                    <div class="w-full bg-[--primary] rounded-[30px] overflow-hidden progress-container">
                        <div
                            class="barra"
                            data-width="{{ round($porcentaje, 2) }}"
                            aria-valuenow="{{ $courseenrollment->enrollments_count }}"
                            aria-valuemax="{{ $max }}">
                            {{ $courseenrollment->enrollments_count }}
                        </div>
                    </div>
                </div>
            @endforeach
        </section>
    </article>
    <article class="w-full flex flex-col gap-[10px]">
        @php
            $total = $courses->sum('enrollments_count');
        @endphp
        @php
            $gradientes = [];
            $acumulado = 0;

            foreach ($courses as $index => $item) {
                $porcentaje = $total > 0 ? ($item->enrollments_count / $total) * 100 : 0;
                $color = "hsl(" . ($index * 60) . ", 70%, 50%)";

                $gradientes[] = "$color $acumulado% " . ($acumulado + $porcentaje) . "%";

                $acumulado += $porcentaje;
            }

            $fondo = implode(', ', $gradientes);
        @endphp

        <h2 class="text-2xl text-white font-bold mb-4">Alumnos por Asignatura</h2>

        <section class="flex flex-row gap-[40px] justify-center items-center">
            <div id="grafico" style="width: 260px; height: 260px;"></div>

            <div class="flex flex-col gap-[10px] text-white">
                @foreach ($courses as $item)
                    <div class="flex items-center gap-2">
                        <div class="w-4 h-4 rounded-sm"
                            style="background-color: hsl({{ $loop->index * 60 }}, 70%, 50%);">
                        </div>
                        <p>{{ $item->name }}: {{ $item->enrollments_count }} alumnos</p>
                    </div>
                @endforeach
            </div>
        </section>
    </article>
  </section>
  <script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".barra").forEach(bar => {
            let raw = bar.getAttribute("data-width");
            if (raw === null) raw = "0";
            raw = raw.toString().replace(',', '.');
            let num = parseFloat(raw);
            if (isNaN(num)) num = 0;
            num = Math.max(0, Math.min(100, num));

            bar.style.width = "0%";

            requestAnimationFrame(() => {
                setTimeout(() => {
                    bar.style.width = num + "%";
                }, 40);
            });
        });
    });
    const data = [
        @foreach ($courses as $item)
            {
                value: {{ $item->enrollments_count }},
                name: "{{ $item->name }}",
                itemStyle: {
                    color: "hsl({{ $loop->index * 60 }}, 70%, 50%)"
                }
            },
        @endforeach
    ];

    const chart = echarts.init(document.getElementById('grafico'));

    chart.setOption({
        series: [
            {
                type: 'pie',
                radius: ['50%', '80%'], // dona
                animation: true,
                animationDuration: 1200,
                animationEasing: 'cubicOut',
                avoidLabelOverlap: false,
                label: { show: false },
                data: data
            }
        ]
    });
</script>
</x-app-layout>