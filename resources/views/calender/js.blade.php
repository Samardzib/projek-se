<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/6.1.14/index.global.min.js"></script>
<script>
    var date_choose = ''
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: ''
            },
            dateClick: function(info) {
                // Remove the 'fc-day-selected' class from all days
                var allDays = document.querySelectorAll('.fc-daygrid-day');
                allDays.forEach(function(day) {
                    day.classList.remove('fc-day-selected');
                });

                // Add the 'fc-day-selected' class to the clicked day
                info.dayEl.classList.add('fc-day-selected');

                // Show alert with the selected date
                date_choose = info.dateStr
                $('.date_now').val(info.dateStr)
                onShow()
            }
        });

        calendar.render();

        // Update progress bar
        function updateProgress() {
            var checkboxes = document.querySelectorAll('.task-checkbox');
            var checked = document.querySelectorAll('.task-checkbox:checked').length;
            var total = checkboxes.length;
            var percentage = (checked / total) * 100;

            document.getElementById('progress').style.width = percentage + '%';
            document.getElementById('progress-percentage').innerText = Math.round(percentage) + '%';
        }

        var urlpath ={
            insert: "{{ route('activity.store') }}",
            insert2: "{{ route('todolist.store') }}",
            update: "{{ route('todolist.update', ['todolist' => ':id']) }}",
            show: "{{ route('activity.show', ['activity' => ':date']) }}",
        }

        onShow = () =>{
            var currentDate = new Date();
            var year = currentDate.getFullYear();
            var month = (currentDate.getMonth() + 1).toString().padStart(2, '0'); 
            var date = currentDate.getDate().toString().padStart(2, '0'); 
            var formattedDate = year + "-" + month + "-" + date;
            var dateparam = date_choose==''? formattedDate : date_choose;

            $.ajax({
                url: urlpath.show.replace(':date', dateparam),
                type: 'GET',
                success: function(response){
                    $('.your_activities_data').html('')
                    $.each(response.data.activity, function( key, value ){
                        let timeString = value.activity_time;
                        let timeParts = timeString.split(":");
                        let hour = timeParts[0];
                        let minute = timeParts[1];

                        $('.your_activities_data').append(`
                            <div class="time-block">
                                <strong>${timeParts[0]}:${timeParts[1]}</strong>
                                <p>${value.activity_name}</p>
                            </div>
                        `)
                    })

                    $('.todolist_data').html('')
                    $.each(response.data.todolist, function( key, value ){
                        $('.todolist_data').append(`
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input task-checkbox" type="checkbox" value="" id="${value.list_id}" ${value.list_status ? 'checked' : ''}>
                                    <label class="form-check-label" for="flexCheckDefault">
                                        ${value.list_name}
                                    </label>
                                </div>
                            </li>
                        `)
                    })
                },complete: function() {
                    // Add event listeners to checkboxes
                    var checkboxes = document.querySelectorAll('.task-checkbox');
                    checkboxes.forEach(function(checkbox) {
                        checkbox.addEventListener('change', function() {
                            updateProgress();
                            onUpdate(this.getAttribute('id'));
                        });
                    });
                    updateProgress();
                },
            });
        }

        onSave = (num='') =>{
            const formElement = $('#formData'+num)[0];
            var form = new FormData(formElement);

            var urlSave = num == '' ? urlpath.insert : urlpath.insert2
            $.ajax({
                url: urlSave,
                type: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function(response){
                    if(response.status == true){
                        $('#your_activities').modal('hide')
                        $('#todo_activities').modal('hide')
                        swal("Success !", response.message, "success");
                        onShow()
                    } else{
                        $('#your_activities').modal('hide')
                        $('#todo_activities').modal('hide')
                        swal("Warning", response.message, "warning");
                    }
                }, complete: function() {
                    
                }
            }) 
        }

        onUpdate = (list_id) => {
            var status = $('#'+list_id).is(':checked')? 1: 0;
            const data = {
                list_status: status,
                _token: $('meta[name="csrf-token"]').attr('content')
            };

            $.ajax({
                url: urlpath.update.replace(':id', list_id),
                type: 'PATCH',
                data: $.param(data), 
                contentType: 'application/x-www-form-urlencoded', 
                processData: true, 
                success: function(response) {
                    if (response.status != true) {
                        swal("Warning", response.message, "warning");
                    }
                }
            });
        }

        onShow()
    });

    
</script>