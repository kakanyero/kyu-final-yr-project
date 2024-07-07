// script.js

document.addEventListener("DOMContentLoaded", function() {
    const sections = document.querySelectorAll("h2");
    
    sections.forEach(section => {
        section.addEventListener("click", () => {
            const content = section.nextElementSibling;
            content.classList.toggle("hidden");
        });
    });
});
