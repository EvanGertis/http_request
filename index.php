<!-- BEGIN HTML -->
<button id = "ajaxButton" type="button">Make a request</button>
<!-- END HTML -->

<!-- BEGIN AJAX SCRIPT -->
<script>
//IIFE 
(function(){
    //initialize locals.
    var httpRequest;
    var content = "test";

    //add event listeners.
    document.getElementById("ajaxButton").addEventListener('click', makeRequest)


    //sets up ajax request.
    // BEGIN makeRequest
    function makeRequest(){
        httpRequest = new XMLHttpRequest();

        // gaurd.
        if(!httpRequest){
            alert('No xmlhttp instance avail.');
            return false;
        }
        // set callback handler.
        httpRequest.onreadystatechange = alertContents;
        httpRequest.open('POST', 'server.php');
        httpRequest.send(content);
    }
    // END makeRequest

    // BEGIN alertContents
    function alertContents(){
        if(httpRequest.readyState === XMLHttpRequest.DONE){
            if(httpRequest.status === 200){
                alert(httpRequest.responseText);
            } else {
                alert("Error in the request");
            }
        }
    }
    // END alertContents
})();
</script>
<!-- END AJAX SCRIPT -->