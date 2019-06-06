function displayTime() {
    var now = new Date();
    var elt = document.getElementById("clock");
    elt.innerHTML = now.toLocaleTimeString();
    setTimeout(displayTime, 1000);
}
window.onload = displayTime();