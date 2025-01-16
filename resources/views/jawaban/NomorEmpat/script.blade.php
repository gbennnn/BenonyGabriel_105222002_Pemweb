<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'today',
                center: 'title',
                right: 'prev,next'
            },
            titleFormat: {
                year: 'numeric',
                month: 'long'
            },
            locale: 'id',
            initialView: 'dayGridMonth',
            editable: false,
            dayMaxEvents: true,
            events: '/event/get-json',
            displayEventEnd: false,
            eventDisplay: 'block',
            dayHeaderFormat: {
                weekday: 'short'
            },
            displayEventTime: true,
            eventTimeFormat: {
                hour: '2-digit',
                minute: '2-digit',
                hour12: false
            },
            loading: function(isLoading) {
                if (!isLoading) {
                    console.log('Events loaded:', calendar.getEvents());
                }
            },
            eventSourceFailure: function(error) {
                console.error('Error loading events:', error);
            }
        });

        calendar.render();

        document.getElementById('my-today-button')?.addEventListener('click', function() {
            calendar.today();
        });
    });
</script>
