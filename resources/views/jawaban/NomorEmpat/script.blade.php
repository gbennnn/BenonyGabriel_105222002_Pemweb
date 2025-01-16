<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendar</title>
    <link href='https://fullcalendar.io/releases/fullcalendar/3.10.2/fullcalendar.min.css' rel='stylesheet' />
    <script src='https://code.jquery.com/jquery-3.5.1.min.js'></script>
    <script src='https://fullcalendar.io/releases/fullcalendar/3.10.2/fullcalendar.min.js'></script>
</head>

<body>
    <div id='calendar'></div>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: function(start, end, timezone, callback) {
                    $.ajax({
                        url: '{{ route('event.get-json') }}',
                        dataType: 'json',
                        success: function(data) {
                            var events = [];
                            $(data).each(function() {
                                events.push({
                                    id: this.id,
                                    title: this.title,
                                    start: this.start,
                                    end: this.end,
                                    color: this.color
                                });
                            });
                            callback(events);
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>
