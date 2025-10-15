document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('serviceModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const closeModal = document.querySelector('.close-modal');

    // Quand on clique sur une image de service
    document.querySelectorAll('.service-item').forEach(item => {
        item.addEventListener('click', () => {
            const title = item.getAttribute('data-title');
            const description = item.getAttribute('data-description') || 'Aucune description disponible.';
            const image = item.getAttribute('data-image') || 'https://via.placeholder.com/600x400?text=Pas+d\'image';

            modalTitle.textContent = title;
            modalDescription.textContent = description;
            modalImage.src = image;

            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden'; // empêche le scroll en arrière-plan
        });
    });

    // Fermer le modal
    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
        document.body.style.overflow = 'auto';
    });

    // Fermer si on clique en dehors du contenu
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
            document.body.style.overflow = 'auto';
        }
    });
});
