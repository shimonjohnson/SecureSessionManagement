function activityWatcher(){

    //The number of seconds that have passed
    //since the user was active.
    var secondsSinceLastActivity = 0;

    //One minute. 60 x 1 = 60 seconds.
    var maxInactivity = (60 * 1);

    //Setup the setInterval method to run
    //every second. 1000 milliseconds = 1 second.
    setInterval(function(){
        secondsSinceLastActivity++;
        console.log(secondsSinceLastActivity + ' seconds since the user was last active');
        //if the user has been inactive or idle for longer
        //then the seconds specified in maxInactivity
        if(secondsSinceLastActivity >= 20){
          $("#activityWatcher").html("You have " +(maxInactivity - secondsSinceLastActivity)+ " seconds left. Hover anywhere on the page to stop from being logged out due to inactivty!");
        }
        if(secondsSinceLastActivity > maxInactivity){
            console.log('User has been inactive for more than ' + maxInactivity + ' seconds');
            $("#activityWatcher").html("");
            //Redirect them to your logout.php page.
            logout('User has been inactive for more than ' + maxInactivity + ' seconds so logged out');
        }
    }, 1000);

    //The function that will be called whenever a user is active
    function activity(){
        //reset the secondsSinceLastActivity variable
        //back to 0
        secondsSinceLastActivity = 0;
        $("#activityWatcher").html("");
    }

    //An array of DOM events that should be interpreted as
    //user activity.
    var activityEvents = [
        'mousedown', 'mousemove', 'keydown',
        'scroll', 'touchstart'
    ];

    //add these events to the document.
    //register the activity function as the listener parameter.
    activityEvents.forEach(function(eventName) {
        document.addEventListener(eventName, activity, true);
    });
}

activityWatcher();
