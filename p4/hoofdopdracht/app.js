const hour = new Date().getHours();

if (hour < 12) {
    document.getElementById("greeting").textContent= "Goedemorgen";
} else if (hour < 18) {
    document.getElementById("greeting").textContent= "Goedemiddag";
} else {
    document.getElementById("greeting").textContent= "Goedeavond";
}