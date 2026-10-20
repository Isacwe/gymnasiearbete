const image = document.querySelector(".blewit-image");
const link = document.querySelector(".blewit-link");

image.addEventListener("click", function (event) {
    event.preventDefault();

    image.classList.add("grow");

    setTimeout(() => {
        const destination = new URL(link.href);
        destination.searchParams.set("transition", "continue");

        window.location.href = destination.href;
    }, 700);
});