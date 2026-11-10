const image = document.querySelector(".blewit-image");

image.addEventListener("click", function (event) {
    event.preventDefault();

    image.classList.add("grow");

    setTimeout(() => {
        const destination = new URL("signup.php", window.location.href);
        destination.searchParams.set("transition", "continue");

        window.location.href = destination.href;
    }, 700);
});