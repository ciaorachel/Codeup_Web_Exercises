
<!DOCTYPE html>
<html>
<head>
    <title>Defuse the BOM</title>
</head>
<body>
    <h2 id="message">This BOM will self destruct in <span id="timer">5</span> seconds...</h2>

    <button id="defuser">Defuse the BOM</button>

    <script>
        var detonationTimer = 5;
        var min = 0;
        var interval = 1000; // interval time in milliseconds

        // TODO: This function needs to be called once every second
        var intervalId = setInterval(function () {
            if (detonationTimer === 0) {
                alert('EXTERMINATE!');
                document.body.innerHTML = '';
            } else if (detonationTimer > 0) {
                document.getElementById('timer').innerHTML = detonationTimer;
            }
            detonationTimer--;
        }, interval);

        // Call updateTimer() every 1 second
        //var intervalId = setInterval(updateTimer, 1000);

        // TODO: When this function runs, it needs to
        //cancel the interval/timeout for updateTimer()
        
        function defuseTheBOM() {
            clearInterval(intervalId);
            alert("You win!");
        }



        // Don't modify anything below this line!
        //
        // This causes the defuseTheBOM() function to be called
        // when the "defuser" button is clicked.
        // We will learn about events in the DOM lessons
        var defuser = document.getElementById('defuser');
        defuser.addEventListener('click', defuseTheBOM, false);
    </script>
</body>
</html>
