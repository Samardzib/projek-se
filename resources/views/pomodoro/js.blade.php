<script>
    document.addEventListener('DOMContentLoaded', function() {
        let timerInterval;
        let setTimer=true

        setTime = () => {
            const inputMinutes = $('#choose_min').val();
            const inputSeconds = $('#choose_sec').val();
            $('#time_min').html(inputMinutes < 10 ? '0' + inputMinutes : inputMinutes);
            $('#time_sec').html(inputSeconds < 10 ? '0' + inputSeconds : inputSeconds);
        }

        onModal = () => {
            if(setTimer){
                $('#set_timer').modal('show')
            } else{
                swal("Warning", "Mohon Maaf Timer Sedang Berjalan", "warning");
            }
        }

        onDefineTimer = () =>{
            let min = $('#choose_min').val()
            let sec = $('#choose_sec').val()

            if(min != '' && sec != ''){
                $('#time_min').html(min < 10 ? '0' + min : min);
                 $('#time_sec').html(sec < 10 ? '0' + sec : sec);
                $('#set_timer').modal('hide')
            }
        }

        startTimer = () => {
            $('.stop-button').show()
            $('.start-button').hide()
            setTimer=false
            let minutesElement = $('#time_min');
            let secondsElement = $('#time_sec');
            let totalTimeInSeconds = parseInt(minutesElement.html()) * 60 + parseInt(secondsElement.html());

            clearInterval(timerInterval);
            timerInterval = setInterval(() => {
                if (totalTimeInSeconds <= 0) {
                    clearInterval(timerInterval);
                    return;
                }

                totalTimeInSeconds--;

                const minutes = Math.floor(totalTimeInSeconds / 60);
                const seconds = totalTimeInSeconds % 60;

                minutesElement.html(minutes < 10 ? '0' + minutes : minutes);
                secondsElement.html(seconds < 10 ? '0' + seconds : seconds);
            }, 1000);
        }

        stopTimer = () => {
            setTimer=true
            clearInterval(timerInterval);
            $('.stop-button').hide()
            $('.start-button').show()
        }
    });

    
</script>