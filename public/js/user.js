
function toggleMenu() {
    const menu = document.getElementById('navMenu');
    menu.classList.toggle('active');
}

// Indicators animation
const indicators = document.querySelectorAll('.indicator');
let currentIndex = 0;

setInterval(() => {
    indicators[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % indicators.length;
    indicators[currentIndex].classList.add('active');
}, 3000);

// Scroll to top functionality
const scrollTopBtn = document.getElementById('scrollTop');

window.addEventListener('scroll', () => {
    if (window.pageYOffset > 300) {
        scrollTopBtn.classList.add('active');
    } else {
        scrollTopBtn.classList.remove('active');
    }
});

function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// Contact form submission
function handleSubmit(event) {
    event.preventDefault();
    alert('Merci pour votre message! Nous vous contacterons bientôt.');
    event.target.reset();
}

// Newsletter form submission
function handleNewsletter(event) {
    event.preventDefault();
    alert('Merci de vous être abonné à notre newsletter!');
    event.target.reset();
}

// Smooth scroll for anchor links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});