const params = new URLSearchParams(window.location.search);
const transition = document.querySelector("#page-transition");

if (transition && params.get("transition") === "continue") {
  transition.classList.add("play-reveal");

  transition.addEventListener(
    "animationend",
    function (event) {
      if (event.target !== transition) return;
      const url = new URL(window.location.href);
      url.searchParams.delete("transition");
      window.history.replaceState({}, "", url);
    },
    { once: true },
  );
}
/*
const loginForm = document.querySelector(".form-group-login");
loginForm.addEventListener("submit", function(event) {
    event.preventDefault();

    const username = document.querySelector("#username").value;
    const password = document.querySelector("#password").value;
    const correctUsername = "admin";
    const correctPassword = "1234";

    if (username === correctUsername && password === correctPassword) {
        const destination = new URL("chat.php", window.location.href);
        loginForm.classList.remove("login-error");
        console.log("Login successful!");
        window.location.href = destination.href;
    } else {
        loginForm.classList.add("login-error");
        console.log("Incorrect username or password!");
    }
}); */
