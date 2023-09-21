



/* Lightbox */
// var lightbox = new SimpleLightbox('.gallery a', { /* options */ });

/* Print Function*/
function myfun(){
    window.print();
}

$(document).ready(function() {
    const showBtn = document.querySelector('.navBtn');
    const topNav = document.querySelector('.top-nav');
    showBtn.addEventListener('click', function(){
        if(topNav.classList.contains('showNav')){
            topNav.classList.remove('showNav');
            showBtn.innerHTML = '<i class = "fas fa-bars"></i>';
        } else {
            topNav.classList.add('showNav');
            showBtn.innerHTML = '<i class = "fas fa-times"></i>';
        }
    });

    // Click event handler for the button
    $("#sendSubscribeRequest").click(function() {
        // Data to be sent in the POST request
        var email = document.getElementById("email1");
        if(!email.value){
            alert("Please enter the email.")
            return;
        }
        var postData = {
            email: email.value,
            Subscription: true
        };

        // Make the POST request
        $.ajax({
            type: "POST",
            url: "sub.php",
            data: postData, // Convert to JSON if needed
            success: function(response) {
                // Handle the success response
                email.value = "";
              alert("Thanks for subscribing")
            },
            error: function(error) {
                // Handle any errors
                alert(error.responseText)
                console.log("Error:", error);
            }
        });
    });
});