document.addEventListener('DOMContentLoaded', () => {
    const navLinks = document.querySelectorAll('.spark-center .nav-link');
    const navContainer = document.querySelector('.spark-center');

    if (!navLinks.length || !navContainer) return;

    navLinks.forEach(link => {
        link.addEventListener('mouseenter', () => {
            navLinks.forEach(l => l.classList.remove('is-hovered'));
            link.classList.add('is-hovered');
        });
    });

    navContainer.addEventListener('mouseleave', () => {
        navLinks.forEach(l => l.classList.remove('is-hovered'));
        
        // Optional: kembali ke active
        const active = document.querySelector('.spark-center .nav-link.active');
        if (active) active.classList.add('is-hovered');
    });
});
