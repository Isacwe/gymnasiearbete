const themeBtn = document.getElementById("themes");
const video = document.getElementById("background-video");

const form = document.querySelector(".form-group-signup, .form-group-login, .form-group-DarkMode, .form-group-LightMode");
const inputs = document.querySelectorAll(".boxStyle-signup, .boxStyle-login, .boxStyle-DarkMode, .boxStyle-LightMode");
const submitBtn = document.querySelector(".svampKnapp-signup, .svampKnapp-login, .svampKnapp-DarkMode, .svampKnapp-LightMode");
const accountLink = document.querySelector("#loggaIn, #skapaKonto, #loggaInDarkMode, #skapaKontoLightMode");

function applyTheme(isDark) {
    document.body.classList.toggle("dark-theme", isDark);
    document.body.classList.toggle("light-theme", !isDark);

    if (form) {
        form.classList.remove("form-group-signup", "form-group-login", "form-group-DarkMode", "form-group-LightMode");
        form.classList.add(isDark ? "form-group-DarkMode" : "form-group-LightMode");
    }

    inputs.forEach(input => {
        input.classList.remove("boxStyle-signup", "boxStyle-login", "boxStyle-DarkMode", "boxStyle-LightMode");
        input.classList.add(isDark ? "boxStyle-DarkMode" : "boxStyle-LightMode");
    });

    if (submitBtn) {
        submitBtn.classList.remove("svampKnapp-signup", "svampKnapp-login", "svampKnapp-DarkMode", "svampKnapp-LightMode");
        submitBtn.classList.add(isDark ? "svampKnapp-DarkMode" : "svampKnapp-LightMode");
    }

    if (accountLink) {accountLink.id = isDark ? "loggaInDarkMode" : "skapaKontoLightMode";}

    if (video) {
        const source = video.querySelector("source");
        const targetVideo = isDark? "../files/Videor/wallpaper2.mp4": "../files/Videor/wallpaper3.mp4";

        if (!source.src.endsWith(targetVideo.replace("..", ""))) {
            source.src = targetVideo;
            video.load();
            video.play().catch(error => {
                console.log("Video playback failed:", error);
            });
        }
    }
}

let isDarkTheme = localStorage.getItem("theme") !== "light";
applyTheme(isDarkTheme);

if (themeBtn) {
    themeBtn.addEventListener("click", () => {
        isDarkTheme = !isDarkTheme;
        localStorage.setItem("theme", isDarkTheme ? "dark" : "light");
        applyTheme(isDarkTheme);
    });
}
