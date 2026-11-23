//Tar alla html-element som krävs för att byta färg på själva sidan. Dessutom tar den själva klasserna som behöver ändras till redan existerande klasser, som dark / light mode. 
const themeBtn = document.getElementById("themes");
const video = document.getElementById("background-video");
const form = document.querySelector("[class*='form-group-']");
const inputs = document.querySelectorAll("[class*='boxStyle-']");
const submitBtn = document.querySelector("[class*='svampKnapp-']");
const accountLink = document.querySelector("#loggaIn, #skapaKonto, #loggaInDarkMode, #skapaKontoLightMode");

//En hjälp-funktion för ändringen av tema som tar bort gambla temaklasser, där den classList.add lägger till rätt klass, alltså light eller dark mode på alla elementen om det finns på sidan.
function setThemeClass(element, baseName, isDark) {
    if (!element) return;
    element.classList.remove(
        `${baseName}-signup`,
        `${baseName}-login`,
        `${baseName}-DarkMode`,
        `${baseName}-LightMode`
    );
    element.classList.add(isDark ? `${baseName}-DarkMode` : `${baseName}-LightMode`);
}

//Detta är själva huvudfunktionen av sidan, som heter applyTheme. Denna funktion ger själva sidan sitt tema. 
function applyTheme(isDark) {

    //Detta uppdaterar klassen på body där den byter klasserna som har teman på själva formulären, knapparna och imatningsfälten. Om det är dark, blir det darktheme, och annars lighttheme. 
    document.documentElement.className = isDark ? "dark-theme" : "light-theme";
    document.body.className = isDark ? "dark-theme" : "light-theme";

    setThemeClass(form, "form-group", isDark);
    setThemeClass(submitBtn, "svampKnapp", isDark);
    inputs.forEach(input => setThemeClass(input, "boxStyle", isDark));

    //Detta byter id på länken, vilket gör så att textfärgen endras enligt css-koden för det passande temat, då det är antingen loggaIn eller skapaKonto.
    if (accountLink) {
        accountLink.id = isDark ? "loggaInDarkMode" : "skapaKontoLightMode";
    }

    //Denna del kontrollerar om det finns en bakgrundsvideo på sidan, vilket båda har som jag vill ändra på. Den väljer vilken video som ska video.load och video.play, beroende på temat (isDark.)
    if (video) {
        const source = video.querySelector("source");
        const videoFile = isDark ? "wallpaper2.mp4" : "wallpaper3.mp4";

        if (!source.src.includes(videoFile)) {
            source.src = `../files/Videor/${videoFile}`;
            video.load();
            video.play().catch(() => {});
        }
    }
}

//Denna del av koden lagrar i localStorage, alltså webbläsarens minne, denna del beror på vilket tema som användaren angav och aktiverar det när sidan laddas. 
let isDark = localStorage.getItem("theme") !== "light";
applyTheme(isDark);

//Här lyssnar det efter själva klicket för att temat ska kunna ändras. 
if (themeBtn) {
    themeBtn.addEventListener("click", () => {
        isDark = !isDark;
        localStorage.setItem("theme", isDark ? "dark" : "light");
        applyTheme(isDark);
    });
}