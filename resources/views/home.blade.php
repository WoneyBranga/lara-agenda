<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div id="calendar"></div>

                </div>
            </div>
        </div>
    </div>

    @push('styles')
        <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.css"
              rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.11.3/main.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var calendarEl = document.getElementById('calendar');
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    locale: 'pt-br',
                    selectable: true,
                    headerToolbar: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'dayGridMonth,timeGridWeek,timeGridDay'
                    },
                    dateClick: function(info) {
                        alert('clicked ' + info.dateStr);
                    },
                    select: function(info) {
                        alert('selected ' + info.startStr + ' to ' + info.endStr);
                    },
                    // headerToolbar: {
                    //     left: 'prev,next',
                    //     center: 'title',
                    //     right: 'today,dayGridMonth,dayGridYear,dayGrid,timeGridWeek'
                    //     // right: 'today,dayGridMonth,listDay,listWeek,listMonth,listYear,dayGrid,timeGridWeek'
                    // },
                    timeZone: 'UTC',
                    dayMaxEvents: true, // allow "more" link when too many events

                    navLinks: true,
                    titleFormat: {
                        year: 'numeric',
                        month: 'short',
                        day: 'numeric'
                    }, // like 'Sep 13 2009', for week views
                    buttonText: {
                        today: 'Hoje',
                        month: 'Mês',
                        week: 'Semana',
                        day: 'Dia',
                        list: 'Lista',
                    },
                    businessHours: true,

                    weekNumbers: true,
                    // listDayFormat: true,
                    // initialView: 'timeGridWeek', // visao semana
                    // initialView: 'dayGridMonth', // visao mes
                    // initialView: 'listWeek', // visao lista
                    fixedWeekCount: true,
                    showNonCurrentDates: true,
                    slotMinTime: '8:00:00',
                    slotMaxTime: '18:00:00',
                    events: @json($events),

                });
                calendar.render();
            });
        </script>
    @endpush
</x-app-layout>
