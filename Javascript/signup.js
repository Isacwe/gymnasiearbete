const params = new URLSearchParams(window.location.search);
const transition = document.querySelector("#page-transition");

if (transition && params.get("transition") === "continue") {
    transition.classList.add("play-reveal");

    transition.addEventListener("animationend", function (event) {
        if (event.target !== transition) return;

        const url = new URL(window.location.href);
        url.searchParams.delete("transition");

        window.history.replaceState({}, "", url);
    }, { once: true });
}
