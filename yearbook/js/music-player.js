window.onload = function() {
    let media = document.querySelector("audio.fc-media");
    let audio = new MediaElementPlayer(media, {
        iconSprite: "",
        audioHeight: 40,
        features : ["playpause", "current", "duration", "progress", "volume", "tracks", "fullscreen"],
        alwaysShowControls: true,
        timeAndDurationSeparator: "<span></span>",
        iPadUseNativeControls: false,
        iPhoneUseNativeControls: false,
        AndroidUseNativeControls: false
    });

    let img = new Image();
    img.crossOrigin = "Anonymous";
    let player = document.getElementById("player");
    let title = document.createElement("h1"); // Create a new h1 element for the title
    title.textContent = ""; // Set the text content of the title
    player.appendChild(title); // Append the title to the player

    let imageElement = document.getElementById("image");
    let backgroundImage = imageElement.style.backgroundImage;
    let imageUrl = backgroundImage.replace('url("', '').replace('")', '');

    img.src = imageUrl; // Set the src of the img to the image URL

    img.onload = () => {
        let colorThief = new ColorThief();
        let color = colorThief.getColor(img);
        player.style.backgroundImage = `url(${imageUrl})`; // Set the background image of the player
        player.style.backgroundColor = `rgb(${color})`;
        player.style.display = "flex";
        player.style.justifyContent = "center";
        player.style.alignItems = "center";

        title.style.fontFamily = "Signika, sans-serif";
        title.style.fontSize = "12px";
        title.style.textAlign = "center";
    }
}