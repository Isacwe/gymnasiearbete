const params = new URLSearchParams(window.location.search);
const transition = document.querySelector("#page-transition");
const form = document.querySelector(".form-group");
const revealItems = document.querySelectorAll(".reveal-item");

function revealSignup() {
    if (!form) return;

    const svg = form.querySelector(".animated-border");
    const rect = svg?.querySelector("rect");

    if (svg && rect) {
        const width = form.clientWidth;
        const height = form.clientHeight;

        svg.setAttribute("viewBox", `0 0 ${width} ${height}`);

        rect.setAttribute("x", "1");
        rect.setAttribute("y", "1");
        rect.setAttribute("width", width - 2);
        rect.setAttribute("height", height - 2);
    
        const length = rect.getTotalLength();

        rect.style.setProperty("--border-length", length);
        rect.style.strokeDasharray = length;
        rect.style.strokeDashoffset = length;
    }

    form.classList.remove("border-appear");

    void form.offsetWidth;

    form.classList.add("border-appear");

    setTimeout(() => {
        revealItems.forEach((item, index) => {
            setTimeout(() => {
                item.classList.add("show");
            }, index * 120);
        });
    }, 1400);
}

if (transition && params.get("transition") === "continue") {
    transition.classList.add("play-reveal");

    transition.addEventListener("animationend", function onTransitionEnd(event) {
        if (event.target !== transition) return;

        revealSignup();

        const url = new URL(window.location.href);
        url.searchParams.delete("transition");

        window.history.replaceState({}, "", url);
    }, { once: true });

} else {
    revealSignup();
}
