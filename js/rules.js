dialog = document.getElementById("popUp");
overlay = document.getElementById("overlayContainer");
body = document.body;

function closeDialog() {
    body.classList.remove("noscroll")
    overlay.classList.remove("overlayActive")
    dialog.classList.remove("popUpActive")
}

function openDialog() {
    body.classList.add("noscroll")
    overlay.classList.add("overlayActive")
    dialog.classList.add("popUpActive")
}