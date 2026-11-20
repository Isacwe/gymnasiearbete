//Hämtar själva bilden från css, alltså .blewit-image
const image = document.querySelector(".blewit-image");

//Reagerar på klick på bilden vilket lägger till klassen grow, och innan man skickas till själva signup, finns det en setTimeout för att få en snygg övergång.
image.onclick = (event) => {
    event.preventDefault();
    image.classList.add("grow");
    setTimeout(() => {
        window.location.href = "signup.php?transition=continue";
    }, 700);
};