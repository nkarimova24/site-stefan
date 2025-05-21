document.addEventListener('DOMContentLoaded', () => {
    let slideIndex = 0;

    function showSlides() {
        const slides = document.querySelectorAll('.mySlides'); // Select all slides
        slides.forEach((slide) => (slide.style.display = 'none')); // Hide all slides

        slides[slideIndex].style.display = 'block'; // Show the current slide
    }

    function nextSlide() {
        const slides = document.querySelectorAll('.mySlides');
        slideIndex = (slideIndex + 1) % slides.length; // Move to the next slide
        showSlides();
    }

    function prevSlide() {
        const slides = document.querySelectorAll('.mySlides');
        slideIndex = (slideIndex - 1 + slides.length) % slides.length; // Move to the previous slide
        showSlides();
    }

    // Attach event listeners to the buttons
    document.getElementById('next').addEventListener('click', nextSlide);
    document.getElementById('prev').addEventListener('click', prevSlide);

    // Start the slideshow
    showSlides();

    // Automatic slideshow (optional)
    setInterval(nextSlide, 10000); // Change slide every 3 seconds
});
