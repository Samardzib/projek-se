<script>
    document.addEventListener('DOMContentLoaded', function() {
        var urlpath ={
            select: "{{ route('todolist.index') }}",
        }

        onShow = () =>{
            $.ajax({
                url: urlpath.select,
                type: 'GET',
                success: function(response){
                    $('.notification-section').html('')
                    $.each(response.data, function( key, value ){
                        let definedTime = value.activity_time;

                        let now = new Date();
                        let currentHours = now.getHours();
                        let currentMinutes = now.getMinutes();
                        let [definedHours, definedMinutes] = definedTime.split(':').map(Number);

                        let currentTime = new Date();
                        currentTime.setHours(currentHours, currentMinutes, 0, 0);

                        let definedDateTime = new Date();
                        definedDateTime.setHours(definedHours, definedMinutes, 0, 0);

                        let differenceInMillis = definedDateTime - currentTime;
                        let differenceInMinutes = Math.floor(differenceInMillis / (1000 * 60));

                        if (differenceInMinutes <= 30 && differenceInMinutes > 0) {
                            $('.notification-section').append(`
                                <div class="notification">
                                    <span class="notification-icon"> <img src="{{ asset('asset-icon/LogoNotification.png') }}" alt="notification" style="width: 30px; height: 30px;"></span>
                                    <div class="notification-text">
                                        <strong>Your activities</strong> (${value.activity_name}) <strong>has ${differenceInMinutes} minutes left until the defined time</strong>
                                        <div class="notification-time">Today</div>
                                        </div>
                                </div>
                            `)
                        } else if (differenceInMinutes < 0) {
                            $('.notification-section').append(`
                                <div class="notification">
                                    <span class="notification-icon"> <img src="{{ asset('asset-icon/LogoNotification.png') }}" alt="notification" style="width: 30px; height: 30px;"></span>
                                    <div class="notification-text">
                                        <strong>Your activities</strong> (${value.activity_name}) <strong>is overdue ${differenceInMinutes*-1} minutes ago</strong>
                                        <div class="notification-time">Today</div>
                                        </div>
                                </div>
                            `)
                        }

                        
                    })
                },complete: function() {},
            });
        }
        onShow()
    });

    
</script>