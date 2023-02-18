var starting_icon = document.getElementById("starting_point_img");
var starting_popup = document.getElementById("starting_popup");
var advanced_icon = document.getElementById("advanced_level_img");
var advanced_popup = document.getElementById("advanced_popup");

starting_icon.addEventListener("mouseover", showStartingPopup);
starting_icon.addEventListener("mouseout", hideStartingPopup);
advanced_icon.addEventListener("mouseover", showAdvancedPopup);
advanced_icon.addEventListener("mouseout", hideAdvancedPopup);

function showStartingPopup(evt) {
    var iconPos = starting_icon.getBoundingClientRect();
    starting_popup.style.left = (iconPos.right + 20) + "px";
    starting_popup.style.top = (window.scrollY + iconPos.top - 60) + "px";
    starting_popup.style.display = "block";
}

function hideStartingPopup(evt) {
    starting_popup.style.display = "none";
}

function showAdvancedPopup(evt) {
    var iconPos = advanced_icon.getBoundingClientRect();
    advanced_popup.style.left = (iconPos.right + 20) + "px";
    advanced_popup.style.top = (window.scrollY + iconPos.top - 60) + "px";
    advanced_popup.style.display = "block";
}

function hideAdvancedPopup(evt) {
    advanced_popup.style.display = "none";
}