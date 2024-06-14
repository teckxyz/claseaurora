document.addEventListener("DOMContentLoaded", function() {
    var audio = document.getElementById("backgroundMusic");

    // Check if the audio element exists
    if (audio) {
        // Autoplay the music
        audio.play().catch(function(error) {
            // Autoplay was prevented
            console.warn("Autoplay was prevented. Please interact with the page to enable audio.");
        });
    }
});
