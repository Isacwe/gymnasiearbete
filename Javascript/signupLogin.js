//Const url hämtar webbadressen som man för nuvarande är på att man kan både läsa den, men även att ändra på den. Dessutom letar den efter elementet (id) #page-transition
const url = new URL(window.location.href);
const transition = document.querySelector("#page-transition");

//Detta kontrollerar att det finns och ifall webbadressen slutar med ?transition=continue, där man lägger till klassen play-reveal för att påbörja övergången.
if (transition && url.searchParams.get("transition") === "continue") {
  transition.classList.add("play-reveal");

  //Detta väntar tills själva animationen är klar, vilket tar bort ?transition=continue från slutet av adressfältet utan att ladda om själva sidan.
  //Det gör så att animationen inte spelas upp en gång till ifall användaren uppdaterar sidan, eftersom det raderas.
  transition.onanimationend = () => {
    url.searchParams.delete("transition");
    history.replaceState({}, "", url);
  };
}