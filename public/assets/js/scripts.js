document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: [ 'dayGrid', 'interaction' ],
        editable: true,
        events: '/events' // Ensure this route returns event data in JSON format
    });

    calendar.render();
});