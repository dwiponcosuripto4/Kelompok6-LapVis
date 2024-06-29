import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// DARK MODE TOGGLE BUTTON
var themeToggleDarkIcon = document.getElementById("theme-toggle-dark-icon");
var themeToggleLightIcon = document.getElementById("theme-toggle-light-icon");

function updateIcons() {
    if (document.documentElement.classList.contains('dark')) {
        themeToggleLightIcon.classList.remove("hidden");
        themeToggleDarkIcon.classList.add("hidden");
    } else {
        themeToggleDarkIcon.classList.remove("hidden");
        themeToggleLightIcon.classList.add("hidden");
    }
}

// Check for theme preference at the beginning
if (localStorage.getItem("color-theme") === "dark" || 
    (!localStorage.getItem("color-theme") && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
    document.documentElement.classList.add('dark');
    localStorage.setItem("color-theme", "dark");
} else {
    document.documentElement.classList.remove('dark');
    localStorage.setItem("color-theme", "light");
}

updateIcons();

var themeToggleBtn = document.getElementById("theme-toggle");

themeToggleBtn.addEventListener("click", function () {
    document.documentElement.classList.toggle('dark');
    if (document.documentElement.classList.contains('dark')) {
        localStorage.setItem("color-theme", "dark");
    } else {
        localStorage.setItem("color-theme", "light");
    }
    updateIcons();
});
